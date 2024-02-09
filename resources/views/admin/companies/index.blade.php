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
        <a href="{{ route('companies.create') }}"
            class="text-white bg-green-600    dark:focus:ring-green-800 shadow-lg ">Create
            Companies</a>
    </div>




    <div class="relative  overflow-x-auto shadow-md sm:rounded-lg">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>

                    <th scope="col" class="px-6 py-3">
                        name of company
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Discription
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $companie)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">

                        </td>

                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $companie->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $companie->discription }}
                        </td>

                        <td class="flex items-center px-6 py-4">
                            <a href="{{ route('companies.edit', $companie->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('companies.destroy', $companie->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            {{ $companies->links() }}

        </table>
    </div>


</x-app-layout>
