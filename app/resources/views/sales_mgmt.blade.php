@extends('layouts.layout')
@section('content')
@can ('admin_only')


<span>
    <main class="py-4">
        <div class="card-body">
            <div class="card-header" style="background-color:#fffacd;">
                <div class='text-center'>売上管理</div>
            </div>
            <div class="card-body">
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>購入日時</th>
                            <th>商品</th>
                            <th>個数</th>
                            <th>購入金額</th>
                        </tr>
                    </thead>
                        @php
                            $sum = 0;                                             
                        @endphp
                    <tbody>
                        @foreach($buys as $buy)
                        <tr>
                            <th>{{ $buy['created_at'] }}</th>
                            <th>{{ $buy['goods'][0]['name'] }}</th>
                            <th>{{ $buy['quantity'] }}</th>
                            @php
                                $result = $buy['quantity'] * $buy['goods'][0]['amount'];
                                $sum = $sum + $result;                                                
                            @endphp
                            <th>{{  number_format($result) }}円</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <h2 class="col-md-6">売上総合計</h2>
                    <h2 class="col-md-6 font-weight-bold">{{ number_format($sum) }}円</h2>
                </div>
            </div>

            <div class='text-center'>
            <a href="{{ route('shop.toppage') }}">事業者トップページ へ戻る</a>
            </div>

        </div>
    </main>
</span>
@endcan

    </div>
@endsection

</body>
</html>
