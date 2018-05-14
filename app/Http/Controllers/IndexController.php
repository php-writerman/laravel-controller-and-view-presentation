<?php
namespace App\Http\Controllers;

use App\Customer;
use App\Events\ProgressStart;
use App\Progress;

class IndexController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        event(new ProgressStart());

        return view('index', [
            'customers' => Customer::all(),
            'progress' => Progress::all(),
            'current' => Progress::whereUuid(session('uuid'))->first()
        ]);
    }
}