@extends('layouts.app')

@section('content')

<?php
$id = session() -> get("product_id");
$product_name = session() -> get("product_name");
$company_name = session() -> get("company_name");
$price = session() -> get("price");
$stock = session() -> get("stock");
$comment = session() -> get("comment");
$img_path = session() -> get("img_path");
?>


<div>
    <a>商品ID:{{ $id }} </a>
</div>

<form action="{{ route('productEdit', ['id'=>$id]) }}" method="POST" >
    <div>
        <input type="text" placeholder="商品名を入力" name="product_name" value = "@if (isset($product_name)) {{ $product_name }} @endif" >
    </div>
    <div>
        <input type="text" placeholder="メーカー名を入力" name="company_name" value = "@if (isset($company_name)) {{ $company_name }} @endif" >
    </div>
    <div>
        <input type="text" placeholder="価格を入力" name="price" value = "@if (isset($price)) {{ $price }} @endif" >
    </div>
    <div>
        <input type="text" placeholder="在庫を入力" name="stock" value = "@if (isset($stock)) {{ $stock }} @endif" >
    </div>
    <div>
        <input type="text" placeholder="コメントを入力" name="comment" value = "@if (isset($comment)) {{ $comment }} @endif" >
    </div>
    <div>
        <input type="file" name="img_path" value = "@if (isset($img_path)) {{ $img_path }} @endif" >
    </div>
    <div>
        @csrf
        <button type="submit">変更</button>
    </div>
</form>
<form action="{{ route('productDetail', ['id'=>$id]) }}" method="POST" >
    <div>
        @csrf
        <button type="submit">戻る</button>
    </div>
</form>

@endsection