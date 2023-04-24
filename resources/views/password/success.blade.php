<x-password.logo/>
    <div class="flex flex-col justify-center h-screen items-center mt-10 lg:mt-0">
      <img src="{{ URL::to('/') }}/assets/images/checkmark.gif" alt="checkmark">
      <p class="font-inter font-normal mt-4 mb-24">{{__('login.password_update')}}</p>
      <div class="mt-64 lg:mt-0">
      <a href="{{route('sign-in')}}" class="border flex items-center justify-center rounded-lg w-80 h-14 bg-green-500 text-white font-inter text-white font-black uppercase lg:w-96 mt-0">{{__('login.log_in')}}</a>
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