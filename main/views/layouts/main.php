<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->title ?></title>
    <?php $this->registerCssFile('/assets/theme/css/styles.css') ?>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?= $this->block('extra') ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>