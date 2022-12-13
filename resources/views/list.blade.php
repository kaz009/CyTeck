@extends('layouts.app')

@section('content')


<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>




        <div>
            <form method="GET" action="{{ route('list') }}">
                <input type="search" placeholder="商品名を入力" name="search1" value="@if (isset($search1)) {{ $search1 }} @endif">
                <div>
                    <div>
                        <div>
                            <select name="search2" data-toggle="select" value="@if (isset($search2)) {{ $search2 }} @endif">
                                <option value="">会社名絞り込み</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit">検索</button>
                    <button>
                        <a href="{{ route('list') }}" class="text-white">
                            クリア
                        </a>
                    </button>
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
                            <form action="{{ route('productDestroy', ['id'=>$product->products_id]) }}" method="POST">
                                @csrf
                                <button id="delBtn" type="submit" onclick='return confirm("削除しますか");' >削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </thead>
            </table>
            <div>
                <button type="submit">
                    <a class="rounded-md bg-gray-800 text-white px-4 py-2" href="{{ route('register') }}">新規登録</a>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- <script src="{{ asset('list.js') }}"></script> --}}
@endsection