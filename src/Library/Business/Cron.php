<?php

namespace App\Library\Business;

use Cake\Chronos\Date;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;
use Cake\Log\Log;
use Jlpt\Library\Business\Entity;
class Cron extends Entity
{
    public $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->_getProvider("Customers");
        
    }

    public function getCustomerPictureDone()
    {
        $condtion_picture = [
            'exam'  =>  "25A",
            'del_flag'  => UNDEL,
            'active'    =>  ACTIVE,
            'is_picture'    => INACTIVE
        ];

        $list_picture = $this->selectList($condtion_picture);

        if(!empty($list_picture))
        {
            foreach($list_picture as $picture)
            {
                if(!empty($picture->pic) && !empty($picture->avatar))
                {
                    $picture->is_picture = ACTIVE;
                    $result_copy_avatar = $this->copy_image($picture->avatar,'avatar',$picture->exam);
                    $result_copy_cccd = $this->copy_image($picture->pic,'cccd',$picture->exam);
                    if($result_copy_avatar && $result_copy_cccd)
                    {
                        // $this->table->save($picture);
                    }
                }
            }
        }
        echo "List Picture: " . count($list_picture); exit;

    }

}
