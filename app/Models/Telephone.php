<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
