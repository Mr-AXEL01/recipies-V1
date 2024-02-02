<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="antialiased bg-gray-100">

<div class="w-full">
    <nav class="bg-white md:bg-transparent">
        <div class="container mx-auto px-4 md:px-12 lg:px-7">
            <div class="flex items-center justify-between py-3 md:py-4">
                <div class="flex items-center">
                    <a href="https://tailus.io/blocks/hero-section" aria-label="logo" class="flex items-center space-x-2">
                        <span class="text-2xl font-bold text-gray-900">Your <span class="text-gray-400">Recipes</span></span>
                    </a>
                </div>
                <div class="lg:hidden">
                    <button aria-label="hamburger" id="hamburger" class="ml-auto">
                        <div aria-hidden="true" id="line" class="w-6 h-0.5 my-1 bg-gray-900 transition duration-300"></div>
                        <div aria-hidden="true" id="line2" class="w-6 h-0.5 my-1 bg-gray-900 transition duration-300"></div>
                        <div aria-hidden="true" id="line3" class="w-6 h-0.5 my-1 bg-gray-900 transition duration-300"></div>
                    </button>
                </div>
                <div class="hidden lg:flex space-x-6">
                    <button type="button" class="py-3 px-6  rounded-full  hover:bg-sky-300 active:bg-yellow-700 focus:bg-gray-300">
                        Sign up
                    </button>
                    <button type="button" class="py-3 px-6 text-white rounded-full bg-gray-800 hover:bg-gray-700 active:bg-yellow-700 focus:bg-yellow-900">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>

<section class="container mx-auto mt-12 px-4">
    <div class="mb-8 lg:mb-0 lg:col-span-1">
        <h2 class="text-2xl font-bold mb-4">Search Results</h2>
        @foreach ($recipes as $recipe)
            <div class="rounded overflow-hidden shadow-lg text-black mb-6">
                <img class="w-full h-96 object-cover" src="/storage/{{ $recipe->picture }}" alt="Recipe Image">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $recipe->title }}</div>
                    <p class="text-base text-gray-500">{{ $recipe->ingredients }}</p>
                </div>
                <div class="flex justify-between px-6 py-2 bg-gray-100">
                    <form action="/delete/{{ $recipe->title }}" method="post">
                        @csrf
                        @method("delete")
                        <input type="hidden" name="title" value="{{ $recipe->title }}">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out flex items-center">
                            <i class="fas fa-trash-alt text-xl"></i>
                        </button>
                    </form>

                    <form action="/edit/{{ $recipe->title }}" method="post">
                        @csrf
                        <input type="hidden" name="title" value="{{ $recipe->title }}">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full ml-2 transition duration-300 ease-in-out flex items-center">
                            <i class="fas fa-pencil-alt text-xl"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</section>



</body>
</html>
