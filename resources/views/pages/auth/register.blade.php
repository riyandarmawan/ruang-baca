@extends('components.base-layout')

@section('content-layout')
    <div class="h-dvh container flex items-center justify-center">
        <div class="w-[30rem] rounded-xl bg-primary px-4 py-6 text-background md:px-6">
            <h1 class="mb-8 text-center text-xl font-bold">Mulai daftarkan akun Anda sekarang!</h1>
            <form action="" method="POST">
                <div class="mb-4">
                    <input type="text" name="fullname" id="fullname" placeholder="Masukkan nama lengkap anda" autofocus
                        class="w-full rounded p-2 text-primary outline-none">
                </div>
                <div class="mb-4">
                    <input type="text" name="username" id="username" placeholder="Masukkan username anda" autofocus
                        class="w-full rounded p-2 text-primary outline-none">
                </div>
                <div class="mb-4">
                    <input type="email" name="email" id="email" placeholder="Masukkan email anda" autofocus
                        class="w-full rounded p-2 text-primary outline-none">
                </div>
                <div x-data="{ show: false }" class="relative mb-5 flex flex-col items-end">
                    <input x-bind:type="show ? 'text' : 'password'" name="password" id="password"
                        placeholder="Masukkan password anda" autofocus
                        class="mb-2 w-full rounded p-2 text-primary outline-none">
                    <div class="absolute flex items-center rounded-r bg-secondary p-2">
                        <span x-on:click="show = !show" x-bind:class="show ? 'i-mdi-eye-off' : 'i-mdi-eye '"
                            class="cursor-pointer bg-primary text-right text-2xl"></span>
                    </div>
                </div>
                <button
                    class="w-full rounded bg-background py-2 font-bold text-primary hover:opacity-90 focus:opacity-70 active:opacity-80">Masuk</button>
            </form>
            <a href="" class="mt-6 block text-center text-xs">kebijakan privasi</a>
        </div>
    </div>
@endsection
