@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-8">
                @can ('admin_only')
                    <span>

                        <div class="card">
                            <div class="card-header">
                                <div class='text-center'>登録確認</div>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <table class='table text-nowrap'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>商品画像</th>
                                                <th scope='col'>商品名</th>
                                                <th scope='col'>商品説明文</th>
                                                <th scope='col'>金額</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope='col'><img src='{{ $image }}'  width="200" height="200"></th>
                                                <th scope='col'>{{ $goods['name'] }}</th>
                                                <th scope='col'>{{ $goods['content'] }}</th>
                                                <th scope='col'>{{ $goods['amount'] }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <form action="{{ route('registration.goods') }}" method='post'>
                                @csrf
                                <input type='hidden' name='image' value='{{ $newImageName }}'/>
                                <input type='hidden' name='name' value='{{ $goods["name"] }}'/>
                                <input type='hidden' name='content' value='{{ $goods["content"] }}'/>
                                <input type='hidden' name='amount' value='{{ $goods["amount"] }}'/>
                                <button class='btn btn-primary mt-3'>登録</button>
                            </form>
                        </div>
                        
                    </span>
                    @endcan
                </div>
            </div>
        </main>
    </div>
@endsection
</body>
</html>