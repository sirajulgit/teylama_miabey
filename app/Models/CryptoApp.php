<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoApp extends Model
{
    use HasFactory;

    protected $table='crypto_app';


    public function getCryptoAppList()
    {
        $result= $this->where('status', 1)->get();

        foreach ($result as $item) {
            $result["brand_image_url"]= asset('/uploads/images/' . $item['brand_image']);
        }

        return $result;
    }
}
