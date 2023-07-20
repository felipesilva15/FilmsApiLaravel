<?php

namespace App\Http\Controllers;

use App\Exceptions\ExternalToolErrorException;
use App\Exceptions\MasterNotFoundHttpException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class MasterController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $model;
    protected $storageFolder;
    protected $request;
    protected $uploadField;

    public function index() {
        $data = $this->model::all();

        return response()->json($data, 200);
    }

    public function store(Request $request) {
        $request->validate($this->model::rules());

        $dataform = $request->all();

        if ($request->hasFile($this->uploadField) && $request->file($this->uploadField)->isValid()) {
            $filename = uniqid(date('His')) . "." . $request->file($this->uploadField)->extension();

            $upload = $request->file($this->uploadField)->storeAs($this->storageFolder, $filename, "public");

            if (!$upload) {
                throw new ExternalToolErrorException("Failed to upload image");
            }

            $dataform[$this->uploadField] = $filename;
        }

        $data = $this->model::create($dataform);

        return response()->json($data, 201);
    }

    public function show($id) {
        $data = $this->model::find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException;
        }

        return response()->json($data, 200);
    }

    public function update(Request $request, $id) {
        $data = $this->model::find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException;
        }

        $request->validate($this->model::rules());

        $dataform = $request->all();

        if ($request->hasFile($this->uploadField) && $request->file($this->uploadField)->isValid()) {
            $oldFile = $this->model->file($id);

            if ($oldFile) {
                Storage::disk('public')->delete("/{$this->storageFolder}/{$oldFile}");
            }

            $filename = uniqid(date('His')) . "." . $request->file($this->uploadField)->extension();

            $upload = $request->file($this->uploadField)->storeAs($this->storageFolder, $filename, "public");

            if (!$upload) {
                throw new ExternalToolErrorException("Failed to upload image");
            }

            $dataform[$this->uploadField] = $filename;
        }

        $data->update($dataform);

        return response()->json($data, 201);
    }

    public function destroy($id) {
        $data = $this->model::find($id);

        if (!$data) {
            throw new MasterNotFoundHttpException;
        }

        if (method_exists($this->model, 'file')) {
            Storage::disk('public')->delete("/{$this->storageFolder}/{$this->model->file($id)}");
        }

        $data->delete();

        return response()->json(['message' => 'Registro deletado com sucesso!'], 200);
    }
}
