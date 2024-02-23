@extends('layouts.layout')
@section('content')
    <main class="py-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header" style="background-color:#fffacd;">
                    <h4 class='text-center'>レビュー内容確認</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        
                        <form action="{{ route('completed.reg.review',['id' => $goods['id']]) }}" method="post">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'></th>
                                        <th scope='col'>タイトル</th>
                                        <th scope='col'>内容</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><img src="{{ asset('img/' . $goods['image']) }}"  width="200" height="200"></th>
                                        <th>{{ $review['title'] }}</th>
                                        <th>{{ $review['comment'] }}</th>
                                    </tr>
                                </tbody>
                            </table>
                            @csrf
                            <input type='hidden' name='title' value="{{ $review['title'] }}"/>
                            <input type='hidden' name='comment' value="{{ $review['comment'] }}"/>
                            <input type='hidden' name='id' value="{{ $review['goods_id'] }}"/>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn w-25 mt-3' style="background-color:#ffd700;">レビューを投稿する</button>
                            </div> 
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection