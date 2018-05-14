<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Events\ProgressInProgress;
use App\Http\Requests\CustomerForm;
use App\Services\ProgressService;

class CustomerController extends Controller
{
    /**
     * @param ProgressService $progressService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ProgressService $progressService)
    {
        $progress = $progressService->current();
        $customer = new Customer();

        if ($progress) {
            $customer = Customer::firstOrCreate(['id' => $progress->customer_id]);
        }

        return view('form.first', compact('customer'));
    }

    /**
     * @param CustomerForm $request
     * @param ProgressService $progressService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomerForm $request, ProgressService $progressService)
    {
        if ($progress = $progressService->current()) {
            $customer = Customer::find($progress->customer_id);
            $customer->update($request->except('_token'));
        } else {
            $customer = Customer::create($request->except('_token'));
        }

        event(new ProgressInProgress($customer));

        return redirect()->route('second');
    }
}