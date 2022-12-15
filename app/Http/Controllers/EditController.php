<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;

class EditController extends Controller
{
    public function index(Request $request ) {
        $data = $request->session()->all();
        return  view("edit");
    }

    public function targetProduct($id) {
        $controller = new ProductController;
        $product = $controller -> getProduct($id);

        $controller = new CompanyController;
        $company_name = $controller -> getCompanyName($product["company_id"]);
        $company_list = $controller -> getCompanyList();

        return redirect() -> route("edit") -> with([
            "product_id" => $product["id"],
            "product_name" => $product["product_name"],
            "price" => $product["price"],
            "stock" => $product["stock"],
            "comment" => $product["comment"],
            "img_path" => $product["img_path"],
            "company_name" => $company_name,
            "company_list" => $company_list,

        ]);
    }

    public function productEdit(Request $request, $id) {
        $inputs = $request -> all();
        $controller = new CompanyController;
        $controller -> companyRegister($inputs["company_name"]);

        $inputs["company_id"] = $controller -> getCompanyId($inputs["company_name"]);
        
        $controller = new ProductController;
        $controller -> productUpdate($id, $inputs);

        return redirect()->route("list");
    }
}
