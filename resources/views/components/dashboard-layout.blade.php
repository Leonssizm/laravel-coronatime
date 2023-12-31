<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::to('/') }}/assets/images/title-icon.svg" type="image/icon type">

        <title>Coronatime</title>
        @vite('resources/js/app.js')
        @vite('resources/css/app.css')
    </head>
<body>
    <div class="flex justify-between">
        <div class="grow">
             <img src="{{ URL::to('/') }}/assets/images/coronatime-logo.svg" alt="coronatime-logo" class="ml-5 mt-6 lg:ml-28 lg:mt-10">
             <div>
             {{$slot}}
            </div>
        </div>
        <div>
             <img src="{{ URL::to('/') }}/assets/images/vaccine.jpg" alt="vaccinates"  width="804" class="hidden md:block h-screen">
        </div>
    </div>   
</body>
