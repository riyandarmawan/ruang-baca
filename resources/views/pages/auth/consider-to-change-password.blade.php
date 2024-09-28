<x-base-layout title="{{ $title }}">
    <div class="h-dvh flex w-full items-center justify-center bg-gray-100 p-4">
        <div
            class="max-w-md transform rounded-lg border border-primary bg-white p-6 shadow-lg transition duration-300 hover:scale-105">
            <div>
                <div class="mb-4 flex items-center space-x-4">
                    <!-- Optional Icon -->
                    <span class="i-mdi-alert me-2 text-2xl text-red-500"></span>
                    <h3 class="text-2xl font-bold text-gray-800">Perhatian!</h3>
                </div>
                <p class="leading-relaxed text-gray-600">
                    Anda masih menggunakan password default dari aplikasi ini. Untuk keamanan akun Anda, pertimbangkan
                    untuk mengganti password sekarang juga.
                </p>
                <div class="mt-6 text-center">
                    <a href="/dashboard"
                        class="me-4 inline-block rounded bg-red-500 px-4 py-2 font-medium text-white transition duration-300 hover:opacity-80">
                        Tidak
                    </a>
                    <a href="/dashboard/user/profile#ubah-password"
                        class="inline-block rounded bg-tersier px-4 py-2 font-medium text-white transition duration-300 hover:opacity-80">
                        Ganti Password
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
