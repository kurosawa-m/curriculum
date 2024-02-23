@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class='text-center'>マイページ</div>
            <div class='text-center'>{{ $user['name'] }}さん</div>

            <div class='text-right mr-3'>
                <a href="{{ route('user.info') }}">
                    <button type='button' class='btn' style="background-color:#ffd700;">ユーザー情報変更</button>
                </a>
            </div>

            <div class='d-flex align-items-center justify-content-center'>
                <div class="card mt-3 w-75 ">
                    <div class="card-header" style="background-color:#fffacd;">
                        <div class='text-center'>ユーザー情報</div>
                    </div>
                    <div class="card-body">
                        <table class='table'>
                            <thead>
                                    <th>氏名</th>
                                    <th>メールアドレス</th>
                                    <th>電話番号</th>
                                    <th>郵便番号</th>
                                    <th>住所</th>
                            </thead>
                            <tbody>
                                <tr>
                                @if(!isset($user['fullname']))
                                    <th></th>
                                    <th>{{ $user['email'] }}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                @else
                                    <th>{{ $user['fullname'] }}</th>
                                    <th>{{ $user['email'] }}</th>
                                    <th>{{ $user['tel'] }}</th>
                                    <th>{{ $user['postcode'] }}</th>
                                    <th>{{ $user['address'] }}</th>
                                @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="card-header" style="background-color:#fffacd;">
                    <div class='text-center'>注文履歴</div>
                </div>
                <div class="card-body">
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>金額</th>
                                <th>数量</th>
                                <th>購入日時</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <td><img src="{{ asset('img/' . $cart['goods'][0]['image']) }}" alt="商品画像" width="200" height="200"></td>
                                <td>{{ $cart['goods'][0]['name'] }}</td>
                                <td>{{ $cart['goods'][0]['amount'] }} 円</td>
                                <td>{{ $cart['quantity'] }} 個</td>
                                <td>{{ $cart['created_at'] }}</td>
                                <td>
                                    <form action="{{ route('reg.review',['id' => $cart->goods_id]) }}" method="post">
                                        @csrf
                                        <input type="hidden" class="form-control" name="id" value="{{ $cart['goods'][0]['id'] }}"/>
                                        <button type="submit" class="btn mt-3" style="background-color:#ffd700;">レビューを投稿する</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <form action="{{ route('delete.user',['id' => $user['id']]) }}" method='post'>
                    @csrf
                    @method('DELETE')
                    <input type='hidden' name='delete' value='$user["id"]'/>
                    <button class='btn btn-danger mt-10' onclick='clickEvent()'>退会する</button>
                </form>
            </div>

        </main>
    </div>
@endsection

</body>
<script>
    function clickEvent() {
        confirm('退会しますか？');    
        }
</script>

</html>
