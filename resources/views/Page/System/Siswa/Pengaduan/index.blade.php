@extends('Layouts.SystemLayout')
@section('title')
E-ADUIN | Pengaduan
@endsection
{{-- {{dd($pengaduan[0])}} --}}
@section('content')
    <div class="bg-gray-800 min-h-[calc(100vh-60px)] overflow-scroll scrollbar-none flex flex-wrap p-5 gap-5 justify-center w-full">
        @foreach ($pengaduan as $item)
            {{-- * Card Start --}}
            <div class="bg-gray-900 w-[340px] h-[300px] md:w-[500px] md:h-[300px] p-4 flex flex-col rounded-sm">
            <a href="{{route('pengaduan.siswa.detail',['uuid' => $item->uuid])}}">
                {{--  * Header Start --}}
                <div class="flex min-h-[100px] w-full gap-x-2">
                        <img class="h-[100px] bg-gray-900 w-[100px] object-cover" src="{{$item->imagedir}}" alt="">
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
                </a>
                    {{-- * Button Start --}}
                    <div class="flex justify-between items-end h-full gap-x-1">
                        @if ($item->status == 'pending' || $item->status == 'tolak')
                            @if ($item->status == 'tolak')
                                <span class="text-lg text-red-600">Pengaduan Di Tolak</span>
                            @endif
                            <a href="{{route('pengaduan.siswa.delete',['uuid' => $item->uuid])}}">
                                <button class="bg-red-700 text-white px-4 py-2 font-semibold rounded-sm">Hapus</button>
                            </a>                    
                        @else
                            <a href="{{route('pengaduan.siswa.detail', ['uuid' => $item->uuid])}}">
                                <button class="bg-green-700 text-white px-4 py-2 font-semibold rounded-sm">Lihat Solusi</button>
                            </a>
                        @endif
                    </div>
                    {{-- * Button Ends --}}
                </div>
            {{-- * Card End --}}
        @endforeach
    </div>
@endsection