<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Add a blog</h3>
    </div>

    <div class="block-content">
        {{alert}}

        <form method="POST">
            <div class="mb-4">
                <!-- SimpleMDE Container -->
                <textarea class="js-simplemde" id="simplemde" name="text"></textarea>
            </div>
                <button type="submit" class="btn btn-primary">Add the blog</button>
        </form>
    </div>
</div>