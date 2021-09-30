@extends('layouts.app')

@section('title')
    @lang('pages.showcase')
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    @isset($perPage)
    <div class="row justify-content-end pb-3">
        <form class="col-12 col-lg-auto mb-3 mb-lg-0">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="col-5 col-lg-2 col-md-2 col-sm-3 align-self-end">
            <select class="form-select w-100" id="select-showcase" aria-label="Default select example">
                @foreach([24, 48, 72] as $count)
                    <option {{ $count == $perPage ? 'selected' : '' }} value="{{ $count }}">{{ $count }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endisset

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
        @foreach($productsData['data'] as $product)
        <div class="col">
            <a href="{{ route('product.details', ['slug' => $product['slug']]) }}" class="text-decoration-none">
                <div class="card">
                    <img src="{{ url('storage/images/candy.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body text-black">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <div class="card-subtitle">
                            <small>
                                <em>{{ $product['product_type']['name'] }}</em>
                            </small>
                        </div>
                        <h5 class="card-text text-end">
                            $ {{ $product['price'] }}
                        </h5>

                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
