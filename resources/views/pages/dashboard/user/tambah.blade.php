<x-dashboard.layout title="{{ $title }}">
    <div class="h-full p-4">
        <div class="ms-auto h-full rounded bg-white p-4 shadow">
            <div>
                <form action="/dashboard/user/tambah" method="POST" enctype="multipart/form-data">
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
                            value="{{ $errors->has('name') ? '' : old('name')  }}"
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
                            value="{{ $errors->has('username') ? '' : old('username')  }}"
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
                            value="{{ $errors->has('email') ? '' : old('email')  }}"
                            class="{{ $errors->has('email') ? 'border-red-500 focus:ring-red-500' : '' }} col-span-3 rounded border px-4 py-2 shadow outline-none focus:ring">
                        @error('email')
                            <p class="col-span-3 col-start-2 mt-2.5 text-sm font-medium text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-4 grid grid-cols-4 items-center">
                        <label for="role" class="col-span-1 font-medium text-slate-500">Role</label>
                        <input type="text" id="role" name="role" required readonly value="admin" class="col-span-3 rounded border px-4 py-2 shadow outline-none focus:ring">
                    </div>
                    <button
                        class="col-span-4 mt-2 w-full rounded bg-tersier px-4 py-2 text-center font-medium text-white shadow hover:opacity-80 focus:opacity-70">Tambah</button>
                </form>
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
