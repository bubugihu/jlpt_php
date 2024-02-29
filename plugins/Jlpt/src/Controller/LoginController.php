<?php

namespace Jlpt\Controller;

use \Jlpt\Controller\AppController;
class LoginController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        if(!empty($_COOKIE['login']))
        {
            setcookie("login", $_COOKIE['login'], time() + 86400, '/');
            $this->redirect( BASE_URL .'jlpt/manage-system/');
        }
    }

    public function index()
    {
        $this->viewBuilder()->disableAutoLayout();
        $this->set('layout',false);
        $this->set('base_url',env('BASE_URL', 'BASE_URL'));
        if($this->request->is('post'))
        {
            $data = $this->request->getData();
            if($data['email'] == 'bubugihu' && $data['password'] == "123")
            {
                setcookie("login", "bubugihu", time() + 86400, '/');
                $this->redirect( BASE_URL .'jlpt/manage-system/');
            }

        }
    }

}
