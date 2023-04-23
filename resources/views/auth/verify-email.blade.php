<x-password.logo/>
    <div class="flex flex-col justify-center h-screen items-center mt-10 lg:mt-0">
      <img src="{{ URL::to('/') }}/assets/images/checkmark.gif" alt="checkmark">
      <p class="font-inter font-normal mt-4 mb-24">{{__('sign_up.account_confirmation')}}</p>
      <div class="mt-64 lg:mt-0">
      <a href="/" class="border flex items-center justify-center rounded-lg w-80 h-14 bg-green-500 text-white font-inter text-white font-black uppercase lg:w-96 mt-0">{{__('login.log_in')}}</a>
      </div>
    </div>