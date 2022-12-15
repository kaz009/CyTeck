@extends('layouts.app')

@section('content')


<form action="{{ route('registerButton') }}" method="POST">
    <div>
        <input type="text" placeholder="商品名を入力" name="product_name" value = "@if (isset($product_name)) {{ $product_name }} @endif" required>
    </div>

    <select name="company_name" data-toggle="select" value="@if (isset($company_name)) {{ $company_name }} @endif">
        <option value="">メーカーを選択</option>
        @foreach ($company_list as $company)
        <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
        @endforeach
    </select>




    <div>
        <input type="number" placeholder="価格を入力" name="price" value = "@if (isset($price)) {{ $price }} @endif" required>
    </div>
    <div>
        <input type="number" placeholder="在庫を入力" name="stock" value = "@if (isset($stock)) {{ $stock }} @endif" required>
    </div>
    <div>
        <input type="text" placeholder="コメントを入力" name="comment" value = "@if (isset($comment)) {{ $comment }} @endif" >
    </div>
    <div>
        <input type="file" name="img_path" value = "@if (isset($img_path)) {{ $img_path }} @endif" >
    </div>
    <div>
        @csrf
        <button type="submit">登録</button>
    </div>
</form>
<div>
    <a class="rounded-md bg-gray-800 text-white px-4 py-2" href="{{ route('list') }}">戻る</a>
</div>

@endsection
