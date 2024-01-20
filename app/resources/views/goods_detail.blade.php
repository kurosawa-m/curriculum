@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
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
                                        <!-- ここに支出を表示する -->
                                        <tr>
                                            <!-- 画像いれる -->
                                            <th scope='col'>{{ $goodsId['name'] }}</th>
                                            <th scope='col'>{{ $goodsId['amount'] }}</th>
                                            <th scope='col'>{{ $goodsId['content'] }}</th>
                                        </tr>
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