@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>商品詳細</div>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <div class="row flex-column">
                                <div class="col-md-6 text-center">
                                    <img src="{{ asset('img/' . $goodsId['image']) }}"  width="200" height="200">
                                </div>
                                <div class="col-md-10 text-center mt-5 font-weight-bold">{{ $goodsId['name'] }}</div>
                                <div class="col-md-10 text-center mt-5">{{ $goodsId['amount'] }}円</div>
                                <div class="col-md-10 text-center mt-5">{{ $goodsId['content'] }}</div>
                            </div>

                            <form action="{{ route('transition.cart') }}" method="post" class="form" >
                                @csrf
                                <input type="hidden" name="goods_id" value="{{ $goodsId->id }}">
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-3 text-center mx-1">
                                        <input type="text" name="quantity" value="1" class="form-control">個
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <input type="submit" value="カートに入れる" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>

                            <div class="card">
                                <div class="card-header">
                                    <div class='text-center'>レビュー</div>
                                </div>
                                <table class='table mt-4'>
                                    @foreach($reviewId as $review)
                                        <tr>
                                            <th scope='col'>{{ $review['title'] }}</th>
                                            <th scope='col'>{{ $review['comment'] }}</th>
                                        </tr>
                                    @endforeach
                                </table>
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