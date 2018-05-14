<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Events\ProgressDone;
use App\Http\Requests\PartnerForm;
use App\Partner;
use App\Services\ProgressService;

class PartnerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('form.second');
    }

    /**
     * @param PartnerForm $request
     * @param ProgressService $progressService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(PartnerForm $request, ProgressService $progressService)
    {
        if ($progress = $progressService->current()) {
            $partner = new Partner($request->all());
            $customer = Customer::find($progress->customer_id);

            $partner->customer()->associate($customer);
            $partner->save();

            event(new ProgressDone());
        }

        return view('form.finish');
    }
}
