<section class="main-content mt-3">
    <div class="container-xl">



        <div class="row gy-4">

            <div class="col-lg-12">
                <!-- post single -->
                <div class="post post-single">

                    <p><?= $blog['text'] ?></p>

                </div>

                <div class="spacer" data-height="50" style="height: 50px;"></div>

                <div class="about-author padding-30 rounded">
                    <div class="details">
                        <h4 class="name"><?= \app\Models\User::find($blog['user_id'])['email'] ?></h4>
                        <h6 class="date"><?= $blog['created_at'] ?></h6>

                    </div>
                </div>

                <div class="spacer" data-height="50" style="height: 50px;"></div>

                <!-- section header -->
                <div class="section-header">
                    <h3 class="section-title">Comments (<?= count($comments) ?>)</h3>
                </div>
                <!-- post comments -->
                <div class="comments bordered padding-30 rounded">

                    <ul class="comments">
                        <!-- comment item -->
                        <?php foreach ($comments as $comment): ?>
                        <li class="comment rounded">
                            <h5  class="text-xsmooth"><?= \app\Models\User::find($comment['user_id'])['email'] ?? 'Deleted User' ?></h5>

                            <div class="details">
                                <p><?= $comment['comment'] ?></p>
                            </div>
                        </li>
                        <?php endforeach; ?>

                    </ul>
                </div>

                <div class="spacer" data-height="50" style="height: 50px;"></div>


                <!-- comment form -->
            </div>


        </div>

    </div>
</section>