<a class="features__link" title='<?= $row['title'] ?>' href='/post?id=<?= $row['post_id'] ?>'>
    <img src="<?= $row['image_post'] ?>" class="features__image" alt="<?= $row['title'] ?>">
    <div class="features__block-article">
        <h4 class="features__article-head"><?= $row['title'] ?></h4>
        <h5 class="features__article-subhead"><?= $row['subtitle'] ?></h5>
        <div class="features__signature">
            <div class="features__label1">
                <img src="<?= $row['image_author'] ?>" class="features__round" alt="<?= $row['author'] ?>">
                <p class="features__signature-autor"> <?= $row['author'] ?></p>
            </div>
            <div class="features__label2">
                <p class="features__signature-date"><?= date($row['publish_date']) ?></p>
            </div>
        </div>
    </div>

</a>