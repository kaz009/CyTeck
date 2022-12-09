<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;

class ProductController extends Controller
{


    public function showList(Request $request) {

                
        $model = new Company();
        $companies = $model->getList();
        
        $model = new Product();
        $query = $model  ->getList();
        $products = $model ->getList() ;

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

    public function destroy($id)
    {
        $model = new Product() ;
        $model ->destroy($id);
      
        return redirect()->route('list');
    }
}


