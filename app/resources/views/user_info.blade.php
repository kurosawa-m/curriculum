@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class='text-center'>ユーザー情報変更</div>
                <div class="card-body">

                <div class='panel-body'><!-- バリデーション -->
                    @if($errors->any())
                    <div class='alert alert-danger'>
                        <ul>
                            @foreach($errors->all() as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>


                    <form action="{{ route('update.userinfo',['id' => $user['id']]) }}" method="post">
                    @csrf
                    @if(!isset($user['fullname']))
                        <label for='name' >ユーザー名</label>
                            <input type='text' class='form-control mb-4' name='name' value="{{ $user['name'] }}"/>
                            
                        <label for='email' class='mt-2'>メールアドレス</label>
                            <input type='text' class='form-control mb-4' name='email' value="{{ $user['email'] }}"/>

                    @else
                        <label for='name'>ユーザー名</label>
                            <input type='text' class='form-control mb-4' name='name' value="{{ $user['name'] }}"/>
                            
                        <label for='email' class='mt-2'>メールアドレス</label>
                            <input type='text' class='form-control mb-4' name='email' value="{{ $user['email'] }}"/>

                        <label for='fullname'>氏名</label>
                            <input type='text' class='form-control mb-4' name='fullname' value="{{ $user['fullname'] }}"/>

                        <label for='tel'>電話番号</label>
                            <input type='text' class='form-control mb-4' name='tel' value="{{ $user['tel'] }}"/>
                            
                        <label for='postcode'>郵便番号</label>
                            <input type='text' class='form-control mb-4' name='postcode' value="{{ $user['postcode'] }}"/>

                        <label for='address'>住所</label>
                            <input type='text' class='form-control mb-4' name='address' value="{{ $user['address'] }}"/>
                    @endif

                        <input type='hidden' class='form-control' name='id' value="{{ $user['id'] }}"/>
                        <div class='row justify-content-center'>
                           <button type='submit' class='btn w-25 mt-3' style="background-color:#ffd700;">ユーザー情報更新</button>

                    </form>


                </div>
            </div>

        </main>
    </div>
@endsection

</body>
</html>