<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends MasterController
{
    public function __construct(Customer $customers, Request $request)
    {
        $this->storageFolder = "customers";
        $this->uploadField = "image";
        $this->model = $customers;
        $this->request = $request;
    }
}
