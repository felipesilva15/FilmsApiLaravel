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
            'cpf_cnpj' => 'required|string|unique:customers'
        ];
    }

    public function file($id) {
        return $this->find($id)->image;
    }

    public function telephone() {
        return $this->hasMany(Telephone::class);
    }

    public function rentedFilms() {
        return $this->belongsToMany(Film::class, 'locations');
    }
}
