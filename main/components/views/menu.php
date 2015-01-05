<?php
use system\core\Registry;
use system\core\helpers\Url;

?>  
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= Registry::getRequest()->baseUrl() ?>">Wayang CMS</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php if(!empty($menuItems)): ?>
                    <?php foreach($menuItems as $menu): ?>
                    <li><a href="<?= Url::to(array('page/view', 'permalink' => $menu->permalink)) ?>"><?= $menu->title ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            
            <!-- if logged in -->
            <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= Url::to(array('admin')) ?>">Back To Admin</a></li>
            </ul>
            
        </div>
    </div>
</div>