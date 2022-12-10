<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{


    public function getList() {
        $products = Product::select(
            "products.id as products_id"
            , "company_id"
            ,"product_name"
            ,"price"
            , "stock"
            , "comment"
            , "img_path"
            , "products.created_at as products_created_at"
            , "products.updated_at as products_updated_at"
            ,"company_name"
            )
            ->join('companies', 'company_id', '=', 'companies.id');
            

           

        return $products;
    }

    public static function destroy($id)
    {
        $product = Product::find($id);
        $product -> delete();
        return ;
    }
}