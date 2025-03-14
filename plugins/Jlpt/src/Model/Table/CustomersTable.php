<?php

namespace Jlpt\Model\Table;

class CustomersTable extends AppTable
{
    protected $condition = [];

    public function initialize(array $config): void
    {

        $this->condition = ['del_flag' => UNDEL, 'active' => ACTIVE];
        $this->hasOne("University",[
            'foreignKey' => 'id',
            'bindingKey' => 'university_id'
        ]);
    }
}
