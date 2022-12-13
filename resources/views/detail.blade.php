@extends('layouts.app')

@section('content')
<div>
    <a>商品ID:<?php echo $product["id"];?> </a>
</div>
<div>
    <a>商品画像:<?php echo $product["img_path"];?> </a>
</div>
<div>
    <a>商品名:<?php echo $product["product_name"];?> </a>
</div>
<div>
    <a>メーカー:<?php echo $company_name ;?> </a>
</div>
<div>
    <a>価格:<?php echo $product["price"];?> </a>
</div>
<div>
    <a>在庫:<?php echo $product["stock"];?> </a>
</div>
<div>
    <a>コメント:<?php echo $product["comment"];?> </a>
</div>
<div>
    <form action="{{ route('editButton', ['id'=>$product->id]) }}" method="POST">
        @csrf
        <button type="submit">
            編集
        </button>
    </form>
</div>
<div>
    <a class="rounded-md bg-gray-800 text-white px-4 py-2" href="{{ route('list') }}">戻る</a>
</div>
@endsection
