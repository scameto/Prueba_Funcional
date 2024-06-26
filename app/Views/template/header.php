<nav class="bg-white border-gray-200 min-w-screen-xl">
    <div class="flex flex-wrap items-center justify-between p-4">
        <a href="<?=base_url()?>" class="flex items-center rtl:space-x-reverse">
            <img class="block h-12 w-auto" src="<?=base_url('/img/Icono.png')?>" alt="SIUTEL™ ICON">
            <span class="self-center text-2xl font-semibold whitespace-nowrap mx-0">SIUTEL™</span>
        </a>
        <div class="w-full md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white ">
                <li>
                    <a href="<?=base_url()?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">MENU:</a>
                </li>
                <li>
                    <a href="<?=base_url('alojamiento')?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Alojamiento</a>
                </li>
                <li>
                    <a href="<?=base_url('reservas')?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Reservas</a>
                </li>
                <li>
                    <a href="<?=base_url()?>" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">BOTON</a>
                </li>
            </ul>
        </div>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 items-center md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white ">
                <?php if (session()->get('isLoggedIn')): ?>
                    <li>
                        <span class="block py-2 px-3 text-gray-900 rounded md:p-0 ">Hola, <?=session()->get('name')?></span>
                    </li>
                    <li class="flex flex-row items-center justify-center gap-2">
                        <img src="<?=base_url()?>writable/uploads/logout.svg" alt="logout" class="h-4">
                        <a href="<?=base_url()?>logout" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Logout</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?=base_url()?>login" class="block py-2 px-3 text-cyan-400 text-lg rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Log in</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>register" class="block px-4 py-1 text-lg bg-cyan-400 text-white rounded hover:bg-gray-100 rounded-full">Register</a>
                    </li>
                    <li class="flex flex-row items-center justify-center gap-2 border-solid border rounded-full border-black py-2 px-3">
                        <img src="<?=base_url('img/menu.svg')?>" alt="logout" class="h-6">
                        <img src="<?=base_url('img/user.svg')?>" alt="logout" class="h-6">
                    </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</nav>