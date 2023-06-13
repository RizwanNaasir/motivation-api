<header>
    <div class="relative bg-white">
        <div
            class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="{{url('/')}}">
                    <span class="sr-only">Your Company</span>
                    <x-application-logo class="h-8 w-auto sm:h-10"/>
                </a>
            </div>
            <div class="items-center justify-end md:flex md:flex-1 lg:w-0 gap-4 md:gap-4">
                <a href="{{url('/')}}"
                   class="hidden lg:block whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                    Home
                </a>
                @auth
                @endauth
               @guest
                    <button
                        class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900 mr-1"
                        onclick="Livewire.emit('openModal', 'auth.login')">
                        Login
                    </button>
                    <button
                        class="inline-flex items-center rounded-md border border-transparent bg-purple-100 px-3 py-2 text-sm font-medium leading-4 text-purple-700 hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
                        onclick="Livewire.emit('openModal', 'auth.register')">
                        Sign Up
                    </button>

                @endguest
                @auth
                    <div class="flex justify-center items-center">
                        <div x-data="{ open: false }" class=" flex justify-center items-center z-50">
                            <div @click="open = !open" class="relative py-3" :class="{'border-indigo-700 transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                                <div class="flex justify-center items-center space-x-3 cursor-pointer">
                                    <div class="w-12 h-12 rounded-full overflow-hidden border-2 dark:border-white border-gray-900">
                                        <img src="{{auth()->user()->full_avatar}}"
                                             alt=""
                                             class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <div x-show="open" style="left: -212px; top: 65px;" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3 dark:bg-gray-800 bg-white rounded-lg shadow border dark:border-transparent mt-5">
                                    <ul class="space-y-3">
                                        <li class="font-medium">
                                            <button onclick="Livewire.emit('openModal', 'auth.change-password')" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                                                <div class="mr-3">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                                </div>
                                                Change Password
                                            </button>
                                        </li>
                                        <hr class="dark:border-gray-700">
                                        <li class="font-medium">
                                            <form method="post" action="{{route('logout')}}">
                                                @csrf
                                                <button type="submit" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                                                    <div class="mr-3 text-red-600">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                                    </div>
                                                    Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

        </div>
    </div>
</header>
