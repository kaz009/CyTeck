<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Models\Product;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }


    public function productRegister(Request $request) {
        $inputs = $request -> all();
        $data = CompanyController :: getCompanyData($inputs["company_name"]);
        $company_id = $data -> first() -> value("company_name");
 //ここ1行目が帰ってくる。要修正

        $model = new Product();
        $model -> register($inputs); 
        return redirect()->route('list');
    }
}
