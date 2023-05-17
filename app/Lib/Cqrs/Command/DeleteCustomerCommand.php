<?php

namespace App\Lib\Cqrs\Command;

class DeleteCustomerCommand
{
    private $id;
    
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
