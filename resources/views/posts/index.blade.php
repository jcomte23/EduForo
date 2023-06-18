<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DATE</th>
                            <th>MESSAGE</th>
                            <th>OPTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <th class="border px-4 py-2">{{ $post->id }}</th>
                                <th class="border px-4 py-2">{{ $post->datePost }}</th>
                                <th class="border px-4 py-2">{{ $post->message }}</th>
                                <th class="px-4 py-2">
                                    <a href="{{route('post.show',$post)}}">ver</a>
                                </th>
                                <th class="px-4 py-2">
                                    <a href="{{route('post.edit',$post)}}">editar</a>
                                </th>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="4">No hay publicaciones creadas</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
