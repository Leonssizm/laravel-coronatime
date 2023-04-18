<x-landing.layout :user='$user'/>

<div class="ml-5 mt-10 lg:ml-28 mt-14">
    <h1 class="font-inter text-2xl font-black">Worldwide Statistics</h1>
    <div class="font-inter flex mt-6 lg:mt-10"> 
        <div class="mr-6 lg:mr-16">
            <a href="#" class="font-bold">Worldwide</a>
        <div class="border border-black mt-4"></div>
        </div>
        <div>
            <a href="#">By country</a>
        </div>
    </div>
</div>
<div class="mt-10">
    <x-statistics.worldwide-table/>
</div>