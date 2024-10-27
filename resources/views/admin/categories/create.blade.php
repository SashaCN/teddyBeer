<x-app-layout>
    <x-slot name="header">
        <h1 class="font-normal text-xl text-gray-200 leading-tight title-font uppercase">
            {{ __('Категорії') }}
        </h1>
    </x-slot>

    <x-slot name="slot">
<div class="flex min-h-full flex-col justify-center p-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="text-center text-2xl leading-9 tracking-tight text-gray-200">Додавання категорії</h2>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <form id="colorForm" class="space-y-6" action="{{ route('admin.categories.store') }}" method="POST">
            @csrf


            <div>
                <label for="title" class="block text-md font-medium leading-6 text-gray-200">Назва</label>
                <div class="mt-2">
                    <input id="title" name="title" value="{{ old('title') }}" type="text" class="bg-gray-600 block w-full p-2 text-md border-0 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                    @error('title')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="description" class="block text-md font-medium leading-6 text-gray-200">Опис</label>
                <div class="mt-2">
                    <textarea id="description" name="description" type="description" class="bg-gray-600 block w-full p-2 text-md border-0 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6 max-h-64 min-h-6">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <button id="subm" type="submit"
                        class="flex w-full justify-center bg-yellow-500 p-2 text-md font-semibold leading-6 text-white shadow-sm hover:bg-yellow-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 transition">
                    Додати</button>
            </div>
        </form>
    </div>
</div>
    </x-slot>
</x-app-layout>
