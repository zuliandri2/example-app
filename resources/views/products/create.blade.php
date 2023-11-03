<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form class="mt-6 space-y-6" method="post" action="{{ route('products.postcreate') }}">
                @csrf
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Id')" />
                        <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="old('id', $newid)" required autocomplete="id" />
                        <x-input-error :messages="$errors->get('id')" class="mt-2" />
                    </div>
                    @include("products.form")
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
