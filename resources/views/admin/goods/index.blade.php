<x-app-layout>
    <x-slot name="header">
        <h2 class="font-normal text-xl text-gray-200 leading-tight title-font uppercase">
            {{ __('Розміри') }}
        </h2>

        {{-- Actions messages--}}
        @if(!empty(session('goods')))

            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
               class="fixed-alert">
                {{
                    ((session('goods') === 'created') ? 'Створено!' :
                    ((session('goods') === 'deleted') ? 'Видалено!' :
                    ((session('goods') === 'updated') ? 'Змінено!' :
                    ((session('goods') === 'destroyed') ? 'Знищено!' :
                    ((session('goods') === 'restored') ? 'Відновлено!' : '')))))
                }}
            </p>
        @endif
    </x-slot>

    <x-slot name="slot">
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between mt-4 mx-6">
                        <a class="full_button border text-gray-200 block w-full p-2 text-center hover:shadow-sm hover:shadow-amber-50 transition"
                           href="{{ route('admin.goods.create') }}" title="Додати">
                            Додати товар
                        </a>
                    </div>
                    <div class="p-6 text-gray-200 overflow-x-auto">
                        <table cellpadding="10" class="w-full mb-6">
                            <thead>
                            <tr>
                                <th>Зображення</th>
                                <th>Категорія</th>
                                <th>Назва</th>
                                <th>Наявність</th>
                                <th>Колір</th>
                                <th>Розмір</th>
                                <th colspan="2">Дії</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($goods as $item)
                                <tr class="odd:bg-gray-700 hover:bg-gray-600">
                                    <td>
                                        <div class="image-wrap">
                                            @if($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="block">
                                            @endif
                                        </div>
                                    </td>
                                    <td><a href="{{ route('admin.categories.edit', $item->category) }}">{{ $item->category->title }}</a></td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->availability ? 'Є' : 'Немає' }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td>
                                        @forelse($item->sizes as $size)
                                            <p>{{ $size->height }}x{{ $size->width }}</p>
                                        @empty
                                            -
                                        @endforelse
                                    </td>
                                    @if(is_null($item->deleted_at))
                                        <td class="p-2">
                                            <a class="flex justify-center"
                                               href="{{ route('admin.goods.edit', $item->id) }}"
                                               title="Редагувати">
                                                <svg class="w-6 h-6">
                                                    <use xlink:href="#edit_ico"/>
                                                </svg>
                                            </a>
                                        </td>
                                    @endif
                                    @if($item->deleted_at)
                                        <td class="p-2" colspan="2">
                                            <form class="flex justify-center"
                                                  action="{{ route('admin.goods.restore', $item->id) }}"
                                                  method="post">
                                                @csrf
                                                @method('patch')
                                                <button type="submit" name="restoreColor" value="1" title="Відновити">
                                                    <svg class="w-6 h-6">
                                                        <use xlink:href="#restore_ico"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    @else
                                        <td class="p-2">
                                            <form class="flex justify-center"
                                                  action="{{ route('admin.goods.delete', $item) }}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" name="deleteColor" value="1" title="Видалити">
                                                    <svg class="w-6 h-6">
                                                        <use xlink:href="#delete_ico"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10"><h2 class="py-4 text-xl text-center">Немає розмірів</h2></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $goods->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
