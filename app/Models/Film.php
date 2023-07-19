<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover_image'];

    public static function rules(): Array {
        return [
            'title' => 'required|string',
            'cover_image' => 'image'
        ];
    }

    public function file($id) {
        return $this->find($id)->cover_image;
    }
}
