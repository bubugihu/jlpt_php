<?php

namespace App\Model\Table;

class ProductTable extends AppTable
{
    protected $condition = [];

    public function initialize(array $config): void
    {

        $this->condition = ['del_flag' => UNDEL, 'active' => ACTIVE];
        $this->hasOne("Quoting",[
            'foreignKey' => 'code',
            'bindingKey' => 'code'
        ])->setConditions(['Quoting.del_flag' => UNDEL]);
    }
}
