<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Sale;

class SalesController extends Controller
{
    public function saleProduct($id) {
        $model = new Product;
        $product = $model->getProduct($id);
        if ($product["stock"]<=0){
            $result = config('message.error');

        }else{
            $model->subProduct($id);

            $model = new Sale;
            $model->addList($id);
            $result = "success";
        }

        return $result;

    }

}
