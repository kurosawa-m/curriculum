@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class="row justify-content-around">
                <div class="col-md-4">
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
                                            <th scope='col'>売上合計</th>
                                            <th scope='col'>
                                                <a href="{{ route('sales.mgmt') }}">売上管理</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ここに収入を表示する -->
                                        @foreach($goodsall as $goods)
                                        <tr>
                                            <th scope='col'>商品画像</th>
                                            <th scope='col'>{{ $goods['name'] }}</th>
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