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
        $model->subProduct($id);

        $model = new Sale;
        $model->addList($id);

    }

}
