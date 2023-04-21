@props(['statistics'])


{{-- @php
    dd($statistics[1]['new_cases']);
@endphp --}}
<div class="lg:flex lg:justify-around">
    {{-- New Cases --}}
    <div class="w-96 h-48 mt-6 mx-2 bg-violet-100 rounded-lg lg:h-64 lg:mx-2">
        <div class="opacity-100 flex justify-center items-center flex-col">
            <div class="mb-4">
            <img src="{{ URL::to('/') }}/assets/images/statistics-new.svg" class="mt-6">
            </div>
            <p class="font-inter font-normal text-[#010414]">New cases</p>
            <p class="font-inter font-bold text-2xl text-[#2029F3] mt-4">{{$statistics[0]['new_cases']}}</p>
        </div>
    </div>

    <div class="flex">
    {{-- Recovered --}}
    <div class="w-96 h-48 mt-6 mx-2 bg-green-50 rounded-lg lg:h-64 lg:mr-24 lg:mx-0">
        <div class="opacity-100 flex justify-center items-center flex-col">
            <div class="mb-4">
            <img src="{{ URL::to('/') }}/assets/images/statistics-recovered.svg" class="mt-12">
            </div>
            <p class="font-inter font-normal text-[#010414]">Recovered</p>
            <p class="font-inter font-bold text-2xl text-[#0FBA68] mt-4">{{$statistics[1]['recovered']}}</p>
        </div>
    </div>

    {{-- Death --}}
    <div class="w-96 h-48 mt-6 mx-2 bg-yellow-50 rounded-lg lg:h-64 lg:ml-32 lg:mx-0">
        <div class="opacity-100 flex justify-center items-center flex-col">
            <div class="mb-4">
            <img src="{{ URL::to('/') }}/assets/images/statistics-death.svg" class="mt-12">
            </div>
            <p class="font-inter font-normal text-[#010414]">Death</p>
            <p class="font-inter font-bold text-2xl text-[#EAD621] mt-4">{{$statistics[2]['deaths']}}</p>
        </div>
    </div>
    </div>
</div>