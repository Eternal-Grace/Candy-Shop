@extends('layouts.app')

@section('title')
    @lang('pages.showcase')
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">

        @include('components.search')

        <div class="row justify-content-center">
            {!! $products->render('pagination::bootstrap-4') !!}
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @if ($products->isEmpty())
                <div class="col-sm">
                    @lang('pagination.search.empty', ['page' => $page])

                    @if($page != 1)
                    <h3>
                        Try the first page <a href="{{ route('store.index', ['perPage' => $perPage, 'search' => $search ?? '', 'page' => 1]) }}">HERE</a>
                    </h3>
                    @endif
                </div>
            @else
                @foreach($products as $product)
                    <div class="col py-2">
                        <a href="{{ route('store.product', ['slug' => $product->slug]) }}" class="text-decoration-none text-black-50">
                            <div class="card">
                                @if($product->images->count())
                                    <img src="{{ url('img/'.$product->images->first()->path) }}" class="card-img-top" alt="{{ $product->name }}" />
                                @else
                                    <img src="{{ 'https://via.placeholder.com/380x260?text=Candy-Shop' }}" class="card-img-top" alt="{{ $product->name }}" />
                                @endif

                                <div class="card-body text-black">
                                    <h5 class="card-title text-adjust">{{ $product->name }}</h5>
                                    <div class="card-subtitle">
                                        <small>
                                            <em>{{ $product->productType->name }}</em>
                                        </small>
                                    </div>
                                    <h5 class="card-text text-end">
                                        $ {{ $product->price }}
                                        <small>
                                            <span class="text-danger">
                                                <s>$ {{ number_format($product->price * 1.3, 2) }}</s>
                                            </span>
                                        </small>
                                    </h5>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="row justify-content-center">
            {!! $products->render('pagination::bootstrap-4') !!}
        </div>
</div>
@endsection
