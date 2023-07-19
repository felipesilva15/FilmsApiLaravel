<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'cpf_cnpj'];

    public static function rules(): Array {
        return [
            'name' => 'required|string',
            'image' => 'image',
            'cpf_cnpj' => 'required|string|unique:clients'
        ];
    }

    public function file($id) {
        return $this->find($id)->image;
    }
}
