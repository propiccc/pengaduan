@extends('Layouts.SystemLayout')
@section('title')
    E-ADUIN | Detail Pengaduan
@endsection
@section('content')
    <div class="bg-gray-800 flex w-full h-[calc(100vh-60px)] justify-center">
        {{-- * Header Start --}}
        <div class="flex bg-gray-900 p-10 w-[1400px] md:border-x-[2px] md:border-gray-500 flex-col overflow-scroll scrollbar-none">
            <div class="flex flex-wrap max-h-fit text-white">
                <a href="{{$pengaduan->imagedir}}" target="_blank" class="sm:mb-4 sm:h-fit sm:w-full md:h-[400px] md:w-[500px] object-contain border-[1px] border-gray-600">
                    <img class="sm:mb-4 sm:h-fit sm:w-full md:h-[400px] md:w-[500px] object-contain border-[1px] border-gray-600" src="{{$pengaduan->imagedir}}" alt="">
                </a>
                <div class="md:hidden h-[1px] bg-white my-2"></div>
                <div class="px-4 flex flex-col min-h-[400px] md:w-[calc(100%-500px)]">
                    <span class="text-xl font-semibold">Tentang :</span>
                    <p class="text-xl font-semibold min-h-[400px] max-h-fit">
                        {{$pengaduan->tentang}}
                    </p>
                </div>
            </div>
            {{-- * Header End --}}
            {{-- * Body Start --}}
            <div class="">
                <div class="h-[2px] bg-gray-400 my-5"></div>
                <div class="px-4 text-white flex flex-col min-h-[300px]">
                    <span class="text-xl font-semibold">Pengaduan :</span>
                    <p class="text-xl">
                        {{$pengaduan->aduan}}
                    </p>
                </div>
            </div>
            {{-- * Body End --}}
            
            {{-- * Solusi Start --}}
            @if (isset($pengaduan->Solusi) && $pengaduan->Solusi != null )
               <div class="">
                   <div class="h-[2px] bg-gray-400 my-5"></div>
                   <div class="px-4 text-white flex flex-col min-h-[300px]">
                       <span class="text-xl font-semibold">Solusi :</span>
                       <p class="text-xl">
                           {{$pengaduan->Solusi->solusi}}
                       </p>
                   </div>
               </div>
            @endif
                {{-- * Solusi End --}}
            {{-- * Actions Start --}}
            <div class="">
                <div class="h-[2px] bg-gray-400 my-5"></div>
                <div class="flex justify-between">
                    <a href="{{route('pengaduan.index')}}" class="font-semibold text-lg hover:text-white text-gray-600"><-- Kembali</a>
                </div>
            </div>
            {{-- * Actions End --}}
        </div>
    </div>
@endsection