<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Models\Product;

class RegisterController extends Controller
{

    public function index() {
        $controller = new CompanyController;
        $company_list = $controller -> getCompanyList();

        return view("register") -> with(["company_list" => $company_list]);
    }


    public function productRegister(Request $request) {
        $inputs = $request -> all();

        $controller = new CompanyController;
        $controller -> companyRegister($inputs["company_name"]);
        $company_id = $controller -> getCompanyId($inputs["company_name"]);

        $controller = new ProductController;
        $controller -> productRegister($inputs, $company_id);

        return redirect()->route("list");
    }
}
