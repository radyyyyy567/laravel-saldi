@extends('layouts.master')
@section('title', 'Technorider')
@section('content')
    <div class="mx-auto h-screen md:pt-0 pb-5">
        
        <div class="relative h-full">
            <img src="{{ URL('img/bg-banner.png')}}" class="w-full h-full object-cover" alt="">    
            <div class="bg-black bg-opacity-50 w-full h-full absolute top-0 flex items-center justify-center">
                <img src="{{ URL('img/technorider-banner.svg')}}" class=" h-[150px] object-cover" alt="">
            </div>
        </div>        
    </div>

    {{-- Shop By Category --}}
    <div class="py-7">
        <h1 class="text-center font-bold text-3xl pb-5">Shop By Category</h1>
        <hr class="block m-auto bg-gray-900 h-1 w-5/6 rounded">
        <div class="flex justify-center px-4 md:px-0">
            <div class="grid md:grid-cols-3 pt-5 gap-y-2 md:gap-y-4 md:gap-x-5">
                @foreach ($categories as $category)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $category->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Latest Products --}}
    <div class="py-7">
        <h1 class="text-center font-bold text-3xl pb-5">Latest Products</h1>
        <hr class="block m-auto bg-gray-900 h-1 w-5/6 rounded">
        <div class="flex justify-center px-4 md:px-0">
            <div class="grid md:grid-cols-3 pt-5 gap-y-2 md:gap-y-4 md:gap-x-5">
                @foreach ($products->sortByDesc('created_at')->take(3) as $product)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ auth()->user() ? url('/product-details/' . $product->id) : route('login') }}">
                            <img class="rounded-t-lg mx-auto" src="{{ asset('storage/' . $product->image) }}"
                                alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $product->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
                            @auth
                                <form action="{{ url('carts/create') }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="number" name="product_id" class="hidden" value="{{ $product->id }}">
                                    @php
                                        $addedToCart = false;
                                        foreach (auth()->user()->carts as $cart) {
                                            if ($cart->status == 'Added to Cart' && $cart->product_id === $product->id) {
                                                $addedToCart = true;
                                                break;
                                            }
                                        }
                                    @endphp
                                    @if ($addedToCart)
                                        <button
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white {{ $product->quantity === 0 ? 'bg-red-500' : 'bg-yellow-700' }} rounded-lg"
                                            disabled>
                                            {{ $product->quantity === 0 ? 'Out of Stcok' : 'Already in cart' }}
                                            <svg fill="none" class="w-4 h-4 ml-2 -mr-1" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    @else
                                        <button
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white {{ $product->quantity === 0 ? 'bg-red-500 hover:bg-red-800' : 'bg-blue-700 hover:bg-blue-800' }} rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300"
                                            {{ $product->quantity === 0 ? 'disabled' : '' }}>
                                            {{ $product->quantity === 0 ? 'Out of Stock' : 'Add to Cart' }}
                                            <svg fill="none" class="w-4 h-4 ml-2 -mr-1" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    @endif
                                </form>
                            @endauth
                            <a href="{{ auth()->user() ? url('/product-details/' . $product->id) : route('login') }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Availabel Products --}}
    <div class="container py-7 mx-auto px-4">
        <h1 class="text-center font-bold text-3xl pb-5">Available Products</h1>
        <hr class="block m-auto bg-gray-900 h-1 w-5/6 rounded mb-5">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($products as $product)
                <div class="grid gap-4">
                    <div>
                        @if ($product->quantity > 0)
                            <a href="{{ url('/product-details/' . $product->id) }}">
                                <img class="h-auto max-w-full rounded-lg mx-auto"
                                    src="{{ asset('storage/' . $product->image) }}" alt="">
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
