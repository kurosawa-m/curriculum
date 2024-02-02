@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class='text-center'>カート内商品</div>
                <div class="card-body">
                    <form action="{{ route('confirm.address') }}" method="post">
                    @csrf
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
                            @foreach($carts as $key=>$cart)
                                <tr>
                                    <th><img src="{{ asset('img/' . $cart->Goods[0]->image) }}" alt="商品画像" width="200" height="200"></th>
                                    <th>{{ $cart->Goods[0]->name }}</th>
                                    <th>{{ $cart->Goods[0]->amount }} 円</th>
                                    <th><input type='text' name='data[{{ $key }}][quantity]' value='{{ $cart["quantity"] }}'/>個</th>
                                    <th><input type='hidden' name='data[{{ $key }}][goods_id]' value="{{ $cart->Goods[0]->id }}"/></th>
                                    <th><input type='hidden' name='data[{{ $key }}][id]' value="{{ Auth::id() }}"/></th>
                                    <th>
                                        <a href="{{ route('delete.cart', ['id' => $cart['id']]) }}" class='btn btn-danger'>削除</a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type='submit' class='btn btn-primary'>購入へすすむ</button>
                    </form>
                </div>
            </div>

        </main>
    </div>
@endsection

</body>
</html>