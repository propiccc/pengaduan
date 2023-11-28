@extends('Layouts.SystemLayout')
@section('title')
E-ADUIN | Pengaduan
@endsection
@section('content')
    <div class="bg-gray-800 min-h-[calc(100vh-60px)] overflow-scroll scrollbar-none flex flex-wrap p-5 gap-5 justify-center w-full">
        {{-- * Card Start --}}
        <div class="bg-gray-900 w-[500px] h-[300px] p-4 flex flex-col rounded-sm">
            {{--  * Header Start --}}
            <div class="flex min-h-[100px] w-full gap-x-2">
                <img class="h-[100px] bg-gray-900 w-[100px]" src="https://media.tacdn.com/media/attractions-splice-spp-674x446/09/c3/33/97.jpg" alt="">
                <div class="w-[calc(100%-100px)]">
                    <p class="w-full text-lg font-semibold text-white">Lorem ipsum dolor adipisicing elit. Illo, optio expedita. Quod odit quia asperiores rerum nisi veritatis quasi alias.</p>
                </div>
            </div>
            {{--  * Header End --}}
            {{-- * Body Start --}}
            <div class="h-[1px] w-full bg-white my-2"></div>
            <div class="text-white w-full min-h-[100px] overflow-hidden">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error libero facilis aliquid. Nostrum sequi illo accusantium incidunt distinctio vitae dolores reiciendis officia. Numquam vero placeat nihil qui consectetur tempore voluptatem quibusdam vel blanditiis omnis maxime, officiis repudiandae ratione laboriosam provident. Totam repellat blanditiis suscipit necessitatibus aut nemo! Totam, minus deleniti nisi sapiente possimus iste, cum dolorum voluptatum ratione accusantium iure? Assumenda reiciendis vel unde explicabo rem quos ratione quidem ipsum sunt sed cumque quo, magni quis veniam, doloremque itaque quae ad laudantium atque omnis. Dolorum facere praesentium nemo earum dolores officiis? Quaerat rerum animi in ad dolor iusto ab eius?
            </div>
            {{-- * Body Ends --}}
            {{-- * Button Start --}}
            <div class="flex justify-end items-end h-full gap-x-1">
                <button class="bg-blue-700 text-white px-4 py-2 font-semibold rounded-sm ">Terima</button>
                <button class="bg-red-700 text-white px-4 py-2 font-semibold rounded-sm ">Tolak</button>
            </div>
            {{-- * Button Ends --}}
        </div>
        {{-- * Card End --}}
    </div>
@endsection