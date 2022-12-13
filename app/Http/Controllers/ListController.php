<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;

class listController extends Controller
{
    public function showList(Request $request) {

        $controller = new CompanyController;
        $companies = $controller -> getCompanyList();

        $controller = new ProductController;
        $query = $controller -> getProductList();

        $search1 = $request->input('search1');
        $search2 = $request->input('search2');

        
        //キーワード検索
        if ($search1) {

            $spaceConversion = mb_convert_kana($search1, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('product_name', 'like', '%'.$value.'%');
            }


        }

        //社名検索
        if ($search2) {
            $query->where('company_name', 'like', $search2);
        }
        

        $products = $query->get();

       

        return view('list')
            ->with([
                'products' => $products,
                'companies' => $companies,
            ]);
    }

    public function destroy($id) {
        if(!window.confirm('本当に削除しますか？'))
            return;
        $controller = new ProductController;
        $controller -> destroy($id);
        return redirect()->route('list');
    }


    public function productRegister($inputs){
        $controller = new CompanyController;
        $company_id = $controller -> getCompanyId($inputs["company_name"]);

        $controller = new ProductController;
        $controller -> productRegister($inputs, $company_id);
        return;
    } 

}
