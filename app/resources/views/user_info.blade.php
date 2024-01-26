@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class='text-center'>ユーザー情報変更</div>
                <div class="card-body">

                    <form action="{{ route('update.userinfo',['id' => $user['id']]) }}" method="post">
                    @csrf
                    @if(!isset($user['fullname']))
                        <label for='name'>ユーザー名</label>
                            <input type='text' class='form-control' name='name' value="{{ $user['name'] }}"/>
                            
                        <label for='email' class='mt-2'>メールアドレス</label>
                            <input type='text' class='form-control' name='email' value="{{ $user['email'] }}"/>

                        <label for='password' class='mt-2'>パスワード</label>
                            <input type='text' class='form-control' name='password' value="{{ $user['password'] }}"/>
                    @else
                        <label for='name'>ユーザー名</label>
                            <input type='text' class='form-control' name='name' value="{{ $user['name'] }}"/>
                            
                        <label for='email' class='mt-2'>メールアドレス</label>
                            <input type='text' class='form-control' name='email' value="{{ $user['email'] }}"/>

                        <label for='password' class='mt-2'>パスワード</label>
                            <input type='text' class='form-control' name='password' value="{{ $user['password'] }}"/>

                        <label for='fullname'>氏名</label>
                            <input type='text' class='form-control' name='fullname' value="{{ $user['fullname'] }}"/>

                        <label for='tel'>電話番号</label>
                            <input type='text' class='form-control' name='tel' value="{{ $user['tel'] }}"/>
                            
                        <label for='postcode'>郵便番号</label>
                            <input type='text' class='form-control' name='postcode' value="{{ $user['postcode'] }}"/>

                        <label for='address'>住所</label>
                            <input type='text' class='form-control' name='address' value="{{ $user['address'] }}"/>
                    @endif

                        <input type='hidden' class='form-control' name='id' value="{{ $user['id'] }}"/>
                        <div class='row justify-content-center'>
                           <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>

                    </form>


                </div>
            </div>

        </main>
    </div>
@endsection

</body>
</html>