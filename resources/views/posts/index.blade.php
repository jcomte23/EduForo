<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between">
            {{ __('Posts') }}
            <a href="{{ route('post.create') }}"
                class="px-2 py-1 rounded-md  text-sm text-white bg-indigo-600">{{ __('Create') }}</a>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                                {{ __('Date posted') }}</th>
                            <th
                                class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                                {{ __('Publication') }}</th>
                            <th class="px-6 py-3 bg-gray-100">{{ __('Options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td class="border-t px-6 py-4">{{ $post->created_at }}</td>
                                <td class="border-t px-6 py-4">{{ $post->message }}</td>
                                <td class="border-t px-6 py-4">
                                    <a href="{{ route('post.edit', $post) }}"
                                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-green-500 hover:bg-green-600 rounded-lg ml-2">{{ __('Edit') }}</a>
                                    <a href="{{ route('post.destroy', $post) }}"
                                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg ml-2">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="border-t px-6 py-4" colspan="3">No hay publicaciones creadas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="flex justify-center text-lg py-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
