<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Find Jobs Projects</title>
    <style>
        #h {
            background: #EF4444;
            border-radius: 8%;
        }
    </style>
</head>

<body>
    <nav class="flex justify-between items-center mb-4">
        <a href="index.html"><img class="w-24"
                src="{{ asset('images/job-search-conceptual-logo-vector-31711898.jpg') }}" alt=""
                class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-dark dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboards</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-60 dark:text-red-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold dark:text-red-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                @endif
            </li>
            @auth

                <li>
                    <div>welcome {{ Auth::user()->name }}</div>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link id="h" :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>


            @endauth
        </ul>
    </nav>
    <main>
        <!-- Search -->

        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <div class="mx-4">

            <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                <div class="flex flex-col items-center justify-center text-center">


                    <img class="w-48 mr-6 mb-6" src="{{ asset('images/pngtree-hand-holdi.jpg') }}" alt="" />

                    <h3 class="text-2xl mb-2"></h3>
                    <div class="text-xl font-bold mb-4">{{ $announcement->title }}</div>
                    <ul class="flex">
                        <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                            <a href="#">Laravel</a>
                        </li>
                        <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                            <a href="#">API</a>
                        </li>
                        <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                            <a href="#">Backend</a>
                        </li>
                        <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                            <a href="#">Vue</a>
                        </li>
                    </ul>
                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>{{ $announcement->company->name }}</p>

                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">
                            Job Description
                        </h3>
                        <div class="text-lg space-y-6">
                            <p>{{ $announcement->description }}</p>

                            @hasrole('user')
                                @if (auth()->check())
                                    @if ($announcement->hasUserRecordedapply(auth()->id()))
                                        @if (now() < $announcement->date)
                                            <form method="post"
                                                action="{{ route('announcements.unrecordapply', $announcement->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out flex items-center">
                                                    <i class="fas fa-check-circle mr-2"></i> <!-- Font Awesome icon -->
                                                    Unrecord apply
                                                </button>
                                                
                                            </form>
                                        @else
                                            <p>The job interview day has already passed. apply cannot be recorded.</p>
                                        @endif
                                    @else
                                        @if (now() < $announcement->date)
                                            <form method="post"
                                                action="{{ route('announcements.recordapply', $announcement->id) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-green-900">Record
                                                    apply</button>
                                            </form>
                                        @else
                                            <p class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md">
                                                The job interview day has already passed. apply cannot be recorded.</p>
                                        @endif
                                    @endif
                                @endif
                            @endhasrole
                            <a href="mailto:test@test.com"
                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                    class="fa-solid fa-envelope"></i>
                                Contact Employer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
        <a href="create.html" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
    </footer>
</body>

</html>
