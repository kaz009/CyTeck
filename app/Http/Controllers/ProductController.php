<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Models\Product;
use App\Models\Company;

class ProductController extends Controller
{
    public function getProductList() {
        $model = new Product();
        $products = $model->getJoinedList();
        return $products;
    }

    public function getProduct($id) {
        $model = new Product();
        $product = $model->getProduct($id);
        return $product;
    }

    public function destroy($id) {
        $model = new Product();
        $model->destroy($id);
        return;
    }

    public function productRegister($items, $company_id) {
        $model = new Product();
        $model->register($items, $company_id);
        return;
    }

    public function productUpdate($id, $products) {
        $model = new Product();
        $product = $model->productUpdate($id, $products);
        return;
    }
}
