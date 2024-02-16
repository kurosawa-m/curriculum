@extends('layouts.layout')
@section('content')
@can ('admin_only')
<span>

<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>商品編集</div>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <div class="row flex-column">
                        <form action="{{ route('goods.update',['id' => $goods['id']]) }}" method="post">
                        @csrf
                            <div class="text-center">
                                <label for='image'>画像</label>
                                <input type='file' class='form-control' name='image'/>
                            </div>
                            <div class="text-center">
                                <label for='name'>商品名</label>
                                <input type='text' class='form-control' name='name' value="{{ $goods['name'] }}"/>
                            </div>
                            <div class="text-center">
                                <label for='content' class='mt-2'>商品説明文</label>
                                <textarea class='form-control' name='content'>{{ $goods['content'] }}</textarea>
                            </div>
                            <div class="text-center">
                                <label for='amount' class='mt-2'>金額</label>
                                <input type='text' class='form-control' name='amount' value="{{ $goods['amount'] }}"/>
                            </div>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>変更</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</span>
@endcan
@endsection