<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends MasterController
{
    public function __construct(User $model, Request $request) {
        $this->storageFolder = "users";
        $this->model = $model;
        $this->request = $request;
    }
}
