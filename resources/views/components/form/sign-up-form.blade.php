
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
                <label for='email' class="font-inter font-bold text-sm" >Email</label>
                <input 
                type="email" 
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
            <div class="flex flex-col mt-6">
                <label for="repeat-password" class="font-inter font-bold text-sm" >Repeat password</label>
                <input 
                type="password" 
                class="border rounded-lg p-2 pl-6 h-14 font-inter"
                placeholder="Fill in Password"
                >
            </div>
            <div class="mt-6">
                <button type="submit" class="border rounded-lg w-80 h-14 bg-green-500 text-white font-inter text-white font-black uppercase lg:w-96">Sign Up</button>
            </div>
        </div>
    </form>