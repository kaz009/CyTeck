
$('#searchBtn').on('click', function () {

    $('.table').empty(); //もともとある要素を空にする
    //$('.search-null').remove(); //検索結果が0のときのテキストを消す

    let search1 = $('#search1').val(); //検索ワードを取得
    let search2 = $('#search2').val();

    

    $.ajax({
        type: 'GET',
        url: '/CyTeck/public/showList', //後述するweb.phpのURLと同じ形にする
        data: {
            'search1': search1,
            'search2': search2, //ここはサーバーに贈りたい情報。今回は検索ファームのバリューを送りたい。
        },
        dataType: 'json', //json形式で受け取る

        //beforeSend: function () {
        //    $('.loading').removeClass('display-none');
        //} //通信中の処理をここで記載。今回はぐるぐるさせるためにcssでスタイルを消す。   
     }).done(function (data) { //ajaxが成功したときの処理
        //$('.loading').addClass('display-none'); //通信中のぐるぐるを消す
        let html = '';
        $.each(data, function (index, value) { //dataの中身からvalueを取り出す
　　　　//ここの記述はリファクタ可能
            let products_id = value.products_id;
            let name = value.img_path;
            let product_name = value.product_name;
            let price = value.price;
            let stock = value.stock;
            let company_name = value.company_name;
        
　　　　// １ユーザー情報のビューテンプレートを作成
            html = `
                    <tr>
                        <td>${products_id }</td>
                        <td>${img_path }</td>
                        <td>${product_name }</td>
                        <td>${price }</td>
                        <td>${stock }</td>
                        <td>${company_name }</td>
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
                    `
        })

        $('table tbody').append(html); //できあがったテンプレートをビューに追加
　　　// 検索結果がなかったときの処理
      //  if (data.length === 0) {
     //       $('.user-index-wrapper').after('<p class="text-center mt-5 search-null">ユーザーが見つかりません</p>');
      //  }

    }).fail(function (jqXHR, textStatus, errorThrown) {
        // 通信失敗時の処理
        alert('ファイルの取得に失敗しました。');
        console.log("ajax通信に失敗しました");
        console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
        console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラー
        console.log("errorThrown    : " + errorThrown.message); // 例外情報
        console.log("URL            : " + url);
});
})