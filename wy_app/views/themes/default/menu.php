<?php $router = WY_Registry::get('router'); ?>   
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo WY_Request::base_url(); ?>">Home</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
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
                <ul class="nav navbar-right">
                    <li><a href="<?php echo $router->generate('admin-home'); ?>">Back To Admin</a></li>
                </ul>
               <?php }
                ?>
            </div>