<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
        @can('create-courses') <!-- Check if user can create a course -->
            <a href="{{ route('courses.create') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Create New Course</a>
        @endcan
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="px-4 py-2 text-left">Title</th>
                                <th class="px-4 py-2 text-left">Description</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-4 py-2">{{ $course->title }}</td>
                                    <td class="px-4 py-2">{{ $course->description }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('courses.show', $course->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">View</a>
                                        
                                        @can('update-courses') <!-- Check if user can edit courses -->
                                            <a href="{{ route('courses.edit', $course->id) }}" class="ml-4 text-yellow-600 dark:text-yellow-400 hover:underline">Edit</a>
                                        @endcan

                                        @can('delete-courses') <!-- Check if user can delete courses -->
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="ml-4 text-red-600 dark:text-red-400 hover:underline">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
