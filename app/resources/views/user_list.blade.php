@extends('layouts.layout')
@section('content')
        <main class="py-4">

                            <div class='text-center'>ユーザーリスト</div>
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>ユーザー名</th>
                                            <th>メールアドレス</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ここに収入を表示する -->
                                        @foreach($users as $user)
                                        <tr>
                                            <th>{{ $user['user_name'] }}</th>
                                            <th>{{ $user['email'] }}</th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
        </main>
    </div>
@endsection

</body>
</html>