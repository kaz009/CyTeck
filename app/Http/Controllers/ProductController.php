<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{


    public function showList(Request $request) {

        $products = Product::paginate(20);

        $search = $request->input('search');

        $query = Product::query();

        if ($search) {

            $spaceConversion = mb_convert_kana($search, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('product_name', 'like', '%'.$value.'%');
            }

            $products = $query->paginate(20);

        }

        return view('list')
            ->with([
                'products' => $products,
                'search' => $search,
            ]);
    }
}
