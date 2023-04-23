<x-landing.layout :user='$user'/>

<div class="ml-5 mt-10 lg:ml-28 mt-14">
    <h1 class="font-inter text-2xl font-black">{{__('statistics.worldwide_statistics')}}</h1>
    <div class="font-inter flex mt-6 lg:mt-10"> 
        <div class="mr-6 lg:mr-16">
            <a href="#" class="font-bold">{{__('statistics.worldwide')}}</a>
        <div class="border border-black mt-4"></div>
        </div>
        <div>
            <a href="{{route('countries')}}">{{__('statistics.by_country')}}</a>
        </div>
    </div>
</div>
<div class="mt-10">
    <x-statistics.worldwide-table :statistics='$statistics'/>
</div>