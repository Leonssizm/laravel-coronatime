<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::to('/') }}/assets/images/title-icon.svg" type="image/icon type">
        <title>Confirmation</title>
        @vite('resources/css/app.css')
    </head>
<body>
        <div class="flex justify-center mt-6 lg:mt-10">
            <img src="{{ URL::to('/') }}/assets/images/coronatime-logo.svg" alt="coronatime-logo">
        </div>
</body>
