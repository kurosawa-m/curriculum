@extends('layouts.layout')
@section('content')
    <main class="py-4">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header" style="background-color:#fffacd;">
                    <h4 class='text-center'>レビュー登録</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('confirm.review',['id' => $goods['id']]) }}" method="post">
                            @csrf
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 align-items-center">
                                    <div class="col-md-8"><img src="{{ asset('img/' . $goods['image']) }}"  width="200" height="200"></div>
                                    <div class="col-md-4">
                                        <h1 class="display-5 fw-bolder">{{ $goods['name'] }}</h1>
                                        <div class="fs-5 mb-5"><span>{{ $goods['amount'] }}円</span></div>
                                    </div>
                                </div>
                            </div>

                            <label for='title' class='mt-2'>レビュータイトル</label>
                                <input type='text' class='form-control' name='title'/>

                            <label for='comment' class='mt-2'>レビュー内容</label>
                                <textarea class='form-control' name='comment'></textarea>

                            <input type='hidden' class='form-control' name='id' value="{{ $goods['id'] }}"/>

                            <div class='row justify-content-center'>
                                <button type='submit' class='btn w-25 mt-3' style="background-color:#ffd700;">確認画面へ</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection