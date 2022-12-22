<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;

class listController extends Controller
{
    public function index() {
        $controller = new CompanyController;
        $companies = $controller->getCompanyList();

        $controller = new ProductController;
        $products = $controller->getProductList()->get();

        return view("list")->with([
            "companies"=>$companies,
            "products"=>$products
        ]);


    }

    public function showList(Request $request) {


        $controller = new ProductController;
        $query = $controller->getProductList();

        $search1 = $request->search1;
        $search2 = $request->search2;
        $search3 = $request->search3;
        $search4 = $request->search4;
        $search5 = $request->search5;
        $search6 = $request->search6;


        //キーワード検索
        if ($search1) {

            $spaceConversion = mb_convert_kana($search1, "s");

            $wordArraySearched = preg_split("/[\s,]+/", $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where("product_name", "like", "%".$value."%");
            }


        }

        //社名検索
        if ($search2) {
            $query->where("company_name", "=", $search2);
        }

        //価格検索
        if($search3 > $search4) {
            $query->where("price", "<", $search3)
                ->where("price", ">", $search4);
        }


        //在庫検索

        if($search5 > $search6) {
            $query->where("stock", "<", $search5)
                ->where("stock", ">", $search6);
        }


        $products = $query->get();

        return response($products);
    }

    public function destroy($id) {
        $controller = new ProductController;
        $controller->destroy($id);
        $products = $controller->getProductList()->get();
        return response($products);
    }

    public function productRegister($inputs) {
        $controller = new CompanyController;
        $company_id = $controller->getCompanyId($inputs["company_name"]);

        $controller = new ProductController;
        $controller->productRegister($inputs, $company_id);
        return;
    } 

}
