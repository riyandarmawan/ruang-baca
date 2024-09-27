<x-dashboard.layout title="{{ $title }}">
    <div class="h-full p-4">
        <div x-data="{ activatedTab: window.location.hash || '#profile', showModalHapus: false }" class="ms-auto h-full rounded bg-white p-4 shadow">
            <ul class="mb-4 flex border-b border-slate-200">
                <li><button @click="window.location.hash = '#profile'; activatedTab = '#profile'"
                        :class="activatedTab === '#profile' ? 'tab-active' : 'tab-inactive'" class="tab">Profile</>
                </li>
                <li><button @click="window.location.hash = '#ubah'; activatedTab = '#ubah'"
                    {{ Auth::user()->username == 'superadmin' ? 'disabled' : '' }}
                        :class="activatedTab === '#ubah' ? 'tab-active' : 'tab-inactive'" class="tab">Ubah</>
                </li>
                <li><button @click="window.location.hash = '#ubah-password'; activatedTab = '#ubah-password'"
                    {{ Auth::user()->username == 'superadmin' ? 'disabled' : '' }}
                        :class="activatedTab === '#ubah-password' ? 'tab-active' : 'tab-inactive'" class="tab">Ubah
                        Password</>
                </li>
                <li><button @click="window.location.hash = '#hapus'; activatedTab = '#hapus'"
                        {{ Auth::user()->username == 'superadmin' ? 'disabled' : '' }}
                        :class="activatedTab === '#hapus' ? 'tab-active' : 'tab-inactive'" class="tab">Hapus</>
                </li>
            </ul>

            <div x-cloak x-show="activatedTab === '#profile'" class="grid grid-cols-4">
                <div class="col-span-4 mb-8">
                    <img src="{{ asset('storage/images/users/' . Auth::user()->profile) }}"
                        alt="{{ Auth::user()->name }}" class="m-auto aspect-square w-24 rounded-full object-cover">
                </div>
                <ul class="col-span-1 flex flex-col gap-2 font-medium text-slate-500">
                    <li>Nama</li>
                    <li>Username</li>
                    <li>Email</li>
                </ul>
                <ul class="col-span-3 flex flex-col gap-2">
                    <li>{{ Auth::user()->name }}</li>
                    <li>{{ Auth::user()->username }}</li>
                    <li>{{ Auth::user()->email }}</li>
                </ul>
            </div>

            @if (Auth::user()->username !== 'superadmin')
                <div x-cloak x-show="activatedTab === '#ubah'">
                    <form action="/dashboard/user/ubah/{{ Auth::user()->username }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div x-data="{ imagePreview: '{{ asset('storage/images/users/' . Auth::user()->profile) }}' }" class="mb-4 grid grid-cols-3 items-center">
                            <div class="col-start-2 flex flex-col gap-4">
                                <label for="profile"
                                    class="focus focus-ring {{ $errors->has('profile') ? 'input-error' : 'input-unerror' }} m-auto mb-4 aspect-square w-24 cursor-pointer overflow-hidden rounded-full border border-primary outline-none focus:ring">
                                    <img src="{{ asset('storage/images/users/' . Auth::user()->profile) }}"
                                        :src="imagePreview" alt="Photo Profile"
                                        class="aspect-square w-full rounded-full object-cover">
                                </label>
                                <input type="file" name="profile" id="profile" @change="fileChosen"
                                    class="{{ $errors->has('profile') ? 'input-error' : 'input-unerror' }} hidden w-full rounded border border-primary p-2 shadow shadow-slate-500 outline-none focus:ring">
                            </div>
                            @error('profile')
                                <p class="col-start-2 m-auto text-sm font-medium text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-4 items-center">
                            <label for="name" class="col-span-1 font-medium text-slate-500">Nama</label>
                            <input type="text" id="name" name="name" required
                                value="{{ old('name', Auth::user()->name) }}"
                                class="{{ $errors->has('name') ? 'border-red-500 focus:ring-red-500' : '' }} col-span-3 rounded border px-4 py-2 shadow outline-none focus:ring">
                            @error('name')
                                <p class="col-span-3 col-start-2 mt-2.5 text-sm font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-4 items-center">
                            <label for="username" class="col-span-1 font-medium text-slate-500">Username</label>
                            <input type="text" id="username" name="username" required
                                value="{{ old('username', Auth::user()->username) }}"
                                class="{{ $errors->has('username') ? 'border-red-500 focus:ring-red-500' : '' }} col-span-3 rounded border px-4 py-2 shadow outline-none focus:ring">
                            @error('username')
                                <p class="col-span-3 col-start-2 mt-2.5 text-sm font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4 grid grid-cols-4 items-center">
                            <label for="email" class="col-span-1 font-medium text-slate-500">Email</label>
                            <input type="email" id="email" name="email" required
                                value="{{ old('email', Auth::user()->email) }}"
                                class="{{ $errors->has('email') ? 'border-red-500 focus:ring-red-500' : '' }} col-span-3 rounded border px-4 py-2 shadow outline-none focus:ring">
                            @error('email')
                                <p class="col-span-3 col-start-2 mt-2.5 text-sm font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button
                            class="col-span-4 mt-2 w-full rounded bg-tersier px-4 py-2 text-center font-medium text-white shadow hover:opacity-80 focus:opacity-70">Ubah</button>
                    </form>
                </div>

                <div x-cloak x-show="activatedTab === '#ubah-password'">
                    <form action="/dashboard/user/ubah-password/{{ Auth::user()->username }}" method="POST">
                        @csrf
                        <div x-data="{ showPassword: false }" class="mb-4 grid grid-cols-4 items-center">
                            <label for="oldPassword" class="col-span-1 font-medium text-slate-500">Password Lama</label>
                            <div class="relative col-span-3">
                                <input :type="showPassword ? 'text' : 'password'" id="oldPassword" name="oldPassword"
                                    required
                                    class="{{ $errors->has('oldPassword') ? 'border-red-500 focus:ring-red-500' : '' }} w-full rounded border px-4 py-2 shadow outline-none focus:ring">
                                <div class="absolute right-0 top-0 rounded bg-slate-100 px-2 pb-1 pt-3"><span
                                        @click="showPassword = !showPassword"
                                        :class="showPassword ? 'i-mdi-eye-closed' : 'i-mdi-eye'"
                                        class="cursor-pointer text-lg"></span></div>
                            </div>
                            @error('oldPassword')
                                <p class="col-span-3 col-start-2 mt-2.5 text-sm font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div x-data="{ showPassword: false }" class="mb-4 grid grid-cols-4 items-center">
                            <label for="password" class="col-span-1 font-medium text-slate-500">Password Baru</label>
                            <div class="relative col-span-3">
                                <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                                    required
                                    class="{{ $errors->has('password') ? 'border-red-500 focus:ring-red-500' : '' }} w-full rounded border px-4 py-2 shadow outline-none focus:ring">
                                <div class="absolute right-0 top-0 rounded bg-slate-100 px-2 pb-1 pt-3"><span
                                        @click="showPassword = !showPassword"
                                        :class="showPassword ? 'i-mdi-eye-closed' : 'i-mdi-eye'"
                                        class="cursor-pointer text-lg"></span></div>
                            </div>
                            @error('password')
                                <p class="col-span-3 col-start-2 mt-2.5 text-sm font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div x-data="{ showPassword: false }" class="mb-4 grid grid-cols-4 items-center">
                            <label for="password_confirmation"
                                class="col-span-1 font-medium text-slate-500">Konfirmasi
                                Password</label>
                            <div class="relative col-span-3">
                                <input :type="showPassword ? 'text' : 'password'" id="password_confirmation" required
                                    name="password_confirmation"
                                    class="{{ $errors->has('password_confirmation') ? 'border-red-500 focus:ring-red-500' : '' }} w-full rounded border px-4 py-2 shadow outline-none focus:ring">
                                <div class="absolute right-0 top-0 rounded bg-slate-100 px-2 pb-1 pt-3"><span
                                        @click="showPassword = !showPassword"
                                        :class="showPassword ? 'i-mdi-eye-closed' : 'i-mdi-eye'"
                                        class="cursor-pointer text-lg"></span></div>
                            </div>
                            @error('password_confirmation')
                                <p class="col-span-3 col-start-2 mt-2.5 text-sm font-medium text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button
                            class="col-span-4 mt-2 w-full rounded bg-tersier px-4 py-2 text-center font-medium text-white shadow hover:opacity-80 focus:opacity-70">Ubah
                            Password</button>
                    </form>
                </div>

                <div x-cloak x-show="activatedTab === '#hapus'">
                    <a @click.prevent="showModalHapus = !showModalHapus" href=""
                        class="font-medium text-red-500">Hapus akun ini</a>
                </div>
            @endif

            <!-- Modal Background Overlay -->
            <div x-cloak x-show="showModalHapus"
                class="fixed inset-0 z-40 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <!-- Modal Container -->
                <div @click.outside="showModalHapus = false"
                    class="w-96 scale-100 transform rounded-lg bg-white p-6 shadow-lg transition-transform duration-300">
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-800">Konfirmasi Hapus</h2>
                        <button @click="showModalHapus = false"
                            class="i-mdi-close text-2xl text-gray-400 transition duration-200 hover:text-gray-600">
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="mt-4">
                        <p class="text-gray-600">
                            Apakah anda yakin ingin menghapus akun ini?
                        </p>
                    </div>

                    <!-- Modal Footer -->
                    <div class="mt-6 flex justify-end space-x-3">
                        <button @click="showModalHapus = false"
                            class="rounded bg-gray-200 px-4 py-2 font-medium text-gray-700 transition duration-200 hover:bg-gray-300">
                            Batal
                        </button>
                        <form action="/dashboard/user/hapus/{{ Auth::user()->username }}" method="POST">
                            @csrf
                            <button
                                class="rounded bg-red-500 px-4 py-2 font-medium text-white transition duration-200 hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
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
</x-dashboard.layout>
