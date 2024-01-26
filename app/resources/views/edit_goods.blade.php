@extends('layouts.layout')
@section('content')
@can ('admin_only')
<span>

<main>
    <h4 class='text-center'>商品編集</h1>

    <form action="{{ route('goods.update',['id' => $goods['id']]) }}" method="post">
    @csrf

    <label for='image'>商品画像</label>
    <img src="{{ asset('img/' . $goods['image']) }}" >

        <label for='name'>商品名</label>
            <input type='text' class='form-control' name='name' value="{{ $goods['name'] }}"/>
 
        <label for='content' class='mt-2'>商品説明文</label>
            <textarea class='form-control' name='content'>{{ $goods['content'] }}</textarea>
            
        <label for='amount' class='mt-2'>金額</label>
            <input type='text' class='form-control' name='amount' value="{{ $goods['amount'] }}"/>

        <div class='row justify-content-center'>
        <button type='submit' class='btn btn-primary w-25 mt-3'>変更</button>

    </form>
</main>

</span>
@endcan
@endsection