@extends('layouts.layout')
@section('content')
        <main class="py-4">
        @can('admin_only')
            <span>

                <div class="row justify-content-around">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class='text-center'>ショップ名</div>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>
                                                    <a href="{{ route('user.list') }}">ユーザーリスト</a>
                                                </th>
                                                <th scope='col'>
                                                    <a href="{{ route('registration.form') }}">商品登録</a>
                                                </th>
                                                <th scope='col'>
                                                    <a href="{{ route('sales.mgmt') }}">売上管理</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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