<x-dashboard-layout>
    <div class="ml-5 mt-10 lg:ml-28 mt-14">
         <h1 class="font-inter text-2xl font-black">{{(__('sign_up.welcome_coronatime'))}}</h1>
         <h3 class="font-inter text-sm font-normal text-[#808189] mt-4">{{(__('sign_up.coronatime_header'))}}</h3>
         <div class="mt-6">
            <x-form.sign-up-form/>
        </div>
    </div>
    <div class="flex mt-6 ml-10 lg:ml-36">
        <p class="font inter font-normal text-[#808189]">{{(__('sign_up.have_an_account'))}}</p> <a class="font-inter font-semibold" href="{{route('sign-in')}}">{{(__('login.log_in'))}}</a>
    </div>
    <div class="flex ml-5 lg:ml-28">
        <div class="flex pl-28 mt-10">
            <nav class="flex">
                <a class="{{App::getLocale() == 'en' ? "px-2 py-1 mb-7 text-black border border-green" : "px-2 py-1 mb-7"}}" href="{{route('locale.change', 'en')}}">en</a>
                <a class="{{App::getLocale() == 'ka' ? "px-2 py-1 mb-7 text-black border border-green" : "px-2 py-1 mb-7"}}" href="{{route('locale.change', 'ka')}}">ka</a>
            <nav>
        </div>
    </div>
</x-dashboard-layout>