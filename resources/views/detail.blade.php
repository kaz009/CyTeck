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
@endsection
