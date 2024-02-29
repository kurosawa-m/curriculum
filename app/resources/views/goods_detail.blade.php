@extends('layouts.layout')
@section('content')
        <main class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 row justify-content-around">
                    <div class="col-md-6"><img src="{{ asset('img/' . $goodsId['image']) }}"  width="200" height="200"></div>
                    <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $goodsId['name'] }}</h1>
                        <div class="fs-5 mb-5"><span>{{ $goodsId['amount'] }}円</span></div>
                        <p class="lead">{{ $goodsId['content'] }}</p>
                        <div class="d-flex">
                        <form action="{{ route('transition.cart') }}" method="post" class="form" >
                            @csrf
                            <input type="hidden" name="goods_id" value="{{ $goodsId->id }}">
                            <input type="text" class="form-control text-center me-3" name="quantity" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0 mt-3" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                カートに入れる
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- レビュー -->
            <div class="border-top align-items-center justify-content-center">
                <div class='text-center mt-3'>レビュー</div>

                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="card col-md-6 row">
                                @if($reviewId->isEmpty())
                                    <div class='card-body text-center mt-3'>レビューはまだありません</div>
                                @else
                                    @foreach($reviewId as $review)
                                    <div class="card-header" style="background-color:#fffacd; font-weight: bold;">
                                        {{ $review['title'] }}
                                    </div>
                                    <div class="card-body">
                                        {{ $review['comment'] }}
                                    </div>
                                    @endforeach
                                @endif
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