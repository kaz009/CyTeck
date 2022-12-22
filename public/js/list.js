
$('#searchBtn').on('click', function () {

    $(".table").empty();

    let search1 = $('#search1').val();
    let search2 = $('#search2').val();
    let search3 = Number($('#search3').val());
    let search4 = Number($('#search4').val());
    let search5 = Number($('#search5').val());
    let search6 = Number($('#search6').val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/CyTeck/public/showList', 
        data: {
            'search1': search1,
            'search2': search2,
            'search3': search3,
            'search4': search4,
            'search5': search5,
            'search6': search6,
        },
        type: 'POST',
  
     }).done(function (data) {
        let html = '';
        $.each(data, function (index, value) {

            let products_id = value.products_id;
            let img_path = value.img_path;
            let product_name = value.product_name;
            let price = value.price;
            let stock = value.stock;
            let company_name = value.company_name;

            html += `
                <tr>
                    <td>${products_id }</td>
                    <td>${img_path }</td>
                    <td>${product_name }</td>
                    <td>${price }</td>
                    <td>${stock }</td>
                    <td>${company_name }</td>
                    <td>
                        <button type="submit" onclick="location.href='/CyTeck/public/detail${products_id}'">詳細</button>
                    </td>
                    <td>
                        <button class="delBtn" id="${products_id}" type="submit" onclick='return confirm("削除しますか");'>削除</button>
                    </td>
                </tr>
            `
        })

        $('#table').append(html);

    }).fail(function (jqXHR, textStatus, errorThrown) {

        alert('ファイルの取得に失敗しました。');
        console.log("ajax通信に失敗しました");
        console.log("jqXHR          : " + jqXHR.status);
        console.log("textStatus     : " + textStatus);
        console.log("errorThrown    : " + errorThrown.message);
        console.log("URL            : " + url);
});
})


$(document).ready(function() {
    $('#sort').tablesorter();
});


$('.delBtn').on('click', function (e) {

   let id = e.target.id;

   $(".table").empty();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/CyTeck/public/destroy' + id, 
        type: 'POST',
  
     }).done(function (data) {
        
        let html = '';
        $.each(data, function (index, value) {

            let products_id = value.products_id;
            let img_path = value.img_path;
            let product_name = value.product_name;
            let price = value.price;
            let stock = value.stock;
            let company_name = value.company_name;

            html += `
                <tr>
                    <td>${products_id }</td>
                    <td>${img_path }</td>
                    <td>${product_name }</td>
                    <td>${price }</td>
                    <td>${stock }</td>
                    <td>${company_name }</td>
                    <td>
                        <button type="submit" onclick="location.href='/CyTeck/public/detail${products_id}'">詳細</button>
                    </td>
                    <td>
                        <button class="delBtn" id="${products_id}" type="submit" onclick='return confirm("削除しますか");'>削除</button>
                    </td>
                </tr>
            `
        })

        $('#table').append(html);

    }).fail(function (jqXHR, textStatus, errorThrown) {

        alert('ファイルの取得に失敗しました。');
        console.log("ajax通信に失敗しました");
        console.log("jqXHR          : " + jqXHR.status);
        console.log("textStatus     : " + textStatus);
        console.log("errorThrown    : " + errorThrown.message);
        console.log("URL            : " + url);
});
})
