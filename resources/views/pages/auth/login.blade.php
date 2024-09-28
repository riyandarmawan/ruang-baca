<x-base-layout title="{{ $title }}">
    <div x-data="{showModalPesan: {{ session('success') ? true : false }}}" x-init="showModalPesan && setTimeout(() => showModalPesan = false, 5000)" class="h-dvh container flex items-center justify-center relative">
        <div class="w-[30rem] rounded-xl bg-primary px-4 py-6 text-background md:px-6">
            <h1 class="mb-8 text-center text-xl font-bold">Masuk ke akun Anda</h1>
            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <input type="text" name="username" id="username" required placeholder="Masukkan username anda" value="{{ $errors->has('username ') ? '' : old('username') }}"
                        class="{{ $errors->has('username') ? 'input-error' : '' }} w-full rounded p-2 text-primary outline-none">
                    @error('username')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div x-data="{ show: false }" class="relative mb-5 flex flex-col items-end">
                    <input x-bind:type="show ? 'text' : 'password'" required name="password" id="password"
                        placeholder="Masukkan password anda"
                        class="{{ $errors->has('password') ? 'input-error' : '' }} mb-2 w-full rounded p-2 text-primary outline-none">
                    @error('password')
                        <p class="self-start col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="absolute flex items-center rounded-r bg-secondary p-2">
                        <span x-on:click="show = !show" x-bind:class="show ? 'i-mdi-eye-off' : 'i-mdi-eye '"
                            class="cursor-pointer bg-primary text-right text-2xl"></span>
                    </div>
                </div>
                <button
                    class="w-full rounded bg-tersier py-2 font-bold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Masuk</button>
            </form>
        </div>

        <div x-cloak x-show="showModalPesan" class="bg-green-500 p-4 w-96 absolute rounded shadow right-10 top-10 z-[9999] text-background">
            <div class="flex justify-between items-center text-xl font-semibold">
                <h3>Pesan</h3>
                <span @click="showModalPesan = false" class="i-mdi-close cursor-pointer hover:opacity-50"></span>
            </div>
            <div class="mt-3">
                <p>{{ session('success') ?? '' }}</p>
            </div>
        </div>
    </div>
</x-base-layout>
