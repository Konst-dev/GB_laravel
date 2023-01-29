<h1>Категории новостей:</h1>
<?php foreach ($categories as $item) : ?>
    <a href="<?= route('news', ['cat' => $item['id']]) ?>" style="margin:10px"><?= $item['name'] ?></a>

<?php endforeach; ?>