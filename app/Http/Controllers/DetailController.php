<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;

class DetailController extends Controller
{
    public function index() {
        return view('detail');
    }

    public function targetProduct($id) {
        $controller = new ProductController;
        $product = $controller -> getProduct($id);

        $controller = new CompanyController;
        $company_name = $controller -> getCompanyName($product['company_id']);

        return view('detail') -> with([
            'product' => $product,
            'company_name' => $company_name
        ]);
    }
}
