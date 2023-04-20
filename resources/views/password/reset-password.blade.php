<x-password.logo/>
    <div class="flex justify-center">
        <h1 class="font-inter text-2xl font-black mt-10 lg:mt-36">Reset Password</h1>
    </div>
    <form class="ml-6 mt-10 lg:flex justify-center" method="POST" action='{{Route('password.email')}}'>
        @csrf
        <div class="flex flex-col w-80 h-screen justify-between lg:w-96">
            <div class="flex flex-col">
                <label for='email' class="font-inter font-bold text-sm" >Email</label>
                <input 
                type="email" 
                class="border rounded-lg p-2 pl-6 h-14 font-inter @error('email') border-[#CC1E1E] @enderror 
                @if(!$errors->has('email') && !is_null(old('email'))) border-[#249E2C] 
                bg-success bg-no-repeat bg-right bg-origin-content @endif"
                placeholder="Enter unique username or Email"
                for="email"
                name="email"
                value="{{old('email')}}"
                >
                @error('email')
                <div class="flex">
                    <img src="{{ URL::to('/') }}/assets/images/error-warning.svg">
                    <p class="font-inter font-normal text-[#CC1E1E]">{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="mb-56 lg:mt-14">
                <button type="submit" class="border rounded-lg w-80 h-14 bg-green-500 text-white font-inter text-white font-black uppercase lg:w-96">Sign Up</button>
            </div>
        </div>
    </form>