<x-password.logo/>

<div class="flex justify-center">
    <h1 class="font-inter text-2xl font-black mt-10 lg:mt-36">{{__('login.reset_password')}}</h1>
</div>
<form class="ml-6 mt-10 lg:flex justify-center" method="POST" action='{{route('change-password')}}'>
    @csrf
    <div class="flex flex-col w-80 justify-between lg:w-96">
        <div class="flex flex-col mt-6">
            <label for="password" class="font-inter font-bold text-sm" >{{__('login.password')}}</label>
            <input 
            type="password" 
            class="border rounded-lg p-2 pl-6 h-14 font-inter @error('password') border-[#CC1E1E] @enderror 
            @if(!$errors->has('password') && !is_null(old('password'))) border-[#249E2C] 
            bg-success bg-no-repeat bg-right bg-origin-content @endif"
            placeholder="{{__('sign_up.password_placeholder')}}"
            for="password"
            name="password"
            >
            @error('password')
            <div class="flex">
                <img src="{{ URL::to('/') }}/assets/images/error-warning.svg">
                <p class="font-inter font-normal text-[#CC1E1E]">{{ $message }}</p>
            </div>
            @enderror
        </div>
        <input type="hidden" name="id" value="{{ request()->query('id') }}">
        <div class="flex flex-col mt-6">
            <label for="password_confirmation" class="font-inter font-bold text-sm" >{{__('sign_up.repeat_password')}}</label>
            <input 
            type="password" 
            class="border rounded-lg p-2 pl-6 h-14 font-inter"
            placeholder="{{__('sign_up.repeat_password_placeholder')}}"
            for="password_confirmation"
            name="password_confirmation"
            >
        </div>
        <div class="mt-96 lg:mt-14">
            <button type="submit" class="border rounded-lg w-80 h-14 bg-green-500 text-white font-inter text-white font-black uppercase lg:w-96">{{__('login.save_changes')}}</button>
            <div class="flex lg:ml-14">
                <div class="flex pl-28 mt-10">
                    <nav class="flex">
                        <a class="{{App::getLocale() == 'en' ? "px-2 py-1 mb-7 text-black border border-green" : "px-2 py-1 mb-7"}}" href="{{route('locale.change', 'en')}}">en</a>
                        <a class="{{App::getLocale() == 'ka' ? "px-2 py-1 mb-7 text-black border border-green" : "px-2 py-1 mb-7"}}" href="{{route('locale.change', 'ka')}}">ka</a>
                    <nav>
                </div>
            </div>
        </div>
    </div>
</form>