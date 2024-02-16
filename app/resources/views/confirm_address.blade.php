@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class='text-center'>お届け先</div>
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


                    <form action="{{ route('reg.userinfo',['id' => $user['id']]) }}" method="post">
                    @csrf
                    @if(!isset($user['fullname']))
                        <label for='fullname'>氏名</label>
                            <input type='text' class='form-control' name='fullname'/>

                        <label for='email' class='mt-2'>メールアドレス</label>
                            <input type='text' class='form-control' name='email' value="{{ $user['email'] }}"/>

                        <label for='tel'>電話番号</label>
                            <input type='text' class='form-control' name='tel'/>
                            
                        <label for='postcode'>郵便番号</label>
                            <input type='text' class='form-control' name='postcode'/>

                        <label for='address'>住所</label>
                            <input type='text' class='form-control' name='address'/>
                    @else
                        <label for='fullname'>氏名</label>
                            <input type='text' class='form-control' name='fullname' value="{{ $user['fullname'] }}"/>

                        <label for='email' class='mt-2'>メールアドレス</label>
                            <input type='text' class='form-control' name='email' value="{{ $user['email'] }}"/>

                        <label for='tel'>電話番号</label>
                            <input type='text' class='form-control' name='tel' value="{{ $user['tel'] }}"/>
                            
                        <label for='postcode'>郵便番号</label>
                            <input type='text' class='form-control' name='postcode' value="{{ $user['postcode'] }}"/>

                        <label for='address'>住所</label>
                            <input type='text' class='form-control' name='address' value="{{ $user['address'] }}"/>
                    @endif

                        <input type='hidden' class='form-control' name='id' value="{{ $user['id'] }}"/>
                        <div class='row justify-content-center'>
                           <button type='submit' class='btn btn-primary w-25 mt-3'>注文内容確認へ</button>

                    </form>


                </div>
            </div>

        </main>
    </div>
@endsection

</body>
</html>