@extends('layouts.app')

@section('content')




<div>
    <form method="GET" action="{{ route('list') }}">
        <input type="search" placeholder="商品名を入力" id="search1" value="@if (isset($search1)) {{ $search1 }} @endif">
        <div>
            <div>
                <div>
                    <select id="search2" data-toggle="select" value="@if (isset($search2)) {{ $search2 }} @endif">
                        <option value="">会社名絞り込み</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button id="searchBtn" type="button">検索</button>
        </div>
    </form>
</div>

<div class="links">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫</th>
                <th>メーカー</th>
            </tr>
            <div class="table">
                <tr>
                    <td>{{ json_decode($products)}}</td>
                    <td>
                        <form action="{{ route('productDetail', ['id'=>$product->products_id]) }}" method="POST">
                            @csrf
                            <button type="submit">詳細</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('productDestroy', ['id'=>$product->products_id]) }}" method="POST">
                            @csrf
                            <button id="delBtn" type="submit" onclick='return confirm("削除しますか");' >削除</button>
                        </form>
                    </td>
                </tr>
            </div>
        </thead>
    </table>
    <div>
        <button type="submit">
            <a class="rounded-md bg-gray-800 text-white px-4 py-2" href="{{ route('productRegister') }}">新規登録</a>
        </button>
    </div>
</div>
<script src="{{ asset('js/list.js') }}" defer></script>
@endsection
