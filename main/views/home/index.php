<?php 
$this->title = 'Wayang-CMS - Home';
$this->registerJsFile('/assets/theme/js/jquery.js');
$this->registerCss('div { border: 1px solid #000; }');
?>

<?= $name ?>

<?php $this->beginBlock('extra'); ?>
<div>
    Extra Content
</div>
<?php $this->endBlock('extra'); ?>
