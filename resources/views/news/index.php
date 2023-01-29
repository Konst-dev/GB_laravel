<?php foreach ($news as $item) : ?>
    <div style="border:1px solid #000">
        <h2><?= $item['title'] ?></h2>
        <p><?= $item['description'] ?></p>
        <div><strong><?= $item['author'] ?> <?= $item['created_time'] ?></strong>
            <a href="<?= route('news.show', ['id' => $item['id']]) ?>">Далее</a>
        </div>

    </div>
<?php endforeach; ?>