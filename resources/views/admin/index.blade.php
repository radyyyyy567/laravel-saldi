@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@section('content')
<div class="container mx-auto p-5">
    <div class="flex items-center justify-between mb-2">
        <div class="text-xl mb-3 font-semibold py-2">Dashboard</div>
        <div class="text-lg mb-3 font-semibold">
            <a href="{{ url('/') }}" class="text-white rounded-lg px-5 py-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
                To Customer Site
            </a>
        </div>
    </div>

    <div class="grid md:grid-cols-4 sm:grid-cols-3 gap-4 pb-5 clear-both">
        <div>
            <a href="{{ url('/admin/users') }}" class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">User:
                    <span class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ auth()->user()->count() }}</span>
                </h5>
            </a>
        </div>
        <div>
            <a href="{{ url('/admin/categories') }}" class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Category:
                    <span class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $categories->count() }}</span>
                </h5>
            </a>
        </div>
        <div>
            <a href="{{ url('/admin/products') }}" class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Product:
                    <span class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $products->count() }}</span>
                </h5>
            </a>
        </div>
        <div>
            <a href="{{ url('/admin/purchases') }}" class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Purchase:
                    <span class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $purchases->count() }}</span>
                </h5>
            </a>
        </div>
        <div>
            <a href="{{ url('/admin/suppliers') }}" class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Supplier:
                    <span class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $suppliers->count() }}</span>
                </h5>
            </a>
        </div>
        <div>
            <a href="{{ url('/admin/orders') }}" class="block max-w-sm p-5 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">Order:
                    <span class="text-lg font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $orders->count() }}</span>
                </h5>
            </a>
        </div>
    </div>

    <div>
        <h2 class="text-xl font-semibold mb-3">Monthly Total Amounts</h2>
        
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border bg-blue-600 text-white font-semibold">Index</th>
                    <th class="py-2 px-4 border bg-blue-600 text-white font-semibold">Month and Year</th>
                    <th class="py-2 px-4 border bg-blue-600 text-white font-semibold">Product</th>
                    <th class="py-2 px-4 border bg-blue-600 text-white font-semibold">Qty Product</th>
                    <th class="py-2 px-4 border bg-blue-600 text-white font-semibold">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($monthlyTotalAmounts as $index => $monthlyTotal)
                    <tr>
                        <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border">{{ date('F Y', mktime(0, 0, 0, $monthlyTotal->month, 1, $monthlyTotal->year)) }}</td>
                        <td class="py-2 px-4 border">{{ $monthlyTotal->product->name }}</td>
                        <td class="py-2 px-4 border">{{ $monthlyTotal->total_quantity }}</td>
                        <td class="py-2 px-4 border">{{ $monthlyTotal->total_amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection