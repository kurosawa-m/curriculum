@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class="row justify-content-around">
                <div class="col-md-6">

                    <div class="row justify-content-around">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header" style="background-color:#fffacd;">
                                    <div class='text-center'>検索</div>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <form action="{{ route('keyword.search')}}">
                                    @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-auto">
                                                <input type="text" name="keyword" placeholder="キーワードを入力" class="form-control" value="{{ $keyword }}">
                                            </div>
                                            <div class="col-auto mt-2">
                                                <input type="text" name="from" placeholder="最低価格" value="{{ $from }}">
                                                    <span class="mx-3">~</span>
                                                <input type="text" name="until" placeholder="上限価格" value="{{ $until }}">
                                            </div>
                                            <div class="col-auto mt-3">
                                                <button type="submit" class="btn" style="background-color:#ffd700;">検索</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header" style="background-color:#fffacd;">
                            <div class='text-center'>商品一覧</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>画像</th>
                                            <th scope='col'>商品名</th>
                                            <th scope='col'>金額</th>
                                        </tr>
                                    </thead>
                                    <tbody id='content'>
                                        @foreach($goodsall as $goods)
                                        <tr class='count'>
                                            <th scope='col'>
                                                <a href="{{ route('goods.detail',['id' => $goods['id']]) }}">
                                                    <img src="{{ asset('img/' . $goods['image']) }}" alt="商品画像"  width="200" height="200">
                                                </a>
                                            </th>
                                            <th scope='col'>
                                                <a href="{{ route('goods.detail',['id' => $goods['id']]) }}">{{ $goods['name'] }}</a>
                                            </th>
                                            <th scope='col'>{{ $goods['amount'] }}</th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        // スクロールされた時に実行^^
$(window).on("scroll", _.throttle(function () {
    // スクロール位置
        const bodyHeight = $(document).innerHeight();
        const windowHeight = window.innerHeight;
        let st = $(window).scrollTop();
        const bottom = bodyHeight - windowHeight - st;

        // 画面最下部にスクロールされている場合
        if (bottom <= 1) {
            ajax_add_content();
        }
},200));

 
function ajax_add_content() {
    // 追加コンテンツ
    var add_content = "";
    // コンテンツ件数           
    var count = $(".count").length;//→3
    console.log(count);
     
    // ajax処理
    $.post({
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),},
    type: "post",
    datatype: "json",
    url: '/ajax/',
    data:{ count : count },//request先の名前：値（100行目）
    }).done(function(data){

        for (var i=0; i<data.length; i++) {
            // dateの数（postsの数）
            // データを表示前に、試しに文字列のみで構成する
            // ↓子要素に追加する
            $("#content").append(`<tr class="count">
            <th scope="row">
                <a href="/goods/${data[i]["id"]}/detail">
                    <img src="/img/${data[i]["image"]}" alt="商品画像"  width="200" height="200">
                </a>
            </th>
            <td>
                <a href="/goods/${data[i]["id"]}/detail">
                    ${data[i]["name"]}
                </a>
            </td>
            <td>${data[i]["amount"]}</td>
            </tr>`);
            // 106行目のurlを直接指定する方がよい
            // ルートリストを見てurlと同じにする
        }
    }).fail(function(e){
        console.log(e);
    })
}

</script>

</body>
</html>