<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ["product_id", "created_at", "updated_at"];


    public function addList($product_id) {
        $sales = Sale::create([
            "product_id"=>$product_id,
        ]);
    }


}
