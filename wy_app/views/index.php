<div class="row col-lg-8">
<?php if(!empty($posts)): ?>
    <?php foreach($posts as $post): ?>
        <div class="posting">
            <h2><a><?php echo $post->title; ?></a></h2>
            <?php echo $post->content; ?>
            <button type="button" class="btn btn-info"><i class="fa fa-eye"></i>   Read More</button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>