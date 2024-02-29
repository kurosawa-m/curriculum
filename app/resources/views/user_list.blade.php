@extends('layouts.layout')
@section('content')
        <main class="py-4">

            <div class='text-center'>ユーザーリスト</div>
            <div class="card-body d-flex justify-content-center align-items-center flex-column">
                <table class='table col-md-8'>
                    <thead>
                        <tr>
                            <th>ユーザー名</th>
                            <th>メールアドレス</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th>{{ $user['name'] }}</th>
                            <th>{{ $user['email'] }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class='text-center'>
            <a href="{{ route('shop.toppage') }}">事業者トップページ へ戻る</a>
            </div>

        </main>
    </div>
@endsection

</body>
</html>