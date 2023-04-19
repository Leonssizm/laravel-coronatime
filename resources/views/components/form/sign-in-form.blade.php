<form method="POST" action="{{route('login')}}" >
    @csrf
    <div class="flex flex-col w-80 lg:w-96">
        <div class="flex flex-col">
                
            <label for='username' class="font-inter font-bold text-sm" >Username</label>
            <input 
            type="text" 
            class="border rounded-lg p-2 pl-6 h-14 font-inter @error('username') border-[#CC1E1E] @enderror 
            @if(!$errors->has('username') && !is_null(old('username'))) border-[#249E2C] 
            bg-success bg-no-repeat bg-right bg-origin-content @endif"
            placeholder="Enter unique username or Email"
            for="username"
            name="username"
            id="username"
            value="{{old('username')}}"
            >
            @error('username')
            <div class="flex">
                <img src="{{ URL::to('/') }}/assets/images/error-warning.svg">
                <p class="font-inter font-normal text-[#CC1E1E]">{{ $message }}</p>
            </div>
            @enderror
        </div>
        <div class="flex flex-col mt-6">
            <label for="password" class="font-inter font-bold text-sm" >Password</label>
            <input 
            type="password" 
            class="border rounded-lg p-2 pl-6 h-14 font-inter @error('password') border-[#CC1E1E] @enderror 
            @if(!$errors->has('password') && !is_null(old('password'))) border-[#249E2C] 
            bg-success bg-no-repeat bg-right bg-origin-content @endif"
            placeholder="Fill in Password"
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
        <div class="flex items-center flex-row-reverse justify-between mt-6 lg:justify-evenly">
            <a href="#" class="font-inter font-semibold text-[#2029F3] lg:ml-16">Forgot password?</a>
            <label for="checkbox" class="font-inter font-bold text-sm">Remember This device</label>
            <input 
            type="checkbox" 
            class="font-inter p-5"
            >
        </div>
        <div class="mt-6">
            <button type="submit" class="border rounded-lg w-80 h-14 bg-green-500 text-white font-inter text-white font-black uppercase lg:w-96">Log In</button>
        </div>
    </div>
</form>