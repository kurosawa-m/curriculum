@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class='text-center'>注文内容確認</div>
                <div class="card-body">
                    <table class='table col-md-8'>
                        <thead>
                            <tr>
                                <th>画像</th>
                                <th>商品名</th>
                                <th>金額</th>
                                <th>個数</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <th><img src="{{ asset('img/' . $cart->Goods[0]->image) }}" alt="商品画像"  width="200" height="200"></th>
                                <th>{{ $cart->Goods[0]->name }}</th>
                                <th>{{ $cart->Goods[0]->amount }} 円</th>
                                <th>{{ $cart['quantity'] }} 個</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                  
                    <div class='text-center'>お届け先情報</div>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>氏名</th>
                                <th scope='col'>メールアドレス</th>
                                <th scope='col'>電話番号</th>
                                <th scope='col'>郵便番号</th>
                                <th scope='col'>住所</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope='col'>{{ $user['fullname'] }}</th>
                                <th scope='col'>{{ $user['email'] }}</th>
                                <th scope='col'>{{ $user['tel'] }}</th>
                                <th scope='col'>{{ $user['postcode'] }}</th>
                                <th scope='col'>{{ $user['address'] }}</th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('transition.cart') }}" class="mr-2">
                            <button type='button' class='btn btn-secondary'>注文内容変更</button>
                        </a>

                        <form action="{{ route('order.completed',['id' => $cart->id]) }}" method='post'>
                        @csrf
                            <input type='hidden' class='form-control' name='id' value="{{ $cart->id }}"/>
                            <input type='hidden' name='buy_flg' value="{{ $cart['buy_flg'] }}"/>
                            <input type="submit" class="btn btn-primary"  value="購入確定する">
                        </form>
                    </div>

                </div>
            </div>

        </main>
    </div>
@endsection

</body>
</html>