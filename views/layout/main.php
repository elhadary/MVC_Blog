<!doctype html>
<html class="h-full bg-gray-200">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? null ?></title>
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
                    <?php if(!isset($_SESSION['email'])) {?>
                    <li class="p-2" data-te-nav-item-ref><a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="/login" data-te-nav-link-ref
                        >Login</a>
                    </li>
                    <li class="p-2" data-te-nav-item-ref><a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="/register" data-te-nav-link-ref
                        >Register</a>
                    </li>
                    <?php }else { ?>
                    <li class="p-2" data-te-nav-item-ref>
                        <a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                           href="/dashboard" data-te-nav-link-ref
                        >Dashboard</a>
                    </li>
                    <li class="p-2" data-te-nav-item-ref>
                        <a class="p-0 text-white opacity-60 hover:opacity-80 focus:opacity-80 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                           href="/logout" data-te-nav-link-ref
                        >Logout</a>
                    </li>
                    <?php } ?>
                </ul>

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