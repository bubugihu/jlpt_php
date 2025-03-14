<?php

namespace Jlpt\Controller;

use \Jlpt\Controller\AppController;
use Cake\Log\Log;
use Jlpt\Library\Business\ManageSystem;

class ApiController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->business_manage_system = new ManageSystem();
    }

    public function create()
    {
        dd(123);
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
}
