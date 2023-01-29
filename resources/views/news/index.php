<h1><?= $category['name'] ?></h1>
<a href="<?= route('categories.show', []) ?>">К категориям</a>
<?php foreach ($news as $item) : ?>
    <?php if ($cat == $item['category_id']) : ?>

        <div style="border:1px solid #000; margin:10px; width:600px">
            <h2><?= $item['title'] ?></h2>
            <p style="margin:10px;text-align:justify"><?= $item['description'] ?></p>
            <div><strong><?= $item['author'] ?> <?= $item['created_time'] ?></strong>
                <a href="<?= route('news.show', ['id' => $item['id']]) ?>">Далее</a>

            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>