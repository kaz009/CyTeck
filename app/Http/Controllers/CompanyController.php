<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public static function companyRegister($company_name){
        $model = new Company();
        $company = $model -> register($company_name);
        return;
    } 

    public static function getCompanyId($company_name){
        $model = new Company();
        $company_id = $model -> getId($company_name);
        return $company_id;
    }
}
