@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class="row justify-content-around">
                <div class="col-md-6">

                <th scope='col'>
                    <a href="{{ route('shop.toppage') }}">事業者トップページへ</a>
                </th>

                    <div class="row justify-content-around">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <div class='text-center'>検索</div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('keyword.search')}}">
                                    @csrf
                                        <div class="row">
                                            <div class="col-auto">
                                                <input type="text" name="keyword" placeholder="キーワードを入力">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary">検索</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>商品一覧</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>画像</th>
                                            <th scope='col'>商品名</th>
                                            <th scope='col'>金額</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($goodsall as $goods)
                                        <tr>
                                            <th scope='col'>
                                                <a href="{{ route('goods.detail',['id' => $goods['id']]) }}">
                                                    <img src="{{ asset('img/' . $goods['image']) }}" alt="商品画像"  width="200" height="200">
                                                </a>
                                            </th>
                                            <th scope='col'>
                                                <a href="{{ route('goods.detail',['id' => $goods['id']]) }}">{{ $goods['name'] }}</a>
                                            </th>
                                            <th scope='col'>{{ $goods['amount'] }}</th>
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