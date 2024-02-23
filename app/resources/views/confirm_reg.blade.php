@extends('layouts.layout')
@section('content')
        <main class="py-4">
                @can ('admin_only')
                    <span>

                        
                        <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img src='{{ $image }}'  width="200" height="200"></div>
                    <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $goods['name'] }}</h1>
                        <div class="fs-5 mb-5"><span>{{ $goods['amount'] }}円</span></div>
                        <p class="lead">{{ $goods['content'] }}</p>
                        <div class="d-flex">
                        <form action="{{ route('registration.goods') }}" method="post" class="form" >
                            @csrf
                            <input type='hidden' name='image' value='{{ $newImageName }}'/>
                                <input type='hidden' name='name' value='{{ $goods["name"] }}'/>
                                <input type='hidden' name='content' value='{{ $goods["content"] }}'/>
                                <input type='hidden' name='amount' value='{{ $goods["amount"] }}'/>
                            <button class="btn mt-3" style="background-color:#ffd700;" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                商品登録
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>


                    </span>
                    @endcan
        </main>
    </div>
@endsection
</body>
</html>