@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>商品詳細</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>画像</th>
                                            <th scope='col'>商品名</th>
                                            <th scope='col'>金額</th>
                                            <th scope='col'>商品説明</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope='col'><img src="{{ asset('img/' . $goodsId['image']) }}"  width="200" height="200"></th>
                                            <th scope='col'>{{ $goodsId['name'] }}</th>
                                            <th scope='col'>{{ $goodsId['amount'] }}</th>
                                            <th scope='col'>{{ $goodsId['content'] }}</th>
                                        </tr>
                                    </tbody>
                                </table>

                                <form action="{{ route('transition.cart') }}" method="post" class="form" >
                                    @csrf
                                    <input type="hidden" name="goods_id" value="{{ $goodsId->id }}">
                                    <input type="text" name="quantity" value="1">
                                    <input type="submit" value="カートに入れる">
                                </form>

                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>レビュー</th>
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reviewId as $review)
                                        <tr>
                                            <th scope='col'>{{ $review['title'] }}</th>
                                            <th scope='col'>{{ $review['comment'] }}</th>
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
</body>
</html>