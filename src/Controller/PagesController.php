<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\BadRequestException;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\View\Exception\MissingTemplateException;
use App\Library\Business\Cron;
use Cake\Http\Client;
use Jlpt\Library\Business\ManageSystem;
/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->business_manage_system = new ManageSystem();
        if (!isset($base_url) || strlen($base_url) == 0)
        {
            $base_url =  $this->request->getAttribute("webroot");
        }
        if(BASE_URL !== "localhost:8080/")
            $base_url = BASE_URL . "webroot" . DS;
        $this->set('base_url',$base_url);
        $this->set('base_url_form',BASE_URL);
    }
    public function index()
    {
        // $this->viewBuilder()->disableAutoLayout();
        // $this->set('layout',false);
    }

    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function create()
    {
        // Tắt auto-rendering
        // $this->autoRender = false;
        if($this->getRequest()->is('post')) {
            $this->business_manage_system->format_birthday_BE($_POST);
            if($this->business_manage_system->create($_POST, $_FILES))
            {
                $this->response = $this->response
                    ->withStatus(200)
                ;
                return $this->response;
            }
            $this->response = $this->response
                ->withStatus(500)
            ;
            return $this->response;
        }
    }

    public function search()
    {
        if($this->getRequest()->is('post')) {
            $data = $this->business_manage_system->getByRequest(['code'=>$_POST['code']]);
            if(empty($data))
            {
                $content = null;
                $this->response
                    ->withStatus(200)
                    ->withType('application/json')
                    ->withStringBody(json_encode(compact('content')));
                return $this->response;
            }
            $this->set(compact('data'));
            $html = $this->render('render_search_result', 'ajax');
            $this->set('layout', false);
            $content = $html->getBody();

            $this->response
                ->withStatus(200)
                ->withType('application/json')
                ->withStringBody(json_encode(compact('content')));

            return $this->response;
        }
    }

    public function getPictureDone()
    {
        $this->autoRender = false;
        $cron = new Cron();
        $cron->getCustomerPictureDone();
    }

    public function test()
    {
        $codeVerifier = bin2hex(random_bytes(32));
        $codeChallenge = rtrim(strtr(base64_encode(hash('sha256', $codeVerifier, true)), '+/', '-_'));
        $authUrl = "https://oauth.zaloapp.com/v4/oa/permission?"
            . "app_id=YOUR_APP_ID"
            . "&code_challenge={$codeChallenge}"
            . "&code_challenge_method=S256"
            . "&redirect_uri=https://nanglucnhatngu-jlpt.site/pages/zalo";
        $this->set('authUrl',$authUrl);
        $session = $this->request->getSession();
        $session->write('zalo_code_verifier', $codeVerifier);
        $session->write('zalo_code_challenge', $codeChallenge);
    }
    public function zalo()
    {
        $request = $this->request;
        $session = $this->request->getSession();

        // 1. Lấy authorization code từ query params
        $authorizationCode = $request->getQuery('code');
        if (empty($authorizationCode)) {
            throw new BadRequestException('Missing authorization code');
        }

        // 2. Lấy lại code_verifier đã lưu trong session (từ bước trước)
        $codeVerifier = $session->read('zalo_code_verifier');
        if (empty($codeVerifier)) {
            throw new BadRequestException('Missing code_verifier');
        }

        // 3. Đổi authorization code lấy access token
        $http = new Client();
        $response = $http->post('https://oauth.zaloapp.com/v4/oa/access_token', [
            'app_id' => '3136401485341879965',
            'app_secret' => 'wOYTcC9BmRG8ISUKZjTm',
            'code' => $authorizationCode,
            'code_verifier' => $codeVerifier,
            'grant_type' => 'authorization_code'
        ]);

        $data = $response->getJson();

        $this->log('Zalo API Response: ' . json_encode($data), 'debug');

        // 4. Lưu access token vào session hoặc database
        $accessToken = $data['access_token'];
        $session->write('zalo_access_token', $accessToken);

        // 5. Lấy thông tin người dùng bằng access token
        $userInfo = $this->getZaloUserInfo($accessToken);

        // 6. Xử lý thông tin người dùng (lưu DB, đăng nhập, v.v.)
        $this->log($userInfo['id'] . " : " .  $userInfo['name']);

        // Redirect hoặc trả về view
        $this->set('user_id',$userInfo['id']);
        $this->set('user_name',$userInfo['name']);
    }

    private function getZaloUserInfo($accessToken) {
        $http = new Client();
        $response = $http->get('https://graph.zalo.me/v2.0/me', [
            'access_token' => $accessToken,
            'fields' => 'id,name,gender,picture'
        ]);

        return $response->getJson();
    }
}
