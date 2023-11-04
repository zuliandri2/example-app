<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="display: flex">
                    <div class="product-container" style="width: 25%;height: 35%;flex: 50%;padding: 5%">
                        <img src="{{ '/storage/' . $model->image }}">
                    </div>
                    <div style="flex: 50%;padding-top: 5%;">
                        <div><b>{!! $model->name !!}</b></div>
                        <div><strong>Rp. {{ $model->price }}</strong></div>
                        <p>{{ $model->description }}</p>
                        <x-text-input id="order" class="block mt-1" type="text" name="order" :value="old
                        ('order',)" required autocomplete="order" @style('width:10%;padding-left:1%;display:inline')
                        placeholder="0" />
                        <x-primary-button>{{__("Add")}}</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
