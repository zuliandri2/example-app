<div class="mt-4">
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', isset($model) ?
    $model->name : null)" required autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>
<div class="mt-4">
    <x-input-label for="name" :value="__('Description')" />
    <textarea id="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
    focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
    shadow-sm block mt-1 w-full" name="description" required autocomplete="description">{{ old("description", isset
    ($model) ? $model->description : null)
    }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>
<div class="mt-4">
    <x-input-label for="price" :value="__('Price')" />
    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price', isset($model) ?
    $model->price : null)" required autocomplete="price" />
    <x-input-error :messages="$errors->get('price')" class="mt-2" />
</div>
<div class="mt-4">
    <x-input-label for="image" :value="__('Image')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div>
<div class="mt-4"><x-primary-button>{{__("Save")}}</x-primary-button><a href="{{ route('products') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">{{__("Cancel")}}</a></div>
