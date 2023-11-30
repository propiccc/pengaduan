@extends('Layouts.SystemLayout')
@section('title')
E-ADUIN | Pengaduan
@endsection
@section('content')
    <div class="bg-gray-800 min-h-[calc(100vh-60px)] overflow-scroll scrollbar-none flex flex-wrap p-5 gap-5 justify-center w-full">
        @foreach ($pengaduan as $item)
        {{-- * Card Start --}}  
        <div class="bg-gray-900 w-[500px] h-[300px] p-4 flex flex-col rounded-sm">
            {{--  * Header Start --}}
                <div class="flex min-h-[100px] w-full gap-x-2">
                    <a href="{{$item->imagedir}}" target="_blank" rel="noopener noreferrer">
                        <img class="h-[100px] bg-gray-800 w-[100px] object-contain" src="{{$item->imagedir}}" alt="">
                    </a>
                    <div class="w-[calc(100%-100px)]">
                        <p class="w-full text-lg font-semibold text-white">{{$item->tentang}}</p>
                    </div>
                </div>
                {{--  * Header End --}}
                {{-- * Body Start --}}
                <div class="h-[1px] w-full bg-white my-2"></div>
                <div class="text-white w-full min-h-[100px] overflow-hidden">
                    {{$item->aduan}}
                </div>
                {{-- * Body Ends --}}
            {{-- * Button Start --}}
            <div class="flex justify-end items-end h-full gap-x-1">
                    <a href="{{route('pengaduan.guru.detail',['uuid' => $item->uuid])}}" class="bg-purple-700 text-white px-4 py-2 font-semibold rounded-sm ">Detail</a>
            </div>
            {{-- * Button Ends --}}
        </div>
        {{-- * Card End --}}
        @endforeach
    </div>
@endsection