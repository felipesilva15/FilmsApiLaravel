<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Location",
 *      required={"title"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="customer_id", type="integer", example=1),
 *      @OA\Property(property="film_id", type="integer", example=1),
 *      @OA\Property(property="date", type="string", format="date", example="2024-01-19")
 * )
 */
class Location extends Model
{
    use HasFactory;
}
