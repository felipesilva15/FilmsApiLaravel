<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends MasterController
{
    public function __construct(Customer $model, Request $request) {
        $this->storageFolder = "customers";
        $this->uploadField = "image";
        $this->model = $model;
        $this->request = $request;
    }

    public function index() {
        $data = $this->model::paginate(20);

        return response()->json($data, 200);
    }

    public function telephone($id) {
        $data = $this->model::with('telephone')->find($id);

        if (!$data) {
            return response()->json(['error' => 'Nenhum registro encontrado'], 404);
        }

        return response()->json($data, 200);
    }

    public function rentedFilms($id) {
        $data = $this->model::with('rentedFilms')->find($id);

        if (!$data) {
            return response()->json(['error' => 'Nenhum registro encontrado'], 404);
        }

        return response()->json($data, 200);
    }
}
