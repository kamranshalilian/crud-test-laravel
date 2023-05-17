<?php

namespace App\Lib\Repo;

use App\Models\Customer;

class CustomerRepo extends AbstractMainRepo
{

    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function get()
    {
        return $this->model->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
