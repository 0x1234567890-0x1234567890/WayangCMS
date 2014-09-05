<div class="row col-lg-8">
    <?php if(!empty($posts)): ?>
    <?php foreach($posts as $post): ?>
    <div class="posting">
        <h2><a href="<?php echo WY_Request::base_url(); ?>/post/<?php echo $post->permalink;?>"><?php echo $post->title; ?></a></h2>
        <h4 class="meta"><i class="fa fa-calendar-o"></i>&nbsp; 22 Days Ago   &nbsp;&nbsp;<i class="fa fa-tags"></i>&nbsp; News,First</h4>
        <div class="content clearfix">
            <?php echo $post->content; ?></div>

        <a href="<?php echo WY_Request::base_url(); ?>/post/<?php echo $post->permalink;?>" class="btn btn-info">  Read More&nbsp; <i class="fa fa-chevron-right"></i> </a>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>