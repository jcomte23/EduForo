<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between">
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
                        <tr class="text-center bg-gray-400 dark:bg-indigo-800 dark:text-white">
                            <th
                                class="px-6 py-3 text-xs leading-4 font-medium uppercase tracking-wider">
                                {{ __('Date posted') }}</th>
                            <th
                                class="px-6 py-3  text-xs leading-4 font-medium uppercase tracking-wider">
                                {{ __('Publication') }}</th>
                            <th class="px-6 py-3 ">{{ __('Options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr class="dark:bg-gray-800">
                                <td class="text-center border-t px-6 py-4 w-2/12 dark:text-white">
                                    {{ $post->updated_at->diffForHumans() }}</td>
                                <td class="border-t px-6 py-4 text-justify dark:text-white">{{ $post->message }}</td>
                                <td class="text-center border-t  w-3/12">
                                    <a href="{{ route('post.edit', $post) }}"
                                        class="inline-block px-4 py-2 text-sm font-medium text-white bg-green-500 hover:bg-green-600 rounded-lg ml-2">{{ __('Edit') }}</a>
                                    <form action="{{ route('post.destroy', $post) }}" method="POST"
                                        class="inline-block text-sm font-medium text-white">
                                        @csrf @method('DELETE')
                                        <x-danger-button class="ml-3 rounded text-white" type="submit"
                                            onclick="return confirm('{{ __('Are you sure? This action cannot be reversed.') }}')">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center dark:bg-gray-800 dark:text-white">
                                <td class="text-center border-t px-6 py-4" colspan="3">{{ __('No publications created') }}</td>
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
