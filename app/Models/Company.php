<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    protected $fillable = ['company_name',"street_address", "representative_name", "created_at", "updated_at"];

    public function getList() {
        $companies = Company::get();

        return $companies;
    }

    public function getId($company_name) {
        $company_id = Company :: where('company_name', '=', $company_name)
            ->value('id');
        
        return $company_id;
    }

    public function getName($company_id) {
        $company_name = Company :: where('id', '=', $company_id)
            ->value('company_name');

        return $company_name;
    }
 
    public function register($company_name) {
        $check = Company::where("company_name", "=" , $company_name)->exists();
        if(!$check){
            Company::create(['company_name' => $company_name]);
        }
        return ;
    }
}
