<style>
    @import url('https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,700;1,600&display=swap');

    * {
        font-family: 'Archivo', sans-serif;


    }
</style>
@extends('dash2')
@section('title', 'myMentor⭐welcome')
@section('content')
    @if (session('success'))
        <div class="alert alert-{{ session('status') }} alert-dismissible bg-[#025fff] fade fixed-top left-[70%] md:mt-5 md:py-2 show text-[14px] text-white w-[233px]"
            role="alert">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    {{-- end alert --}}
    <div class="container flex flex-col  gap-3">
        <x-welcomehero />

        <div class="bg-[#f7f7f7] container md:pt-4 mx-auto  rounded-sm">
            <div class="bg-[#f7f7f7] container md:pt-4 mx-auto rounded-sm">
                <div class="font-bold text-[24px] mb-4">Mentees Requests </div>
                <div class="flex flex-wrap md:flex-nowrap -mx-4">
                    @foreach ($requests as $request)
                        <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                <a href="{{ route('mentee.profile', ['mentee' => $request->requester->id]) }}">
                                    <img class="w-full h-48 object-cover object-center"
                                    src="{{ optional($request->requester)->profilePicture ? asset('storage/images/' . $request->requester->profilePicture) : asset('path-to-default-image') }}"
                                    alt="{{ optional($request->requester)->fullname ?? 'Mentor Name Not Available' }}">
                                </a>
                                <div class="p-4">
                                    <h2 class="text-lg font-semibold text-gray-900">{{ optional($request->requester)->fullname ?? 'Mentor Name Not Available' }}</h2>
                                    <p class="text-gray-600"><i class="fa-solid fa-briefcase mr-2 text-slate-400 opacity-75"></i>{{ optional($request->requester)->profession ?? 'Profession Not Available' }}</p>
                                    <div class="mt-4 flex justify-between">
                                        <form method="post" action="{{ route('requests.delete', $request->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Cancel Request</button>
                                        </form>
                                        <a href="{{ route('mentee.profile', ['mentee' => $request->requester->id]) }}">
                                            <button class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">View Profile</button>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="">
                <a href="/allrequests">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">View All</button>
                </a>
            </div>

        </div>

    @endsection
