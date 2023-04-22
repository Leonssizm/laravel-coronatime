
<x-landing.layout :user='$user'/>
<div class="ml-5 mt-10 lg:ml-28 mt-14">
    <h1 class="font-inter text-2xl font-black">Statistics by country</h1>
    <div class="font-inter flex mt-6 lg:mt-10"> 
        <div class="mr-6 lg:mr-16">
            <a href="{{route('landing')}}">Worldwide</a>
        </div>
        <div class="mr-6 lg:mr-16">
            <a href="#" class="font-bold">By country</a>
        <div class="border border-black mt-4"></div>
        </div>
    </div>
</div>
<div class="ml-5 mt-10 lg:ml-28">
    <x-statistics.country-table :statistics='$statistics'/>
</div>