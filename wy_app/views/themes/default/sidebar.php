            <div class="row col-lg-4 sidebar">
                <!--<h2>Labels</h2>
                <div class="bs-example" style="margin-bottom: 20px;border-bottom: 1px solid #dddddd;padding-bottom:25px;">
                    <span class="label label-default">Default</span>
                    <span class="label label-primary">Primary</span>
                    <span class="label label-success">Success</span>
                    <span class="label label-warning">Warning</span>
                    <span class="label label-danger">Danger</span>
                    <span class="label label-info">Info</span>
                    <span class="label label-primary">Primary</span>
                    <span class="label label-success">Success</span>
                    <span class="label label-warning">Warning</span>
                    <span class="label label-danger">Danger</span>
                    <span class="label label-info">Info</span>
                </div>-->
                <div class="media recent-recent">
                    <h2>Recent Post</h2>
                    <!--<a href="#" class="pull-left">
                        <img src="http://lorempixel.com/64/64/" class="media-object">
                    </a>-->
                    <?php if(!empty($recents)): ?>
                        <?php foreach($recents as $recent): ?>
                    <div class="media-body recent-recent" contenteditable="false">
                        <h4 class="media-heading"><a href="<?php echo WY_Request::base_url(); ?>/post/<?php echo $recent->permalink;?>"><?php echo $recent->title;?></a></h4>
                        <?php 
                        $p=  explode("</p>", $recent->content);
                        echo substr($p[0],0,100)." ...";
                        ?>
                    </div>
                        <?php endforeach; ?>    
                    <?php endif; ?>
                </div>
                <h2>Categories</h2>
                <div class="list-group">
                    <?php if(!empty($lists)): ?>
                    <?php foreach($lists as $list): ?>
                    <a href="<?php echo WY_Request::base_url(); ?>/label/<?php echo $list->permalink;?>" class="list-group-item"><?php echo $list->title;?></a>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>