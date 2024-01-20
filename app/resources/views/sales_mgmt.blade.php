@extends('layouts.layout')
@section('content')
        <main class="py-4">

                            <div class='text-center'>売上管理</div>
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>購入日時</th>
                                            <th>商品</th>
                                            <th>個数</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ここに収入を表示する -->
                                        @foreach($buys as $buy)
                                        <tr>
                                            <th>{{ $buy['created_at'] }}</th>
                                            <th>{{ $buy['name'] }}</th>
                                            <th>{{ $buy['quantity'] }}</th>
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