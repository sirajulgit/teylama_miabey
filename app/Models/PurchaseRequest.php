<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    use HasFactory;

    protected $table='purchase_request';

    protected $fillable = [
        'user_id',
        'product_id',
        'qnty',
        'unit_amount',
        'total_amount',
        'crypto_app_id',
        'currency',
    ];
}
