@extends('layouts.layout')
@section('content')
@can ('admin_only')
<span>

        <main class="py-4">

                            <div class='text-center'>売上管理</div>
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>購入日時</th>
                                            <th>商品</th>
                                            <th>個数</th>
                                            <th>購入金額</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($buys as $buy)
                                        <tr>
                                            <th>{{ $buy['created_at'] }}</th>
                                            <th>{{ $buy['goods'][0]['name'] }}</th>
                                            <th>{{ $buy['quantity'] }}</th>
                                            @php
                                                $result = $buy['quantity'] * $buy['goods'][0]['amount'];
                                            @endphp
                                            <th>{{ $result }}</th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>

        </main>
</span>
@endcan

    </div>
@endsection

</body>
</html>