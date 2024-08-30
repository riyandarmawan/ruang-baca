<aside x-bind:class="detail ? '!w-52 px-2' : ''"
                class="flex flex-col gap-4 bg-primary py-2 ps-2 text-background duration-300 w-14">

                <x-dashboard.navbar/>

                <hr x-bind:class="detail ? '' : 'w-10'">

                <div x-data="{ open: false }" class="relative flex cursor-pointer items-center justify-evenly py-4">
                    <div x-bind:class="{ 'left-8': !detail, '!block': open }"
                        class="absolute bottom-full hidden w-48 rounded bg-background text-primary shadow-2xl">
                        <a href="/dashbaord/user/profile"
                            class="group flex items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                            <span class="i-mdi-user bg-primary text-xl group-hover:bg-background"></span>
                            Profile
                        </a>
                        <a href="/dashboard/user/settings"
                            class="group flex items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                            <span class="i-mdi-gear bg-primary text-xl group-hover:bg-background"></span>
                            Settings
                        </a>
                        <a href="/auth/logout"
                            class="group flex items-center gap-2 p-4 text-base font-bold hover:bg-tersier hover:text-background">
                            <span class="i-mdi-logout bg-primary text-xl group-hover:bg-background"></span>
                            Logout
                        </a>
                    </div>
                    <div class="flex overflow-hidden">
                        <div x-on:click="open = !open" class="me-14 ms-1 flex items-center gap-4">
                            <img src="/images/user/jajang.jpg" alt="user"
                                class="h-8 w-8 rounded-full border border-background">
                            <h4 class="text-lg font-semibold">Jajang</h4>
                        </div>
                        <span x-on:click="open = !open"
                            x-bind:class="open ? 'i-mdi-arrow-drop-down' : 'i-mdi-arrow-drop-up'"
                            class="cursor-pointer bg-background text-4xl"></span>
                    </div>
                </div>
            </aside>