<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Customer;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * A basic test example.
     */

    public function test_customer_store(): void
    {
        $response = $this->post(
            '/api/customers',
            [
                "first_name" => fake()->name,
                "last_name" => fake()->name,
                "date_of_birth" => now(),
                "phone_number" => "+989168163952",
                "email" => fake()->unique()->safeEmail(),
                "bank_account_number" => "6250941006528599"
            ]
        );

        $response->assertStatus(200);
    }

    public function test_customer_update(): void
    {
        $id = Customer::firstOrFail()->id;
        $response = $this->put(
            '/api/customers/' . $id,
            [
                "first_name" => fake()->name,
                "last_name" => fake()->name,
                "date_of_birth" => now(),
                "phone_number" => "+989168163952",
                "email" => fake()->unique()->safeEmail(),
                "bank_account_number" => "6250941006528599"
            ]
        );

        $response->assertStatus(200);
    }


    public function test_customer_index(): void
    {
        $response = $this->get('/api/customers');

        $response->assertStatus(200);
    }

    public function test_customer_show(): void
    {
        $id = Customer::firstOrFail()->id;

        $response = $this->get('/api/customers/' . $id);

        $response->assertStatus(200);
    }


    public function test_customer_delete(): void
    {
        $id = Customer::firstOrFail()->id;

        $response = $this->delete('/api/customers/' . $id);

        $response->assertStatus(200);
    }
}
