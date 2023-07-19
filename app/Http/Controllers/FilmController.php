<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends MasterController
{
    public function __construct(Film $model, Request $request) {
        $this->storageFolder = "films";
        $this->uploadField = "cover_image";
        $this->model = $model;
        $this->request = $request;
    }
}
