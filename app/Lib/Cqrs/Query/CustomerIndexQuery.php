<?php

namespace App\Lib\Cqrs\Query;

use App\Lib\Repo\CustomerRepo;

class CustomerIndexQuery
{
    private $customerRepo;
    public function __construct(CustomerRepo $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function index()
    {
        return $this->customerRepo->get();
    }
}
