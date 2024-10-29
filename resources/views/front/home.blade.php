@extends('front.layouts.app')

@section('title', 'Головна Сторінка')

@section('content')
    <section class="hero">
        <h1>Welcome to TeddyBeer</h1>
        <p>Find your perfect cuddly companion from our amazing collection of soft toys</p>
    </section>

    <section id="categories" class="categories">
        <div class="categories-grid">
            @foreach($categories as $category)
                <div class="category-card">
                    <h3>{{ $category->title }}</h3>
                </div>
            @endforeach
        </div>
    </section>

    <section id="products" class="products">
        <div class="products-grid">
            @foreach($goods as $item)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $item->image ?? 'goods/teddy_logo.jpg') }}" alt="{{ $item->title }}" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title">{{ $item->title }}</h3>
                        <p>{{ Str::limit($item->description, 100) }}</p>
                        <div class="product-meta">
                            <span class="product-price">${{ $item->price }}</span>
                            <span class="product-availability {{ $item->availability ? 'text-success' : 'text-danger' }}">
                                {{ $item->availability ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </div>
                        <div class="product-sizes">
                            Size: {{ $item->sizes->pluck('width')->join('x') }} cm
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $goods->links('front.partials.pagination') }}
        </div>
    </section>
@endsection
