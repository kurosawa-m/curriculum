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
                        <div class="card">
                            <div class="card-header">
                                <div class='text-center'>商品</div>
                            </div>
                            <div class="card-body">
                                <table class='table'>
                                    @foreach($goodsall as $goods)
                                    <tr>
                                        <th scope='col'>
                                            <a href="{{ route('goods.edit',['id' => $goods['id']]) }}">
                                                <img src="{{ asset('img/' . $goods['image']) }}" alt="商品画像" width="200" height="200">
                                            </a>
                                        </th>
                                        <th scope='col'>
                                            <a href="{{ route('goods.edit',['id' => $goods['id']]) }}">{{ $goods['name'] }}</a>
                                        </th>
                                        <th scope='col'>{{ $goods['amount'] }}円</th>

                                        @if($goods['del_flg']===0)
                                        <th scope='col'>
                                            <a href="{{ route('hide.goods', ['id' => $goods['id']]) }}" class='btn btn-danger'>非表示</a>
                                        </th>
                                        @else
                                        <th scope='col'>
                                            <a href="{{ route('display.goods', ['id' => $goods['id']]) }}" class="btn btn-primary">表示</a>
                                        </th>
                                        @endif

                                    @endforeach
                                </table>
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