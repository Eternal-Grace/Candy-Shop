@extends('layouts.app')

@section('title')
    {{ $product->name }}
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-7">
            <div class="card">
                <ul id="display-mode" class="list-unstyled" role="button">
                    @foreach($product->images as $image)
                        <li data-src="{{ url('img/'.$image->path, ['size' => 'full']) }}">
                            <img class="card-img-top" src="{{ url('img/'.$image->path) }}" alt="{{ $product->name }}" />
                            <span><img src="/images/zoom_in_black_24dp.svg" width="30" /></span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <h4 class="card-subtitle mb-2 text-muted">{{ $product->productType->name }}</h4>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae egestas lorem, eget convallis turpis.
                        Vestibulum eget iaculis odio, in tempor urna. Nunc sapien nisi, tempus eget sapien non, dapibus faucibus risus.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 p-3">
                    <h3>$ {{ $product->price }}</h3>
                    <h5 class="text-danger"><s>$ {{ number_format($product->price * 1.3, 2) }}</s> -30%</h5>
                </div>
                <div class="col-6">
                    <button class="btn-block py-1 bg-info text-white">Add to Cart</button>
                </div>
                <div class="col-6">
                    <button class="btn-block py-1 bg-primary text-white">BUY</button>
                </div>
                <div class="col-12">Remaining in stock: {{ $product->stock }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
