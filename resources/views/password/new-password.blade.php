<x-password.logo/>

<div class="flex justify-center">
    <h1 class="font-inter text-2xl font-black mt-10 lg:mt-36">Reset Password</h1>
</div>
<form class="ml-6 mt-10 lg:flex justify-center">
    <div class="flex flex-col w-80 justify-between lg:w-96">
        <div class="flex flex-col">
            <label for='new-password' class="font-inter font-bold text-sm mb-2" >New Password</label>
            <input 
            type="text" 
            class="border rounded-lg p-2 pl-6 h-14 font-inter"
            placeholder="Enter New password"
            >
        </div>

        <div class="flex flex-col mt-4">
            <label for='repeat-password' class="font-inter font-bold text-sm mb-2" >Repeat Password</label>
            <input 
            type="text" 
            class="border rounded-lg p-2 pl-6 h-14 font-inter"
            placeholder="Repeat password"
            >
        </div>
        <div class="mt-96 lg:mt-14">
            <button type="submit" class="border rounded-lg w-80 h-14 bg-green-500 text-white font-inter text-white font-black uppercase lg:w-96">Save Changes</button>
        </div>
    </div>
</form>