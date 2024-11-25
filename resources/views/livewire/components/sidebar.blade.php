<div>
    <div class="flex flex-col w-64 h-screen">
        <div
            class="fixed top-16 left-0 w-64 h-screen overflow-y-auto overflow-x-hidden flex-grow  bg-white dark:bg-gray-900/40  dark:border-gray-800/40 border-r">
            <ul class="flex flex-col py-4 space-y-1">
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-500 dark:text-white-800 ">Menu</div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-100 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-800 border-l-4 border-transparent hover:border-gray-800 dark:hover:border-gray-100 pr-6
   {{ Request::is('dashboard*') ? 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-50 border-gray-800 dark:border-gray-50' : '' }}">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                              </svg>                              
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('pembelian') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-100 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-800 border-l-4 border-transparent hover:border-gray-800 dark:hover:border-gray-100 pr-6
   {{ Request::is('pembelian*') ? 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-50 border-gray-800 dark:border-gray-50' : '' }}">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                              </svg>       
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Pembelian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kategori') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-100 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-800 border-l-4 border-transparent hover:border-gray-800 dark:hover:border-gray-100 pr-6
   {{ Request::is('kategori*') ? 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-50 border-gray-800 dark:border-gray-50' : '' }}">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                              </svg>                              
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Kategori</span>
                    </a>

                </li>
                <li class="relative transition">
                    <input class="peer hidden" type="checkbox" id="menu-1"  />
                    <a
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-100 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-800 border-l-4 border-transparent hover:border-gray-800 dark:hover:border-gray-100 pr-6 peer-checked:bg-gray-50 
                        {{ Request::is('lokasi*', 'ruang*', 'loker*') ? 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-50 border-gray-800 dark:border-gray-50' : '' }}">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                              </svg>                              
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Lokasi</span>
                        <label for="menu-1" class="absolute inset-0 h-full w-full cursor-pointer"></label>
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="absolute right-0 top-4 ml-auto mr-5 h-4 text-gray-600 transition peer-checked:rotate-180 peer-hover:text-gray-600"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                    <ul
                        class="duration-400 flex max-h-0 bg-gray-50 flex-col overflow-hidden font-medium transition-all duration-300 peer-checked:max-h-96">
                        <li>
                            <a href="{{ route('lokasi') }}"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-100 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-800 border-l-4 border-transparent hover:border-gray-800 dark:hover:border-gray-100 pl-10 
                                {{ Request::is('lokasi*') ? 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-50 border-gray-800 dark:border-gray-50' : '' }}">
                                <span class="mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                      </svg>
                                      
                                </span>
                                Lokasi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ruang') }}"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-100 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-800 border-l-4 border-transparent hover:border-gray-800 dark:hover:border-gray-100 pl-10 
                            {{ Request::is('ruang*') ? 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-50 border-gray-800 dark:border-gray-50' : '' }}">
                                <span class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                                  </svg>                                  
                                </span>
                                Ruang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('loker') }}"
                                class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-100 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-800 border-l-4 border-transparent hover:border-gray-800 dark:hover:border-gray-100 pl-10 
                            {{ Request::is('loker*') ? 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-50 border-gray-800 dark:border-gray-50' : '' }}">
                                <span class="mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                                    </svg>
                                </span>
                                Loker
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('barang.index') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-100 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-800 border-l-4 border-transparent hover:border-gray-800 dark:hover:border-gray-100 pr-6
   {{ Request::is('barang*') ? 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-50 border-gray-800 dark:border-gray-50' : '' }}">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                              </svg>                              
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Barang</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('peminjam.index') }}"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-100 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-800 border-l-4 border-transparent hover:border-gray-800 dark:hover:border-gray-100 pr-6
   {{ Request::is('peminjam*') ? 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-50 border-gray-800 dark:border-gray-50' : '' }}">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Peminjam</span>
                        <span
                            class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-500 bg-green-50 rounded-full">5</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Notifikasi</span>
                        <span
                            class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">12</span>
                    </a>
                </li>
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-500">Tansaksi</div>
                    </div>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                              </svg>                              
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Peminjaman</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Laporan</span>
                    </a>
                </li>
               
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-500">Settings</div>
                    </div>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
