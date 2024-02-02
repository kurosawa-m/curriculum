@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class='text-center'>マイページ</div>
            <div class='text-center'>{{ $user['name'] }}さん</div>

            <div class="card-body">
                <table class='table'>
                    <thead>
                        <tr>
                            <th>ユーザー情報</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @if(!isset($user['fullname']))
                            <th>{{ $user['email'] }}</th>
                        @else
                            <th>{{ $user['fullname'] }}</th>
                            <th>{{ $user['email'] }}</th>
                            <th>{{ $user['tel'] }}</th>
                            <th>{{ $user['postcode'] }}</th>
                            <th>{{ $user['address'] }}</th>
                        @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{ route('user.info') }}">
                <button type='button' class='btn btn-primary'>ユーザー情報変更</button>
            </a>


            <div class="card-body">
                <table class='table'>
                    <thead>
                        <tr>
                            <th>注文履歴</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr scope='col'>
                        @foreach($carts as $cart)
                        <form action="{{ route('reg.review',['id' => $cart->goods_id]) }}" method='post'>
                        @csrf
                            <th scope='col'><img src="{{ asset('img/' . $cart['goods'][0]['image']) }}" alt="商品画像"  width="200" height="200"></th>
                            <th scope='col'>{{ $cart['goods'][0]['name'] }}</th>
                            <th scope='col'>{{ $cart['goods'][0]['amount'] }} 円</th>
                            <th scope='col'>{{ $cart['quantity'] }} 個</th>
                            <input type='hidden' class='form-control' name='id' value="{{ $cart['goods'][0]['id'] }}"/>
                            <button type='submit' class='btn btn-primary w-25 mt-3'>レビューを投稿する</button>
                        @endforeach
                        </form>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-around">
                <form action="{{ route('delete.user',['id' => $user['id']]) }}" method='post'>
                    @csrf
                    @method('DELETE')
                    <input type='hidden' name='delete' value='$user["id"]'/>
                    <button class='btn btn-danger' onclick='clickEvent()'>退会する</button>
                </form>
            </div>

        </main>
    </div>
@endsection

</body>
<script>
    function clickEvent() {
        confirm('退会しますか？');    
        }
</script>

</html>
