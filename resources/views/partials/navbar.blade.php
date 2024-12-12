<nav class="glass-navbar text-gray-900 dark:text-gray-50 fixed w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset($settings->logo) }}" alt="Logo" height="auto" width="180" class="mt-3">
        </a>
        
        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="/" class="block py-2 px-3 text-blue-600 hover:text-blue-800">Home</a>
                </li>
                <li>
                    <a href="#Services" class="block py-2 px-3 text-blue-600 hover:text-blue-800">Services</a>
                </li>
                                    
                <li>
                    <a href="/about" class="block py-2 px-3 text-blue-600 hover:text-blue-800">About Us</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-blue-600 hover:text-blue-800">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const navbar = document.querySelector('.glass-navbar');
        const mainContent = document.querySelector('main');
        if (navbar) {
            const navbarHeight = navbar.offsetHeight;
            mainContent.style.paddingTop = `${navbarHeight}px`;
        }
    });
</script>

