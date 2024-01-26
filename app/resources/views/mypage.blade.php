@extends('layouts.layout')
@section('content')
        <main class="py-4">

                            <div class='text-center'>マイページ</div>
                            <div class='text-center'>{{ $user['name'] }}さん</div>

                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>ユーザー情報</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        @if(!isset($user['fullname']))
                                            <th>{{ $user['email'] }}</th>
                                            <th>{{ $user['password'] }}</th>
                                        @else
                                            <th>{{ $user['fullname'] }}</th>
                                            <th>{{ $user['email'] }}</th>
                                            <th>{{ $user['tel'] }}</th>
                                            <th>{{ $user['postcode'] }}</th>
                                            <th>{{ $user['address'] }}</th>
                                            <th>{{ $user['password'] }}</th>
                                        @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('user.info') }}">
                                <button type='button' class='btn btn-primary'>ユーザー情報変更</button>
                            </a>


                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>注文履歴</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        @foreach($carts as $cart)
                                            <th><img src="{{ asset('img/' . $cart['goods'][0]['image']) }}" alt="商品画像"></th>
                                            <th>{{ $cart['goods'][0]['name'] }}</th>
                                            <th>{{ $cart['goods'][0]['amount'] }} 円</th>
                                            <th>{{ $cart['quantity'] }} 個</th>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

        </main>
    </div>
@endsection

</body>
</html>