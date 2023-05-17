<?php

namespace App\Lib\Cqrs\Command;

class UpdateCustomerCommand
{
    private $firstName;
    private $lastName;
    private $dateOfBirth;
    private $phoneNumber;
    private $email;
    private $bankAccountNumber;
    private $id;

    public function __construct($firstName, $lastName, $dateOfBirth, $phoneNumber, $email, $bankAccountNumber, $id)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->bankAccountNumber = $bankAccountNumber;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getBankAccountNumber()
    {
        return $this->bankAccountNumber;
    }

    public function getId()
    {
        return $this->id;
    }
}
