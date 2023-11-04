<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form class="mt-6 space-y-6" method="post" action="{{ route('products.post.update') }}" enctype="multipart/form-data">
                @csrf
                <x-text-input id="id" class="block mt-1 w-full" type="hidden" name="id" :value="$model->id" required autocomplete="id" />
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include("products.form", ["model" => $model])
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
