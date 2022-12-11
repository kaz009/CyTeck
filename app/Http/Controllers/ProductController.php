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
        $products = $model -> getJoinedList();
        return $products;
    }

    public function destroy($id){
        $model = new Product();
        $model ->destroy($id);
        return;
    }

    public function productRegister($items, $company_id) {
        $model = new Product();
        $model -> register($items, $company_id);
        return;
    }

    //public function detail($id){
    //    $model = new Product();
    //    $model -> findProduct($id);
    //
    //    return redirect()->route('detail');
    //}


    
    

    
}


