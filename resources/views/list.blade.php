@extends('layouts.app')

@section('content')




<div>
    <div>
        <input type="search" placeholder="商品名を入力" id="search1" value="@if (isset($search1)) {{ $search1 }} @endif">
        <div>
            <select id="search2" data-toggle="select" value="@if (isset($search2)) {{ $search2 }} @endif">
                <option value="">会社名絞り込み</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <a>価格:</a>
            <input type="search" placeholder="上限" id="search3" value="@if (isset($search3)) {{ $search3 }} @endif">
            <input type="search" placeholder="下限" id="search4" value="@if (isset($search4)) {{ $search4 }} @endif">
        </div>
        <div>
            <a>在庫:</a>
            <input type="search" placeholder="上限" id="search5" value="@if (isset($search5)) {{ $search5 }} @endif">
            <input type="search" placeholder="下限" id="search6" value="@if (isset($search6)) {{ $search6 }} @endif">
        </div>

        <button id="searchBtn" type="button">検索</button>
        <button>
            <a href="{{ route('list') }}" class="text-white">クリア</a>
        </button>
    </div>
</div>

<div class="links">
    <table id="sort">
        <thead>
            <tr>
                <th>ID</th>
                <th>画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫</th>
                <th>メーカー</th>
            </tr>
        </thead>

        <tbody id="table" class="table">
            @foreach($products as $product)
            <tr>
                <td>{{ $product->products_id }}</td>
                <td>{{ $product->img_path }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company_name }}</td>
                <td>
                    <form action="{{ route('productDetail', ['id'=>$product->products_id]) }}" method="POST">
                        @csrf
                        <button type="submit">詳細</button>
                    </form>
                </td>
                <td>
                <button class="delBtn" id="{{ $product->products_id }}" type="submit" onclick='return confirm("削除しますか");'>削除</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <button type="submit">
            <a class="rounded-md bg-gray-800 text-white px-4 py-2" href="{{ route('productRegister') }}">新規登録</a>
        </button>
    </div>
</div>
<script src="{{ asset('js/list.js') }}" defer></script>
@endsection
