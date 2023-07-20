<?php

namespace App\Http\Controllers;

use App\Exceptions\MasterNotFoundHttpException;
use App\Models\Telephone;
use Illuminate\Http\Request;

class TelephoneController extends MasterController
{
    public function __construct(Telephone $model, Request $request) {
        $this->storageFolder = "";
        $this->uploadField = "";
        $this->model = $model;
        $this->request = $request;
    }

    public function customer($id) {
        $data = $this->model::with('customer')->find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException;
        }

        return response()->json($data, 200);
    }
}
