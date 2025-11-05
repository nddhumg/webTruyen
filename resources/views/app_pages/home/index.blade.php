@extends('layouts.app')

@section('title', 'Trang chủ - WebTruyen')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('blocks.slide')

        {{-- Truyện mới cập nhật --}}
        <section class="mt-8">
            <h2 class="text-xl font-semibold px-4 sm:px-6 lg:px-8">📚 Truyện mới cập nhật</h2>

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                    <x-story-card title="Thiên Tài Phép Thuật" imageLink="https://s2.anhvip.xyz/comics/thien-tai.jpg"
                        url="https://example.com/comic/1" :chapters="['Chapter 112', 'Chapter 111', 'Chapter 110']" >
                    </x-story-card>


                </div>
            </div>
        </section>

        <x-pagination></x-pagination>
    </div>
@endsection
