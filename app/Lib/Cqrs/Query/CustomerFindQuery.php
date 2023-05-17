<?php

namespace App\Lib\Cqrs\Query;

use App\Lib\Repo\CustomerRepo;

class CustomerFindQuery
{
    private $customerId;
    private $customerRepo;
    public function __construct(CustomerRepo $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function setCustomerId($id)
    {
        $this->customerId = $id;
    }

    public function find()
    {
        return $this->customerRepo->find($this->customerId);
    }
}
