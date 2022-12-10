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
        $companies = Company::get();
        $companies->where('company_name', 'like', $company_name);
        $company_id = $companies ->value('id');
        return $company_id;
    }

    public function getName($company_id) {
        $companies = Company :: get();
        $companies->where('id', 'like', $company_id);
        $company_name = $companies ->value('company_name');

        return $company_name;
    }
 
    public function register($company_name){
        
        
        $result = Company :: firstOrCreate(['company_name' => $company_name]);
        return $result;
    }
}
