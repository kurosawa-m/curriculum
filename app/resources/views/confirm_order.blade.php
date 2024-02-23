@extends('layouts.layout')
@section('content')
<div class="flex-container">
        <main class="py-4">

            <h3 class='text-center'>注文内容確認</h>
            <div class="container p-4 px-lg-5 my-5 border-bottom">
                <div class="row gx-4 gx-lg-5 ml-5 align-items-center">
                    @foreach($carts as $cart)
                    <div class="col-md-5 mb-5">
                        <div class="d-flex justify-content-between align-items-center">    
                            <div class="me-3"><img src="{{ asset('img/' . $cart->Goods[0]->image) }}" alt="商品画像"  width="200" height="200"></div>
                            <div>
                                <h5 class="display-5 font-weight-bold">{{ $cart->Goods[0]->name }}</h>
                                <div class="fs-5 mb-5"><span class='font-weight-normal'>{{ $cart->Goods[0]->amount }} 円</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <p class="lead">{{ $cart['quantity'] }} 個</p>
                    </div>
                    @endforeach
                </div>
            </div>

<div class="container">
<div class="row">
            <div class='text-center mb-3'>お届け先情報</div>
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

                    <div class="col d-flex justify-content-center">
                        <a href="{{ route('transition.cart') }}" class="mr-2">
                            <button type='button' class='btn btn-outline-dark'>注文内容変更</button>
                        </a>

                    
                        <form action="{{ route('order.completed',['id' => $cart->id]) }}" method='post'>
                        @csrf
                            <input type='hidden' class='form-control' name='id' value="{{ $cart->id }}"/>
                            <input type='hidden' name='buy_flg' value="{{ $cart['buy_flg'] }}"/>
                            <input type="submit" class="btn" style="background-color:#ffd700;" value="購入確定する">
                        </form>
                    </div>
                </div>
            </div>
            </div>
</div>
</div>


        </main>
    </div>
@endsection

</body>
</html>