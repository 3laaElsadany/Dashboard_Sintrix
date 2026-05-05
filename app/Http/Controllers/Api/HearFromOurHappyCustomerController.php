<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHearFromOurHappyCustomerRequest;
use App\Http\Requests\UpdateHearFromOurHappyCustomerRequest;
use App\Http\Resources\HearFromOurHappyCustomerResource;
use App\Models\HearFromOurHappyCustomer;
use Illuminate\Http\Request;

class HearFromOurHappyCustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HearFromOurHappyCustomerResource::collection(
            HearFromOurHappyCustomer::latest()->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHearFromOurHappyCustomerRequest $request)
    {
        $customer = HearFromOurHappyCustomer::create(
            $request->validated()
        );

        return $customer;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = HearFromOurHappyCustomer::findOrFail($id);

        return new HearFromOurHappyCustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHearFromOurHappyCustomerRequest $request, string $id)
    {
        $customer = HearFromOurHappyCustomer::findOrFail($id);

        $customer->update($request->validated());

        return new HearFromOurHappyCustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = HearFromOurHappyCustomer::findOrFail($id);

        $customer->delete();

        return response()->json([
            'message' => 'Deleted successfully'
        ], 200);
    }
}
