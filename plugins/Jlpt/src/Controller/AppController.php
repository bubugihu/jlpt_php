<?php
declare(strict_types=1);

namespace Jlpt\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    public function initialize(): void
    {
        parent::initialize();
        $controller = $this->request->getParam('controller');
        if($controller != "Login" && $controller != "Api")
        {
            if(!empty($_COOKIE['login']))
            {
                setcookie("login", $_COOKIE['login'], time() + 86400, '/');
            }else{
                header('Location: ' . BASE_URL . 'jlpt/login/');
                exit;
            }
        }
    }
}
