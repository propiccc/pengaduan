@extends('Layouts.SystemLayout')
@section('title')
    E-ADUIN | DEtail Pengaduan
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
                <div class="h-[2px] bg-gray-400 my-5"></div>
            </div>
            {{-- * Body End --}}

            {{-- * Form Solusi Start --}}
            <div class="flex flex-col">
                <div class="flex flex-col">
                    <form action="{{route('solusi.guru.store',['uuid' => $pengaduan->uuid])}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-y-2">
                        @csrf
                        @method('POST')
                        <div class="flex flex-col">
                            <label for="solusi" class="text-xl font-semibold text-white mb-2">Solusi : </label>
                            <textarea id="solusi" type="text" name="solusi" class="p-2 bg-transparent border-gray-400 border-2 focus:border-white text-white focus:outline-none" autocomplete="off" required></textarea>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex gap-x-2">
                                <label for="image" class="text-xl font-semibold text-white">Image Solusi : </label>
                                <span class="text-gray-200 my-1 text-end">
                                    <span class="text-red-600">*</span>
                                    Jika Tidak Ada Image Maka Jangan Di Isi
                                </span>
                            </div>
                            <input id="image" type="file" name="image" class="p-2 bg-transparent border-gray-400 border-2 focus:border-white text-white focus:outline-none">
                        </div>
                        <div class="flex flex-col">
                            <button class="border-2 p-4 font-semibold text-white hover:bg-white transition-all duration-500 mt-2 hover:text-black active:scale-95">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- * Form Solusi End --}}

            {{-- * Actions Start --}}
            <div class="">
                <div class="h-[2px] bg-gray-400 my-5"></div>
                <div class="flex justify-between">
                    <a href="{{route('solusi.guru')}}" class="font-semibold text-lg hover:text-white text-gray-600"><-- Kembali</a>
                </div>
            </div>
            {{-- * Actions End --}}
        </div>
    </div>
@endsection