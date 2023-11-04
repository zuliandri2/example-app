<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent
                rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest
                hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900
                dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ route('products.create')
                }}">{{__('Add')}}</a>
                <table class="table-auto w-full">
                    <thead>
                    <td class="border-b dark:border-slate-600 font-medium text-slate-400 dark:text-slate-200 text-left">No</td>
                    <td class="border-b dark:border-slate-600 font-medium text-slate-400 dark:text-slate-200 text-left">Name</td>
                    <td class="border-b dark:border-slate-600 font-medium text-slate-400 dark:text-slate-200 text-left">Description</td>
                    <td class="border-b dark:border-slate-600 font-medium text-slate-400 dark:text-slate-200 text-left">Prices</td>
                    <td class="border-b dark:border-slate-600 font-medium text-slate-400 dark:text-slate-200 text-left">Image</td>
                    <td class="border-b dark:border-slate-600 font-medium text-slate-400 dark:text-slate-200 text-left">Action</td>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\Products::all() as $k => $item)
                        <tr>
                            <td>{{ ($k + 1) }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->price}}</td>
                            <td><img src="{{ '/storage/' . $item->image }}" class="w-28 h-16"></td>
                            <td><a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" title="{{__('Edit')}}" href="{{ route('products.update', ["id" => $item->id]) }}">{{__('Edit')}}</a> <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" title="{{__('Delete')}}" href="{{ route('products.delete', ["id" => $item->id]) }}">{{__("Delete")}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
