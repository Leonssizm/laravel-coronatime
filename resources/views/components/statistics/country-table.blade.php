
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
<div class="relative max-w-xs">
    <label for="hs-table-search" class="sr-only"> Search </label>
    <input
      type="search"
      name="search"
      class="block w-full rounded-md border-gray-200 p-3 pl-10 text-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400"
      placeholder="Search..."
    />
    <div
      class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4"
    >
    <img src="{{ URL::to('/') }}/assets/images/search.svg" alt="search by country">
    </div>
</div>

{{-- Countries statistics table --}}
<div class="relative overflow-x-auto mt-10 text-left font-inter">
    <table class="w-fit lg:w-full">
        <thead class="text-xs font-semibold bg-[#F6F6F7]">
            <tr>
                <th scope="col" class="px-2 lg:px-6 py-3">
                    <div class="flex">
                        {{__('statistics.location')}}
                        <form class="flex flex-col ml-2">
                            <div x-data="{ isBlack: false }">
                                <a href="#" x-on:click="isBlack = !isBlack">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" :fill="isBlack ? 'black' : '#BFC0C4'"/>
                                    </svg>
                                </a>
                            </div>
                            <div x-data="{ isBlack: false }" class="mt-1">
                                <a href="#"  x-on:click="isBlack = !isBlack">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 5.5L0 0.5H10L5 5.5Z" :fill="isBlack ? 'black' : '#BFC0C4'"/>
                                    </svg>
                                </a>
                                </div>
                        </form>
                    </div>
                </th>
                <th scope="col" class="px-2 lg:px-6 py-3 lg:py-6">
                    <div class="flex">
                        {{__('statistics.new_cases')}}
                        <form class="flex flex-col ml-2">
                            <div x-data="{ isBlack: false }">
                                <a href="#" x-on:click="isBlack = !isBlack">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" :fill="isBlack ? 'black' : '#BFC0C4'"/>
                                    </svg>
                                </a>
                            </div>
                            <div x-data="{ isBlack: false }" class="mt-1">
                                <a href="#"  x-on:click="isBlack = !isBlack">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 5.5L0 0.5H10L5 5.5Z" :fill="isBlack ? 'black' : '#BFC0C4'"/>
                                    </svg>
                                </a>
                                </div>
                        </form>
                    </div>
                </th>
                <th scope="col" class="px-2 lg:px-6 py-3 lg:py-6">
                    <div class="flex">
                        {{__('statistics.death')}}
                        <form class="flex flex-col ml-2">
                            <div x-data="{ isBlack: false }">
                                <a href="#" x-on:click="isBlack = !isBlack">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" :fill="isBlack ? 'black' : '#BFC0C4'"/>
                                    </svg>
                                </a>
                            </div>
                            <div x-data="{ isBlack: false }" class="mt-1">
                                <a href="#"  x-on:click="isBlack = !isBlack">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 5.5L0 0.5H10L5 5.5Z" :fill="isBlack ? 'black' : '#BFC0C4'"/>
                                    </svg>
                                </a>
                                </div>
                        </form>
                    </div>
                </th>
                <th scope="col" class="px-2 lg:px-6 py-3 lg:py-6">
                    <div class="flex">
                        {{__('statistics.recovered')}}
                        <form class="flex flex-col ml-2">
                            <div x-data="{ isBlack: false }">
                                <a href="#" x-on:click="isBlack = !isBlack">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" :fill="isBlack ? 'black' : '#BFC0C4'"/>
                                    </svg>
                                </a>
                            </div>
                            <div x-data="{ isBlack: false }" class="mt-1">
                                <a href="#"  x-on:click="isBlack = !isBlack">
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 5.5L0 0.5H10L5 5.5Z" :fill="isBlack ? 'black' : '#BFC0C4'"/>
                                    </svg>
                                </a>
                                </div>
                        </form>
                    </div>
                </th>
            </tr>
        <tbody>
            <tr class="bg-white border-b">
                <th scope="row" class="px-2 lg:px-6 py-2 lg:py-4 font-normal">
                    {{__('statistics.worldwide')}}
                </th>
                <td class="px-2 lg:px-6 py-2 lg:py-4">
                    {{number_format($statistics->sum('new_cases'), '0', ' ')}}
                </td>
                <td class="px-2 lg:px-6 py-2 lg:py-4">
                    {{number_format($statistics->sum('deaths'), '0', ' ')}}
                </td>
                <td class="px-6 py-2 lg:py-4">
                    {{number_format($statistics->sum('recovered'), '0', ' ')}}
                </td>
            </tr>
            @foreach($statistics as $country)
            <tr class="bg-white border-b">
                <th scope="row" class="px-2 lg:px-6 py-2 lg:py-4 font-normal">
                   {{$country->location}}
                </th>
                <td class="px-2 lg:px-6 py-2 lg:py-4">
                    {{number_format($country->new_cases, '0', ' ')}}
                </td>
                <td class="px-2 lg:px-6 py-2 lg:py-4">
                    {{number_format($country->deaths, '0', ' ')}}
                </td>
                <td class="px-6 py-2 lg:py-4">
                    {{number_format($country->recovered, '0', ' ')}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>