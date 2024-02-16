@extends('layouts.layout')
@section('content')
    <main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>商品登録</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('confirm.review',['id' => $goods['id']]) }}" method="post">
                            @csrf
                            <label for='image'><img src="{{ asset('img/' . $goods['image']) }}"  width="200" height="200"></label>

                            <label for='name' class='mt-2'>{{ $goods['name'] }}</label>

                            <label for='amount' class='mt-2'>{{ $goods['amount'] }}円</label>

                            <label for='title' class='mt-2'>レビュータイトル</label>
                                <input type='text' class='form-control' name='title'/>

                            <label for='comment' class='mt-2'>レビュー内容</label>
                                <textarea class='form-control' name='comment'></textarea>

                            <input type='hidden' class='form-control' name='id' value="{{ $goods['id'] }}"/>

                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>確認画面へ</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection