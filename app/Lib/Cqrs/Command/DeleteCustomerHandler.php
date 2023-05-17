<?php

namespace App\Lib\Cqrs\Command;

use App\Lib\Cqrs\Command\DeleteCustomerCommand;
use App\Lib\Repo\CustomerRepo;

class DeleteCustomerHandler
{
    private $customerRepo;

    public function __construct(CustomerRepo $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function __invoke(DeleteCustomerCommand $command)
    {
        $this->customerRepo->delete($command->getId());
        // other logic, eg queue slack notification, dispatch event etc.
    }
}
