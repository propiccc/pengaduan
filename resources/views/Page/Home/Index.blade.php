@extends('Layouts.default')
@section('title')
    Home | E-ADUIN
@endsection
@section('content')
<div class="flex flex-col justify-center items-center bg-gray-600 px-5 py-16 h-[400px] md:h-[calc(100vh-60px)]">
    <span class="text-white text-4xl font-bold text-center md:w-[800px] md:text-7xl">
        Layanan Aspirasi dan Pengaduan Online Siswa Siswi Di Sekolah
    </span>
    <div class="flex justify-center my-4">
        <div class="h-[2px] w-[100px] bg-white"></div>
    </div>
    <span class="text-center text-2xl text-white md:text-4xl md:w-[700px]">Sampaikan laporan Anda langsung kepada Kami Dan Akan Kami Tangani</span>
</div>
<div class="flex w-full flex-col md:flex-row">
    <div class="bg-gray-900 flex flex-col px-16 py-20 md:py-36 w-full md:w-1/2">
        <span class="text-2xl text-white font-bold text-center md:text-7xl">Jumlah Laporan Saat Ini Yang Kami Terima</span>
        <div class="h-[2px] w-full bg-white my-10"></div>
        <span class="text-5xl text-center font-semibold text-white md:text-7xl">500.000 Laporan</span>
    </div>
    <div class="bg-gray-900 flex flex-col px-16 py-20 md:py-36 w-full md:w-1/2">
        <span class="text-2xl text-white font-bold text-center md:text-7xl">Jumlah Solusi Yang Kami Berikan</span>
        <div class="h-[2px] w-full bg-white my-10"></div>
        <span class="text-5xl text-center font-semibold text-white md:text-7xl">500.000 Solusi</span>
    </div>
</div>

{{--  * Form Start --}}
<div class="flex md:p-20 bg-gray-950">
    <div class="bg-gray-600 p-5 flex flex-col gap-y-2 w-full">
        <div class="text-3xl font-bold text-white text-center">
            Isi Form Pengaduan Di Sini
        </div>
        <div class="h-[2px] w-full bg-white my-3"></div>
        <form action="{{route('public.pengaduan')}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-y-2">
            @csrf
            @method('POST')

            <div class="flex flex-col">
                <label for="aduan" class="text-xl font-semibold text-white mb-2">Tentang : </label>
                <input id="aduan" type="text" name="tentang" class="p-2 bg-transparent border-gray-400 border-2 focus:border-white text-white focus:outline-none" autocomplete="off" required>
            </div>
            <div class="flex flex-col">
                <label for="tkp" class="text-xl font-semibold text-white mb-2">Tempat Kejadian : </label>
                <input id="tkp" type="text" name="tkp" class="p-2 bg-transparent border-gray-400 border-2 focus:border-white text-white focus:outline-none" autocomplete="off" required>
            </div>
            <div class="flex flex-col">
                <label for="aduan" class="text-xl font-semibold text-white mb-2">Pengaduan : </label>
                <textarea id="aduan" type="text" name="aduan" class="p-2 bg-transparent border-gray-400 border-2 focus:border-white text-white focus:outline-none" autocomplete="off" required></textarea>
            </div>
            <div class="flex flex-col">
                <label for="image" class="text-xl font-semibold text-white mb-2">Image Perkara : </label>
                <input id="image" type="file" name="image" class="p-2 bg-transparent border-gray-400 border-2 focus:border-white text-white focus:outline-none">
            </div>
            <div class="flex flex-col">
                <button class="border-2 p-4 font-semibold text-white hover:bg-white transition-all duration-500 mt-2 hover:text-black active:scale-95">SUBMIT</button>
            </div>
        </form>
    </div>
</div>
{{--  * Form End --}}


{{-- * Footer Start --}}
<footer class="bg-white shadow dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-4">
        <div class="sm:flex justify-center">
            <a href="/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse justify-center">
                <span class="text-2xl font-semibold whitespace-nowrap dark:text-white">ADUIN SCH</span>
            </a>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-center text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">ADUINSCh</a>. All Rights Reserved.</span>
    </div>
</footer>
{{-- * Footer End --}}
@endsection