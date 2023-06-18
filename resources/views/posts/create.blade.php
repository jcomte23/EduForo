<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form action="{{route('post.store')}}" method="post" class="max-w-mg">
                    @csrf
                    <h1>New Post</h1>
                    <label for="datePost" class="block font-medium text-sm text-gray-700">Date</label>
                    <input type="date" class="form-input w-full rounded-md shadow-sm" name="datePost">

                    <label for="message" class="block font-medium text-sm text-gray-700">Message</label>
                    <textarea type="text" class="form-input w-full rounded-md shadow-sm" name="message"></textarea>

                    <hr class="my-4">

                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
