@extends('Layouts.dashboard')
@section('title')
    Admin | Dashboard
@endsection
@section('content')
<div class="flex flex-wrap gap-x-5 w-full justify-start">
    <div class=" h-[200px] w-[350px] rounded-lg flex flex-col shadow-xl">
        <div class="w-full h-[70px] bg-gray-900 rounded-t-lg flex items-center px-4 text-xl font-semibold text-white">User :</div>
        <div class="h-full w-full bg-white rounded-b-lg flex justify-center items-center font-semibold text-5xl text-black">
            {{$user}}
        </div>
    </div>
    <div class=" h-[200px] w-[350px] rounded-lg flex flex-col shadow-xl">
        <div class="w-full h-[70px] bg-gray-900 rounded-t-lg flex items-center px-4 text-xl font-semibold text-white">pengaduan :</div>
        <div class="h-full w-full bg-white rounded-b-lg flex justify-center items-center font-semibold text-5xl text-black">
            {{$pengaduan}}
        </div>
    </div>
</div>
@endsection