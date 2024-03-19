<a class="features__link" title='<?= $post['title'] ?>' href='/post?id=<?= $post['id'] ?>'>
    <div class="features__article <?= $post['class'] ?>">
        <h4 class="features__article-head">
            <?= $post['title'] ?>
        </h4>
        <h5 class="features__article-subhead">
            <?= $post['subtitle'] ?>
        </h5>
        <div class="features__signature">
            <div class="features__label1">
                <img src="<?= $post['img_modifier'] ?>" class="features__round" alt="<?= $post['author'] ?>">
                <p class="features__signature-autor">
                    <?= $post['author'] ?>
                </p>
            </div>
            <div class="features__label2">

                <p class="features__signature-date">
                    <?= date("F d Y", $post['date']) ?>
                </p>
            </div>
        </div>
    </div>
</a>