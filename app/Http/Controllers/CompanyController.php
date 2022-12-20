<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function getCompanyList() {
        $model = new Company();
        $companies = $model->getList();
        return $companies;
    }


    public function companyRegister($company_name) {
        $model = new Company();
        $company = $model->register($company_name);
        return;
    } 

    public function getCompanyId($company_name) {
        $model = new Company();
        $company_id = $model->getId($company_name);
        return $company_id;
    }

    public function getCompanyName($company_id) {
        $model = new Company();
        $company_name = $model->getName($company_id);
        return $company_name;
    }
}
