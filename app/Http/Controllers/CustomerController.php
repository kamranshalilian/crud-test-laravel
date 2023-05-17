<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerEditRequest;
use App\Http\Requests\CustomerAddRequest;
use App\Lib\Cqrs\Command\CreateCustomerCommand;
use App\Lib\Cqrs\Command\UpdateCustomerCommand;
use App\Lib\Cqrs\Command\DeleteCustomerCommand;
use App\Lib\Cqrs\CommandBus;
use App\Lib\Cqrs\Query\CustomerFindQuery;
use App\Lib\Cqrs\Query\CustomerIndexQuery;

class CustomerController extends Controller
{

    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(CustomerIndexQuery $customerIndexQuery)
    {
        return $customerIndexQuery->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerAddRequest $request)
    {
        $command = new CreateCustomerCommand(
            $request->first_name,
            $request->last_name,
            $request->date_of_birth,
            $request->phone_number,
            $request->email,
            $request->bank_account_number
        );

        $this->commandBus->handle($command);

        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, CustomerFindQuery $customerFindQuery)
    {
        $customerFindQuery->setCustomerId($id);

        return $customerFindQuery->find();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerEditRequest $request, string $id)
    {
        $command = new UpdateCustomerCommand(
            $request->first_name,
            $request->last_name,
            $request->date_of_birth,
            $request->phone_number,
            $request->email,
            $request->bank_account_number,
            $id
        );

        $this->commandBus->handle($command);

        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $command = new DeleteCustomerCommand(
            $id
        );

        $this->commandBus->handle($command);

        return response()->json([
            'message' => 'success',
        ]);
    }
}
