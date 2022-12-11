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
        CompanyController :: companyRegister($inputs["company_name"]);
        ProductController :: productRegister($inputs);
        return redirect()->route('list');
    }
}
