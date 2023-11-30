@extends('Layouts.dashboard')
@section('title')
    Admin | Pengaduan
@endsection
@php
  $i = 1;
@endphp
@section('content')
<div class="bg-gray-900 text-white w-full rounded-lg p-8">
    <div class="flex justify-between items-center">
        <span class="text-xl font-semibold text-white">Pengaduan Data</span>
        {{-- <a href="{{route('pengaduan.create')}}">
            <button class="px-5 py-2 rounded-lg bg-blue-700 font-semibold text-white transition-all duration-300 active:scale-90">Add</button>
        </a> --}}
    </div>
    <div class="h-[2px] w-full bg-gray-200 my-4"></div>
    <div class="flex mb-4">
        {{-- <form action="{{route('pengaduan.search')}}" method="POST" class="m-0 flex">
            @csrf
            @method("POST")
            <input name="search" type="text" class="py-2 border-gray-400 border-2 rounded-tl-lg rounded-bl-lg px-2 w-[150px] focus:outline-blue-500 h-full" placeholder="Search" autocomplete="off">
            <button class="bg-gray-500 hover:bg-blue-700 font-semibold h-full px-3 text-white rounded-tr-lg rounded-br-lg">Search</button>
        </form> --}}
    </div>
    <div class="">
        <table class="bg-gray-900 w-full text-white">
           <thead class="w-full h-[40px] bg-gray-800">
                <tr class="w-full"> 
                    <th class="w-[50px]">No.</th>
                    <th class="text-center w-[200px]">Image</th>
                    <th>Nama User</th>
                    <th>Tipe</th>
                    <th>Penerima Aduan</th>
                    <th>Satus</th>
                    <th>Tgl Dubuat</th>
                    <th>Actions</th>
                </tr>
           </thead>
           <tbody class="text-center h-full">
            @if (count($pengaduan) != 0)
                @foreach ($pengaduan as $item )
                    <tr class="h-[50px] border-b-[1px] border-gray-200">
                        <td>{{ $i++ }}</td>
                        <td class="flex justify-center">
                            <a href="{{$item->imagedir}}" target="_blank" rel="noopener noreferrer">
                                <img class="h-[100px] w-[100px] object-contain" src="{{$item->imagedir}}" alt="">
                            </a>
                        </td>
                        <td>{{$item->User->name}}</td>
                        <td>{{$item->tipe == 'pemgaduan' ? 'Pengaduan' : 'Konsultasi'}}</td>
                        <td>{{$item->Penerima == null ? 'Tidak Ada' : $item->Penerima->name}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->created_at}}</td>
                        <td class="">
                            <a  href="{{route('pengaduan.detail',['uuid' => $item->uuid])}}" class="px-4 py-2 text-white bg-purple-600 rounded-lg font-semibold transition-all duration-300 active:scale-95 cursor-pointer">Detail</a>
                            <a  href="{{route('pengaduan.delete',['uuid' => $item->uuid])}}" class="px-4 py-2 text-white bg-red-600 rounded-lg font-semibold transition-all duration-300 active:scale-95 cursor-pointer">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else   
                <tr  class="bg-gray-800 h-[50px]">
                    <th colspan="7" class="text-start px-2">Data Not Found</th>
                </tr>
            @endif
           </tbody>
        </table>
    </div>
</div>
@endsection
