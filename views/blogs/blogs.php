<div class="row items-push">
    <?php foreach ($blogs as $blog) { ?>
    <div class="col-md-6 col-xl-4">
        <div class="block block-rounded h-100 mb-0">
            <div class="block-header block-header-default">
                <a href="/dashboard/blog?id=<?= $blog['id'] ?>">
                    <button type="button" class="btn-block-option">Show blog <i class="fa fa-fw fa-eye"></i></button>
                </a>
                <div class="block-options">
                    <a ><button type="button" class="btn-block-option">Edit <i class="fa fa-fw fa-pencil-alt"></i></button></a>
                </div>
            </div>
            <div class="block-content">
                <p><?= $blog['text'] ?></p>
            </div>
        </div>
    </div>
    <?php } ?>

</div>
