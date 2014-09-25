<?php $router = WY_Registry::get('router'); ?>  
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo WY_Request::base_url(); ?>">Wayang CMS</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php if(!empty($lists)): ?>
                <?php foreach($lists as $list): ?>
                <li><a href="<?php echo WY_Request::base_url(); ?>/page/<?php echo $list->permalink;?>"><?php echo $list->title;?></a></li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <?php
            if(WY_Auth::is_authenticated())
            {?>
            <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo $router->generate('admin-home'); ?>">Back To Admin</a></li>
            </ul>
            <?php }
            ?>
        </div>
    </div>
</div>