<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Customer",
 *      required={"name", "cpf_cnpj"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="name", type="string", example="Felipe", maxLength=150),
 *      @OA\Property(property="image", type="string", format="binary"),
 *      @OA\Property(property="cpf_cnpj", type="string", example="15985687599", maxLength=14),
 *      @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-30T03:00:00.000000Z"),
 *      @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-30T03:00:00.000000Z")
 * )
 */
class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'cpf_cnpj'];

    public static function rules(): Array {
        return [
            'name' => 'required|string',
            'image' => 'image',
            'cpf_cnpj' => 'required|string|unique:customers|max:14'
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
