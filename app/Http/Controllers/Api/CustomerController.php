<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\StoreUpdateCustomerFormRequest;

class CustomerController extends Controller
{
    private $customer;
    private $totalPage = 10;
    
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index(Request $request)
    {
        $customers = $this->customer->getResults($request->all(), $this->totalPage);

        return response()->json($customers);
    }

    public function store(StoreUpdateCustomerFormRequest $request)
    {
        $customer = $this->customer->create($request->all());

        return response()->json($customer, 201); //201 - sucesso de inserção
    }

    public function update(StoreUpdateCustomerFormRequest $request, $id)
    {
        $customer = $this->customer->find($id);

        if (!$customer) {
            return response()->json(['error' => 'Not found'], 404);
        }
        $customer->update($request->all());

        return response()->json($customer, 200);
    }

    public function destroy($id)
    {
        $customer = $this->customer->find($id);

        if (!$customer) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $customer->delete();

        return response()->json(['success' => true], 204);
    }

    public function show($id)
    {
        $customer = $this->customer->find($id);

        if (!$customer) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return response()->json($customer);
    }
}
