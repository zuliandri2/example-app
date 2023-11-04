<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach(\App\Models\Products::all() as $k => $item)
                        <div class="product-container" style="width: 25%;height: 35%;display: inline-block; margin-right: 8%; margin-top: 5%; text-align: center">
                            <img src="{{ '/storage/' . $item->image }}">
                            <a href="{{ route('products.show.detail', ["id" => $item->id])  }}"><strong>{!! $item->name
                            !!}</strong></a>
                            <div><strong>Rp. {{ $item->price }}</strong></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
