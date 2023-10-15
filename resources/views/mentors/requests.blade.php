@extends('dash')
@section('title', 'myMentor⭐welcome')
@section('content')
    @if (session('success'))
        <div class="alert alert-{{ session('status') }} alert-dismissible bg-[#025fff] fade fixed-top left-[70%] md:mt-5 md:py-2 show text-[14px] text-white w-[233px]" role="alert">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <div class="container flex flex-col gap-3">
        <div class="bg-[#f7f7f7] container md:pt-4 mx-auto rounded-sm">
            <div class="font-bold text-[24px] mb-4">Requests pending</div>
            <div class="flex flex-wrap md:flex-nowrap -mx-4">
                @foreach ($requests as $request)
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <a href="{{ route('mentor.profile', ['mentor' => $request->receiver->id]) }}">
                                <img class="w-full h-48 object-cover object-center"
                                src="{{ optional($request->receiver)->profilePicture ? asset('storage/images/' . $request->receiver->profilePicture) : asset('path-to-default-image') }}"
                                alt="{{ optional($request->receiver)->fullname ?? 'Mentor Name Not Available' }}">
                            </a>
                            <div class="p-4">
                                <h2 class="text-lg font-semibold text-gray-900">{{ optional($request->receiver)->fullname ?? 'Mentor Name Not Available' }}</h2>
                                <p class="text-gray-600"><i class="fa-solid fa-briefcase mr-2 text-slate-400 opacity-75"></i>{{ optional($request->receiver)->profession ?? 'Profession Not Available' }}</p>
                                <div class="mt-4 flex justify-between">
                                    <form method="post" action="{{ route('request.delete', $request->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Cancel Request</button>
                                    </form>
                                    <a href="{{ route('mentor.profile', ['mentor' => $request->receiver->id]) }}">
                                        <button class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">View Profile</button>


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="">
                <a href="/mentor">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</button>
                </a>
            </div>
        </div>
    </div>
@endsection
