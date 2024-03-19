<a class="features__link" title='<?= $post['title'] ?>' href='/post?id=<?= $post['id'] ?>'>
    <div class="features__section ">
        <div class="features__block">
            <img src="<?= $post['image_post'] ?>" class="features__imgs" alt="<?= $post['title'] ?>">
            <div class="features__description">
                <h4 class="features__section-head">
                    <?= $post['title'] ?>
                </h4>
                <h5 class="features__section-subhead">
                    <?= $post['subtitle'] ?>
                </h5>
            </div>
            <div class="features__sign">
                <div class="features__lab1">
                    <img src="<?= $post['img_modifier'] ?>" class="features__round" alt="<?= $post['author'] ?>">
                    <p class="features__sign-autor">
                        <?= $post['author'] ?>
                    </p>
                </div>
                <div class="features__lab2">
                    <p class="features__sign-date">
                    <?= date("n/d/Y", $post['date']) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</a>