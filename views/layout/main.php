<!doctype html>
<html class="h-full bg-gray-200">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
            rel="stylesheet"/>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>
    <script src="https://cdn.tailwindcss.com/3.2.4"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>
</head>
<body>
    <nav class="relative flex w-full flex-wrap items-center justify-between bg-neutral-900 py-3 text-neutral-200 shadow-lg lg:flex-wrap lg:justify-start" data-te-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between px-6">
            <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto" id="navbarSupportedContent4" data-te-collapse-item>
                <a class="pr-2 text-xl font-semibold text-white" href="/">Homepage</a>
                <!-- Left links -->
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
                    <li class="p-2" data-te-nav-item-ref><a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="/dasdas" data-te-nav-link-ref
                        >404</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="relative flex items-center">

                <!-- GUEST -->

                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>

                    <li class="p-2" data-te-nav-item-ref><a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="/login" data-te-nav-link-ref
                        >Login</a>
                    </li>
                    <li class="p-2" data-te-nav-item-ref><a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="/register" data-te-nav-link-ref
                        >Register</a>
                    </li>
                </ul>

                <!-- Icon -->
                <div class="relative" data-te-dropdown-ref>
                    <a
                            class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
                            href="#"
                            id="dropdownMenuButton2"
                            role="button"
                            data-te-dropdown-toggle-ref
                            aria-expanded="false">
                        <img
                                src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
                                class="rounded-full"
                                style="height: 25px; width: 25px"
                                alt=""
                                loading="lazy" />
                    </a>
                    <ul
                            class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                            aria-labelledby="dropdownMenuButton2"
                            data-te-dropdown-menu-ref>
                        <li>
                            <a
                                    class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                    href="#"
                                    data-te-dropdown-item-ref
                            >Action</a
                            >
                        </li>
                        <li>
                            <a
                                    class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                    href="#"
                                    data-te-dropdown-item-ref
                            >Another action</a
                            >
                        </li>
                        <li>
                            <a
                                    class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                    href="#"
                                    data-te-dropdown-item-ref
                            >Something else here</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
    </nav>
    <div class="min-h-full">
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                {{content}}
            </div>
        </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</body>
</html>