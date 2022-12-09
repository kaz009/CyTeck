<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>商品一覧画面</title>

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
                            <button type="submit">検索</button>
                            <button>
                                <a href="{{ route('list') }}" class="text-white">
                                    クリア
                                </a>
                            </button>
                        </div>

                        <div>
                            <label for="">会社名絞り込み
                                <div>
                                    
                                    <select name="search2" data-toggle="select" value="@if (isset($search2)) {{ $search2 }} @endif">
                                        <option value="">全て</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </label>
                        </div>

                       
                    </form>
                </div>







                <div class="links">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>company_id</th>
                                <th>product_name</th>
                                <th>price</th>
                                <th>stock</th>
                                <th>comment</th>
                                <th>img_path</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->products_id }}</td>
                                <td>{{ $product->company_id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->comment }}</td>
                                <td>{{ $product->img_path }}</td>
                                <td>{{ $product->products_created_at }}</td>
                                <td>{{ $product->products_updated_at }}</td>
                                <td>
                                    <form action="{{ route('productDestroy', ['id'=>$product->products_id]) }}" method="POST">
                                        @csrf
                                        <button type="submit">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
