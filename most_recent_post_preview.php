<a class="features__link" title='<?= $row['title'] ?>' href='/post?id=<?= $row['post_id'] ?>'>
    <div class="features__section ">
        <div class="features__block">
            <img src="<?= $row['image_post'] ?>" class="features__imgs" alt="<?= $row['title'] ?>">
            <div class="features__description">
                <h4 class="features__section-head">
                    <?= $row['title'] ?>
                </h4>
                <h5 class="features__section-subhead">
                    <?= $row['subtitle'] ?>
                </h5>
            </div>
            <div class="features__sign">
                <div class="features__lab1">
                    <img src="<?= $row['image_author'] ?>" class="features__round" alt="<?= $row['author'] ?>">
                    <p class="features__sign-autor">
                        <?= $row['author'] ?>
                    </p>
                </div>
                <div class="features__lab2">
                    <p class="features__sign-date">
                    <?= $row['publish_date'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</a>