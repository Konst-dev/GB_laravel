        <div style="border:1px solid #000; margin:10px; width:600px">
            <h2><?= $news['title'] ?></h2>
            <p style="margin:10px;text-align:justify"><?= $news['description'] ?></p>
            <div><strong><?= $news['author'] ?> <?= $news['created_time'] ?></strong>
                <a href="<?= route('news', ['cat' => $news['category_id']]) ?>">Назад</a>

            </div>
        </div>