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
        </div>    </div>
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
    <form  action="{{route('announcements.store')}}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-white dark:text-gray-200" for="username">Title</label>
                <input   value="{{ $announcement->title }} " name="title" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div> 
            <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">Discription</label>
                <textarea  id="Discription" name="description" type="textarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">{{ $announcement->description }}</textarea>
            </div>
             <div>
                        <label class="text-white dark:text-gray-200" for="passwordConfirmation">Select Companies</label>
                        <select name="company_id" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                            @foreach ($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                                
                            @endforeach
                        </select>
                    </div>
           

        <div class="flex justify-end mt-6">
            <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
    </form>
</section>
</x-app-layout>

