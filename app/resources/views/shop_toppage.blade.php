@extends('layouts.layout')
@section('content')
        <main class="py-4">
        @can('admin_only')
            <span>

                <div class="row justify-content-around">

                    <div class="col-md-3">
                        <div class="card">
                                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                                        <a href="{{ route('user.list') }}" class="col-md-10 text-center mt-5">ユーザーリスト</a>
                                        <a href="{{ route('registration.form') }}" class="col-md-10 text-center mt-5">商品登録</a>
                                        <a href="{{ route('sales.mgmt') }}" class="col-md-10 text-center mt-5">売上管理</a>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card container">
                            <div class="card-header" style="background-color:#fffacd;">
                                <h3 class='text-center'>商品</h>
                            </div>

                            <div class="row d-flex justify-content-center align-items-center">
                            @foreach($goodsall as $goods)
                            <div class="card m-5 pt-5 col-4 border-dark mb-3" style="width: 18rem;">
                                <a href="{{ route('goods.edit',['id' => $goods['id']]) }}">
                                    <img src="{{ asset('img/' . $goods['image']) }}" class="card-img-top" alt="商品画像" height="200">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">  
                                        <a href="{{ route('goods.edit',['id' => $goods['id']]) }}">{{ $goods['name'] }}</a>
                                    </h5>
                                    <p class="card-text">{{ $goods['amount'] }}円</p>
                                    <p class="card-text">{{ $goods['content'] }}</p>

                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        @if($goods['del_flg']===0)
                                            <a href="{{ route('hide.goods', ['id' => $goods['id']]) }}" class='btn btn-danger'>非表示</a>
                                        @else
                                            <a href="{{ route('display.goods', ['id' => $goods['id']]) }}" class="btn btn-primary">表示</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </span>
            @endcan
        </main>
    </div>
@endsection

</body>
</html>