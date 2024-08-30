@extends('components.base-layout')

@section('content-layout')
    <x-header/>

    <div class="mt-14">
        @yield('content')
    </div>

    <footer class="py-4">
        <div class="container text-center">
            <small class="lg:text-sm">&copy; 2024 Ruang Baca. All rights reserved.</small>
        </div>
    </footer>
@endsection
