<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <title>Landing</title>
        @vite('resources/css/app.css')
    </head>
<body>
    
    @props(['user'])
        <div class="flex ml-4 mt-6 justify-between lg:mt-10 lg:ml-28 mr-28">
            <img src="{{ URL::to('/') }}/assets/images/coronatime-logo.svg" alt="coronatime-logo">
            <div class="flex items-center font-inter">
                <div class="flex">
                    <div x-data="{ isOpen: false, selectedOption: '' }" x-init="selectedOption = 'English'" class="flex ml-6 mr-6 lg:ml-0 lg:mr-0 relative">
                        <button @click="isOpen = !isOpen" class="flex items-center justify-between w-full px-4 py-2 text-gray-700 bg-white focus:outline-none focus:shadow-outline-gray">
                          <span x-text="selectedOption || 'Language'" class="mr-2"></span>
                          <img src="{{ URL::to('/') }}/assets/images/arrow-down.svg">
                        </button>
                        <div x-show="isOpen" class="absolute z-50 w-full mt-2 bg-white rounded-md shadow-lg">
                          <a x-on:click="selectedOption = 'English'; isOpen = false" href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">English</a>
                          <a x-on:click="selectedOption = 'Georgian'; isOpen = false" href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">Georgian</a>
                        </div>
                      </div>
                    </div>

                    <div x-data='{ showMenu: false }'>
                      <!-- Desktop Nav Menu -->
                      <div class="hidden lg:flex ml-10">
                        <p class="mr-2 font-bold">{{$user->username}}</p>
                        <div class="border border-gray-200"></div>
                        <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button class="ml-2">Log Out</button>
                        </form>
                      </div>
                    
                      <!-- Mobile Nav Menu -->
                      <button type="button" class="block lg:hidden" x-on:click="showMenu = !showMenu">
                        <img class="ml-6"src="{{ URL::to('/') }}/assets/images/menu-line.svg">
                      </button>
                      <div x-show="showMenu" x-transition:enter="transition ease-out duration-300 transform origin-top" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200 transform origin-top" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute top-0 right-0 mt-12 mr-2 py-2 px-4 bg-white rounded-md shadow-lg z-10">
                        <p class="mr-2 font-bold">{{$user->username}}</p>
                        <div class="border border-gray-200"></div>
                        <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button class="mr-2">Log Out</button>
                        </form>
                      </div>
                    </div>
            </div>
        </div>
</body>
