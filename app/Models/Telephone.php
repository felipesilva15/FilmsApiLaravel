<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Telephone",
 *      required={"number", "customer_id"},
 *      @OA\Property(property="id", type="integer", example=1),
 *      @OA\Property(property="number", type="string", example="+551140028922", maxLength=20),
 *      @OA\Property(property="customer_id", type="integer", example=1)
 * )
 */
class Telephone extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'customer_id'];

    public static function rules(): Array {
        return [
            'number' => 'required|string|max:20',
            'customer_id' => 'required'
        ];
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
