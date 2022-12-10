<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public static function getCompanyData($company_name){
        $model = new Company();
        $company = $model -> register($company_name);
        $result = $company -> value("id");
        return $company;
    }
    

    
}
