<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full text-black" required>
                        </div>
                        <div class="mt-4">
                            <label for="description" class="block text-sm font-medium">Description</label>
                            <textarea name="description" id="description" class="mt-1 block w-full text-black" required></textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
