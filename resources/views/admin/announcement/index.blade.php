<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

            </div>
        </div>
    </div>

    <div class="py-12">
        <a href="{{ route('announcements.create') }}"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-8">Create
            announcement</a>

    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Discription
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Companies
                    </th>
                    <th scope="col" class="px-6 py-3">
                        skills
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        compability
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($announcementsWithMatchInfo as $info)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">

                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $info['announcement']->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $info['announcement']->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $info['announcement']->Company->name }}
                        </td>
                        <td class="px-6 py-4">
                            @foreach ($info['announcement']->skills as $skill)
                                {{ $skill->name . ' , ' }}
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            {{ $info['announcement']->date }}
                        </td>

                        @auth

                            @if ($info['isMatchAboveThreshold'])
                                <td class="text-green-600 text-sm font-semibold">
                                    Matched
                                </td>
                            @else
                                <td class="text-red-600 text-sm font-semibold">
                                    Not Enough Skills Matched
                                </td>
                            @endif

                        @endauth

                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('announcements.edit', $info['announcement']->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('announcements.destroy', $info['announcement']->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $announcementsWithMatchInfo->links() }} --}}
    </div>


</x-app-layout>
