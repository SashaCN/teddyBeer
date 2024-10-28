<x-app-layout>
    <x-slot name="header">
        <h1 class="font-normal text-xl text-gray-200 leading-tight title-font uppercase">
            {{ __('Редагування товару') }}
        </h1>
    </x-slot>

    <x-slot name="slot">
        <div class="flex min-h-full flex-col justify-center p-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="text-center text-2xl leading-9 tracking-tight text-gray-200">Редагування товару</h2>
            </div>

            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('admin.goods.update', $goods) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="form-group">
                        <label for="image" class="block text-md font-medium leading-6 text-gray-200">Зображення</label>
                        <input value="{{ old('iamge', $goods->image) }}" type="file" name="image" class="bg-gray-600 block w-full p-2 text-md border-0 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                        @error('image')
                        <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div>
                        <label for="category_id" class="block text-md font-medium leading-6 text-gray-200">Категорія</label>
                        <div class="mt-2">
                            <select id="category_id" name="category_id" class="bg-gray-600 block w-full p-2 text-md border-0 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-700 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $goods->category->id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="title" class="block text-md font-medium leading-6 text-gray-200">Назва</label>
                        <div class="mt-2">
                            <input id="title" name="title" type="text" value="{{ old('title', $goods->title) }}"
                                   class="bg-gray-600 block w-full p-2 text-md border-0 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                            @error('title')
                            <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-md font-medium leading-6 text-gray-200">Опис</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" rows="4"
                                      class="bg-gray-600 block w-full p-2 text-md border-0 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">{{ old('description', $goods->description) }}</textarea>
                            @error('description')
                            <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="color" class="block text-md font-medium leading-6 text-gray-200">Колір</label>
                        <div class="mt-2">
                            <input id="color" name="color" type="text" value="{{ old('color', $goods->color) }}"
                                   class="bg-gray-600 block w-full p-2 text-md border-0 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-700 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                            @error('color')
                            <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="sizes" class="block text-md font-medium leading-6 text-gray-200">Розміри</label>
                        <div class="mt-2">
                            <select id="sizes" name="sizes[]" multiple
                                    class="bg-gray-600 block w-full p-2 text-md border-0 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-700 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}" {{ in_array($size->id, old('sizes', $goods->sizes->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $size->height }} x {{ $size->width }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sizes')
                            <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="availability" name="availability" type="checkbox" value="1"
                               {{ old('availability', $goods->availability) ? 'checked' : '' }}
                               class="w-4 h-4 text-yellow-600 bg-gray-600 border-gray-700 rounded focus:ring-yellow-600">
                        <label for="availability" class="ml-2 text-md font-medium leading-6 text-gray-200">
                            В наявності
                        </label>
                        @error('availability')
                        <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center bg-yellow-500 p-2 text-md font-semibold leading-6 text-white shadow-sm hover:bg-yellow-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fuchsia-600 transition">
                            Зберегти зміни
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
