<!-- component -->
<div class="max-w-screen-xl mx-auto">
        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 8em;">
            <div class="p-4 absolute bottom-0 left-0 z-20">
                <div class="flex mt-3">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg"
                         class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                        <p class="font-semibold text-gray-1000 text-lg"><?= \app\Models\User::find($blog['user_id'])['email'] ?></p>
                        <p class="font-semibold text-gray-800 text-xs"><?= $blog['created_at'] ?> </p>

                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
            <p class="pb-6"><?= $blog['text'] ?></p>
        </div>
    <!-- main ends here -->
    <div class="w-fullbg-white rounded-lg border p-1 md:p-3 m-10">
        <h3 class="font-semibold p-1">Discussion</h3>
        <div class="flex flex-col gap-5 m-3">
            <?php foreach ($comments as $comment): ?>
                <div class="flex w-full justify-between border rounded-md">
                    <div class="p-3">

                        <div class="flex gap-3 items-center">
                            <h3 class="font-bold">
                                <?= \app\Models\User::find($comment['user_id'])['email'] ?? 'Deleted User' ?>
                            </h3>

                        </div>
                        <p class="text-gray-600 mt-2">
                           <?= $comment['comment'] ?>
                        </p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
        <?php if (isset($_SESSION['id'])) : ?>

        <div class="w-full px-3 mb-2 mt-6">
            <form method="post" action="/addComment">
                <input type="hidden" name="id" value="<?= $blog['id'] ?>">
                <textarea
                        class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-400 focus:outline-none focus:bg-white"
                        name="comment" placeholder="Comment" required></textarea>


                <div class="w-full flex justify-end px-3 my-3">
                    <input type="submit" class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500 text-lg" value='Post Comment'>
                </div>
            </form>

        </div>
    <?php endif; ?>


</div>