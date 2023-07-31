<?php

namespace App\Http\Controllers;

use App\Exceptions\MasterNotFoundHttpException;
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

    public function index(Request $request) {
        $query = $this->model::query();
        $filters = $request->all();

        $othersFillableFields = ['id', 'created_at', 'updated_at'];

        foreach ($filters as $field => $value) {
            if (in_array($field, $this->model->getFillable()) || in_array($field, $othersFillableFields)) {
                if (gettype($value) == 'string') {
                    $query->where($field, 'like', '%'.trim($value).'%');
                } else {
                    $query->where($field, $value);
                }
            }
        }

        $data = $query->paginate(20);

        return response()->json($data, 200);
    }

    public function telephone($id) {
        $data = $this->model::with('telephone')->find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException;
        }

        return response()->json($data, 200);
    }

    public function rentedFilms($id) {
        $data = $this->model::with('rentedFilms')->find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException;
        }

        return response()->json($data, 200);
    }
}
