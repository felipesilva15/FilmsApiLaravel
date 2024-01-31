<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Film",
 *      required={"title"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="title", type="string", example="Toy Story 4", maxLength=150),
 *      @OA\Property(property="image", type="string", format="binary"),
 *      @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-30T03:00:00.000000Z"),
 *      @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-30T03:00:00.000000Z")
 * )
 */
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
