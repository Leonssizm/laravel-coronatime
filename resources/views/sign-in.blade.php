<x-dashboard-layout>
    <div class="ml-5 mt-10 lg:ml-28 mt-14">
         <h1 class="font-inter text-2xl font-black">Welcome Back</h1>
         <h3 class="font-inter text-sm font-normal text-[#808189] mt-4">Welcome back! Please enter your details</h3>
         <div class="mt-6">
                <x-form.sign-in-form/>
        </div>
    </div>
    <div class="flex mt-6 ml-4 lg:ml-36">
        <p class="font inter font-normal text-[#808189]">Dont have an account?</p> <a class="font-inter font-semibold" href="{{route('sign-up')}}">Sign up for free</a>
    </div>
</x-dashboard-layout>

 