<form>
    <div class="flex flex-col w-80 lg:w-96">
        <div class="flex flex-col">
            <label for='username' class="font-inter font-bold text-sm" >Username</label>
            <input 
            type="text" 
            class="border rounded-lg p-2 pl-6 h-14 font-inter"
            placeholder="Enter unique username or Email"
            >
        </div>
        <div class="flex flex-col mt-6">
            <label for="password" class="font-inter font-bold text-sm" >Password</label>
            <input 
            type="password" 
            class="border rounded-lg p-2 pl-6 h-14 font-inter"
            placeholder="Fill in Password"
            >
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