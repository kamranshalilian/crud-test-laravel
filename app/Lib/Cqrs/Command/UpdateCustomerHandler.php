<?php

namespace App\Lib\Cqrs\Command;

use App\Lib\Cqrs\Command\UpdateCustomerCommand;
use App\Lib\Repo\CustomerRepo;

class UpdateCustomerHandler
{
    private $customerRepo;

    public function __construct(CustomerRepo $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function __invoke(UpdateCustomerCommand $command)
    {
        $this->customerRepo->update(
            $command->getId(),
            [
                "first_name" => $command->getFirstName(),
                "last_name" => $command->getLastName(),
                "date_of_birth" => $command->getDateOfBirth(),
                "phone_number" => $command->getPhoneNumber(),
                "email" => $command->getEmail(),
                "bank_account_number" => $command->getBankAccountNumber(),
            ]
        );
        // other logic, eg queue slack notification, dispatch event etc.
    }
}
