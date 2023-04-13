<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Landing</title>
        @vite('resources/css/app.css')
    </head>
<body>
        <div class="flex ml-4 mt-6 justify-between lg:mt-10 lg:ml-28 mr-28">
            <img src="{{ URL::to('/') }}/assets/images/coronatime-logo.svg" alt="coronatime-logo">
            <div class="flex items-center font-inter">
                <div class="flex">
                    <div class="flex ml-6 mr-14 lg:ml-0 lg:mr-0">
                        <a href="#">English</a>
                        <img src="{{ URL::to('/') }}/assets/images/arrow-down.svg">
                    </div>
                        <button type="button" class="block lg:hidden"><img class="ml-6"src="{{ URL::to('/') }}/assets/images/menu-line.svg"></button>
                </div>
                <div class="hidden lg:flex ml-10">
                        <p class="mr-2 font-bold">Takeshi K.</p>
                        <div class="border border-gray-200"></div>
                        <a class="ml-2"href="#">Log Out</a>
                </div>
            </div>
        </div>
</body>
