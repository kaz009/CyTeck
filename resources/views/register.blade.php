@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>商品新規登録画面</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <form action="{{ route('registerButton') }}" method="POST">
            <div>
                <input type="text" placeholder="商品名を入力" name="product_name" value = "@if (isset($product_name)) {{ $product_name }} @endif" required>
            </div>
            <div>
                <input type="text" placeholder="メーカー名を入力" name="company_name" value = "@if (isset($company_name)) {{ $company_name }} @endif" required>
            </div>
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

        
    </body>
</html>
@endsection