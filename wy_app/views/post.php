<div class="row col-lg-8">
<?php if(!empty($posts)): ?>
    <?php foreach($posts as $post): ?>
        <div class="posting">
            <h2><a href="<?php echo WY_Request::base_url(); ?>/post/<?php echo $post->permalink;?>"><?php echo $post->title; ?></a></h2>
            <?php echo $post->content; ?>
        </div>
    <?php endforeach; ?>
<?php else: ?>
        <div class="posting">
            <h4>Tidak ada data</h4>
        </div>
<?php endif; ?>
</div>

