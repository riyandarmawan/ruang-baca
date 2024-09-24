<x-base-layout title="{{ $title }}">
    <div class="h-dvh container flex items-center justify-center">
        <div class="w-[30rem] rounded-xl bg-primary px-4 py-6 text-background md:px-6">
            <h1 class="mb-8 text-center text-xl font-bold">Mulai daftarkan akun Anda sekarang!</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div x-data="{ imagePreview: '{{ asset('storage/images/users/user.png') }}' }" class="mb-4 grid grid-cols-3 items-center">
                    <div class="flex col-start-2 flex-col gap-4">
                        <label for="profile"
                            class="focus focus-ring {{ $errors->has('profile') ? 'input-error' : 'input-unerror' }} m-auto aspect-square w-24 mb-4 cursor-pointer overflow-hidden rounded-full border border-primary focus:ring outline-none">
                            <img src="{{ asset('storage/images/users/user.png') }}" :src="imagePreview" alt="Photo Profile"
                                class="aspect-square rounded-full w-full object-cover">
                        </label>
                        <input type="file" name="profile" id="profile"
                            value="{{ $errors->has('profile') ? '' : old('profile') }}" @change="fileChosen"
                            class="{{ $errors->has('profile') ? 'input-error' : 'input-unerror' }} w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring hidden">
                    </div>
                    @error('profile')
                        <p class="m-auto col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="text" name="name" id="name" placeholder="Masukkan nama lengkap anda" value="{{ $errors->has('name ') ? '' : old('name') }}" required 
                        class="{{ $errors->has('name') ? 'input-error' : '' }} w-full rounded p-2 text-primary outline-none">
                    @error('name')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="text" name="username" id="username" placeholder="Masukkan username anda" value="{{ $errors->has('username ') ? '' : old('username') }}" required 
                        class="{{ $errors->has('username') ? 'input-error' : '' }} w-full rounded p-2 text-primary outline-none">
                    @error('username')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="email" name="email" id="email" placeholder="Masukkan email anda" value="{{ $errors->has('email ') ? '' : old('email') }}" required 
                        class="{{ $errors->has('email') ? 'input-error' : '' }} w-full rounded p-2 text-primary outline-none">
                    @error('email')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div x-data="{ show: false }" class="relative mb-1 flex flex-col items-end">
                    <input x-bind:type="show ? 'text' : 'password'" name="password" id="password"
                        placeholder="Masukkan password anda" required
                        class="{{ $errors->has('password') ? 'input-error' : '' }} mb-2 w-full rounded p-2 text-primary outline-none">
                    @error('password')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="absolute flex items-center rounded-r bg-secondary p-2">
                        <span x-on:click="show = !show" x-bind:class="show ? 'i-mdi-eye-off' : 'i-mdi-eye '"
                            class="cursor-pointer bg-primary text-right text-2xl"></span>
                    </div>
                </div>
                <div x-data="{ show: false }" class="relative mb-5 flex flex-col items-end">
                    <input x-bind:type="show ? 'text' : 'password'" name="password_confirmation" id="password_confirmation"
                        placeholder="Konfirmasi password" required
                        class="{{ $errors->has('password_confirmation') ? 'input-error' : '' }} mb-2 w-full rounded p-2 text-primary outline-none">
                    @error('password_confirmation')
                        <p class="col-span-2 col-start-2 mt-2 text-sm font-medium text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="absolute flex items-center rounded-r bg-secondary p-2">
                        <span x-on:click="show = !show" x-bind:class="show ? 'i-mdi-eye-off' : 'i-mdi-eye '"
                            class="cursor-pointer bg-primary text-right text-2xl"></span>
                    </div>
                </div>
                <button
                    class="w-full rounded bg-tersier py-2 font-bold text-background hover:opacity-90 focus:opacity-70 active:opacity-80">Daftar</button>
            </form>
            <p class="text-link mt-8 text-center text-sm">Sudah punya akun? <a href="/auth/login"
                    class="font-bold hover:underline">Masuk sekarang!</a></p>
        </div>
    </div>

    <script>
        function fileChosen(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-base-layout>
