@extends('layouts.layout')
@section('content')
    <main class="py-4">
        @can ('admin_only')
        <span>

            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header" style="background-color:#fffacd;">
                        <h4 class='text-center'>商品登録</h1>
                    </div>
                    <div class="card-body">
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

                            <form action="{{ route('confirmReg.goods')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for='image'>画像</label>
                                    <input type='file' class='form-control' name='image'/>

                                <label for='name' class='mt-2'>商品名</label>
                                    <input type='name' class='form-control' name='name' value='{{ old("name") }}'/>

                                <label for='content' class='mt-2'>商品説明文</label>
                                    <textarea class='form-control' name='content'>{{ old("content") }}</textarea>

                                <label for='amount' class='mt-2'>金額</label>
                                    <input type='amount' class='form-control' name='amount' value='{{ old("amount") }}'/>

                                <div class='row justify-content-center'>
                                    <button type='submit' class='btn w-25 mt-3' style="background-color:#ffd700;">確認画面へ</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </span>
        @endcan

    </main>
@endsection