<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoApp extends Model
{
    use HasFactory;

    protected $table = 'crypto_app';



    public static  function getCryptoAppList()
    {
        $result = self::where('status', '1')->get();

        return $result->map(function ($item) {
            $item['brand_image_url'] = asset('uploads/images/' . $item->brand_image);
            return $item;
        })->toArray();
    }
}
