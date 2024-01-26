@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class='text-center'>カート内商品</div>
                <div class="card-body">
                    <table class='table'>
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
                                <th><img src="{{ asset('img/' . $cart['goods'][0]['image']) }}" alt="商品画像"></th>
                                <th>{{ $cart['goods'][0]['name'] }}</th>
                                <th>{{ $cart['goods'][0]['amount'] }} 円</th>
                                <th>{{ $cart['quantity'] }} 個</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('confirm.address') }}">
                        <button type='button' class='btn btn-primary'>購入</button>
                    </a>
                </div>
            </div>

        </main>
    </div>
@endsection

</body>
</html>