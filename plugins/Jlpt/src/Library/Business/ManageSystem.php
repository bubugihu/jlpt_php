<?php

namespace Jlpt\Library\Business;

use Cake\Log\Log;
use Cake\I18n\FrozenTime;
use Cake\Mailer\Email;

class ManageSystem extends Entity
{
    public $model_customers;
    public function __construct()
    {
        parent::__construct();
        $this->model_customers = $this->_getProvider("Jlpt.Customers");
    }

    public function getOne($id)
    {
        return $this->model_customers->selectOne(['id'=>$id]);
    }
    public function getList($key_search = "", $key_write = 0, $key_payment = 0, $key_exam = "25A",  $page = 1, $export = false)
    {
        $condition = [
            'is_write' => $key_write,
            'is_payment' => $key_payment,
            'exam' => $key_exam,
            'OR' => [
                'CONCAT(last_name, " ", first_name) LIKE' => "%" . $key_search . "%",
                'code LIKE' => "%" . $key_search . "%",
                'exam LIKE' => "%" . $key_search . "%",
                'phone LIKE' => "%" . $key_search . "%",
                'level LIKE' => "%" . $key_search . "%",
            ]
        ];

        if($key_write == "")
        {
            unset($condition['is_write']);
        }

        if($key_payment == "")
        {
            unset($condition['is_payment']);
        }

        if($key_exam == "")
        {
            unset($condition['exam']);
        }

        $order = [
              'is_write'    =>  "ASC",
              'is_payment'    =>  "ASC",
              'is_picture'    =>  "ASC",
              'level'    =>  "ASC",
            'last_name'    =>  "ASC",
            'first_name'    =>  "ASC",
        ];
        return $this->model_customers->getData($page, $condition, [], [], $order, $export);
    }

    public function update($params,$file)
    {
        try{
            if(!empty($file['pic']['name']))
            {
                $pic = $this->upload_image($file,"pic", $params, "cccd");
                $params['pic'] = $pic;
            }

            if(!empty($file['avatar']['name']))
            {
                $pic = $this->upload_image($file,"avatar", $params, "avatar");
                $params['avatar'] = $pic;
            }

            $id = $params['id'];
            unset($params['id']);
            // $params['code'] = $params['phone'] . substr($params['cccd'], -3);
            $this->model_customers->updateAll($params, ['id'=>$id]);

            if(!empty($params['is_write']) && !empty($params['exam']))
            {
                $this->move_image($id);
            }
        }catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return false;
        }
        return true;
    }

    public function create($params,$file)
    {
        try{
            if(!empty($file['pic']['name']))
            {
                $pic = $this->upload_image($file,"pic", $params, "cccd");
                $params['pic'] = $pic;
            }

            if(!empty($file['avatar']['name']))
            {
                $pic = $this->upload_image($file,"avatar", $params, "avatar");
                $params['avatar'] = $pic;
            }
            $new_time = new FrozenTime();
            $params['code'] = $params['exam'] . $new_time->format("YmdHis");
            $params['del_flag'] = UNDEL;
            $new = $this->model_customers->newEntity($params);
            $new = $this->model_customers->save($new);

            //sendmail
            $email = new Email('default');
            $email->setTransport('default');

            $result = $email
                ->setFrom(['nanglucnhatngu.jlpt.hcm@gmail.com' => 'nanglucnhatngu.jlpt.hcm@gmail.com'])
                ->setTo('nanglucnhatngu.jlpt.hcm@gmail.com')
                ->setEmailFormat('text')
                ->setSubject('Có đăng ký mới')
                ->send('Có đăng kí mới, check mail đi');
        }catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return false;
        }
        return $new->id;
    }

    public function format_birthday_BE(&$params)
    {
        if(!empty($params['birthday_display']))
        {
            $results = explode("/",$params['birthday_display']);
            if(count($results) == 3)
            {
                $params['year'] = $results[0];
                $params['month'] = $results[1];
                $params['day'] = $results[2];
                unset($params['birthday_display']);
            }

        }
    }

    public function delete($id)
    {
        try{
            $this->model_customers->updateAll(['del_flag'=>1], ['id'=>$id]);
        }catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return false;
        }
        return true;
    }

    public function updateInfo($params)
    {
        try{
            $list_entities = $this->model_customers->newEntities($params);
            $this->model_customers->saveMany($list_entities);
        }catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return false;
        }
        return true;
    }
    public function saveList($params)
    {
        try{
            $list_entities = $this->model_customers->newEntities($params);
            $this->model_customers->saveMany($list_entities);
        }catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return false;
        }
        return true;
    }

    public function move_image($id)
    {
        $customer = $this->model_customers->selectOne(['id'=>$id]);

        if (!file_exists('img/jlpt/' . $customer->exam . "/cccd")) {
            mkdir('img/jlpt/' .  $customer->exam . "/cccd", 0777, true);
        }
        $img_root = WWW_ROOT . 'img/jlpt/' . $customer->pic;
        $img = 'img/jlpt/' .  $customer->exam . "/cccd/" . $customer->pic;

        if(file_exists(WWW_ROOT  .$img))
        {
            unlink(WWW_ROOT . $img);
        }

        copy($img_root, WWW_ROOT . $img);

        if (!file_exists('img/jlpt/' . $customer->exam . "/avatar")) {
            mkdir('img/jlpt/' .  $customer->exam . "/avatar", 0777, true);
        }
        $img_root = WWW_ROOT . 'img/jlpt/' . $customer->avatar;
        $img = 'img/jlpt/' .  $customer->exam . "/avatar/" . $customer->avatar;
        if(file_exists(WWW_ROOT  .$img))
        {
            unlink(WWW_ROOT . $img);
        }
        copy($img_root, WWW_ROOT . $img);
    }

    public function getByRequest($condition)
    {
        return $this->model_customers->selectList($condition,['University']);
    }
}
