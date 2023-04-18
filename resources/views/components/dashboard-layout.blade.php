<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coronatime</title>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
        <div >
             <img src="{{ URL::to('/') }}/assets/images/vaccine.jpg" alt="vaccinates"  width="804" class="hidden md:block h-screen">
        </div>
    </div>   
</body>