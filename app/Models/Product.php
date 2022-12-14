<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    protected $fillable = ["company_id", "company_name", "product_name", "price", "stock", "comment", "img_path", "created_at", "updated_at"];


    public function getJoinedList() {
        $products = Product::select(
            "products.id as products_id"
            , "company_id"
            ,"product_name"
            ,"price"
            , "stock"
            , "img_path"
            ,"company_name"
            )
            ->join('companies', 'company_id', '=', 'companies.id');

        return $products;
    }

    public static function destroy($id) {
        $product = Product::find($id);
        $product -> delete();
        return ;
    }

    public function register($items, $company_id) {
        Product::create([
            "company_id" => $company_id,
            'product_name' => $items['product_name'],
            "price" => $items['price'],
            "stock" => $items['stock'],
            "comment" => $items['comment'],
            "img_path" => $items['img_path']
        ]);
        return;
    }

    public function getProduct($id) {
        return Product :: find($id);
    }
}
