<div class="row col-lg-8">
<?php if(!empty($posts)): ?>
    <?php foreach($posts as $post): ?>
        <div class="posting">
            <h2><a href="<?php echo WY_Request::base_url(); ?>/post/<?php echo $post->permalink;?>"><?php echo $post->title; ?></a></h2>
            <?php echo $post->content; ?>
            <a href="<?php echo WY_Request::base_url(); ?>/post/<?php echo $post->permalink;?>" class="btn btn-info"><i class="fa fa-eye"></i>   Read More</a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>