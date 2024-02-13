<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
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
    @if ($errors->any())
        <div id="alert-additional-content-2"
            class="alert alert-danger alert-dismissible border rounded-lg bg-light text-danger dark:bg-gray-800 dark:text-white"
            role="alert">
            <div class="flex items-center">
                <span class="sr-only">Whoops!</span>
                <h3 class="text-lg font-medium">There were some problems with your input.</h3>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="mt-2 mb-4 text-sm">
                <ul class="list-none">
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <section class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-20">
        <form action="{{ route('announcements.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-white dark:text-gray-200" for="username">Title</label>
                    <input id="title" name="title" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Discription</label>
                    <textarea id="Discription" name="description" type="textarea"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Select Companies</label>
                    <select name="company_id"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Date</label>
                    <input id="date" name="date" type="date"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></input>
                </div>
                <div class="mt-1 relative">
                    <select id="select-state" name="skills[]" multiple
                        class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500 focus:shadow-outline"
                        placeholder="Select a Skill..." autocomplete="off">
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}">
                                {{ $skill->name }}</option>
                        @endforeach

                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-900">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 13.707a1 1 0 0 1-1.414-1.414l3-3a1 1 0 0 1 1.414 1.414l-3 3z" />
                        </svg>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
                </div>
        </form>
    </section>
</x-app-layout>

<script>
    new TomSelect("#select-state", {
        maxItems: 10
    });
</script>
