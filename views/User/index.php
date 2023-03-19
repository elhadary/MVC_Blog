<div class="bg-white py-12 sm:py-18">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The Blog</h2></div>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            <?php foreach ($blogs as $blog): ?>
            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="group relative">
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        <a href="/blog?id=<?= $blog['id'] ?>">
                            <span class="absolute inset-0"></span>
                            <?= substr($blog['text'],0,15).'...' ?>
                        </a>
                    </h3>
                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">
                        <?= substr($blog['text'],0,200).'...' ?>
                    </p>
                </div>
                <div class="relative mt-8 flex items-center gap-x-4">
                    <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                    <div class="text-sm leading-6">
                        <p class="font-semibold text-gray-900">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                            </a>
                        </p>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>
