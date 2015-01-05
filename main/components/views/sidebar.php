<?php
use system\core\helpers\Url;
?>
<div class="row col-lg-4 sidebar">
    
    <div class="media recent-recent">
        <h2>Recent Post</h2>
        
        <?php if (!empty($recentPosts)) : ?>
            <?php foreach ($recentPosts as $post) : ?>
                <div class="media-body recent-recent" contenteditable="false">
                    <h4 class="media-heading"><a href="<?= Url::to(array('post/view', 'permalink' => $post->permalink)) ?>"><?= $post->title ?></a></h4>
                    <?php $p = explode("</p>", $recent->content); echo substr($p[0],0,100)." ..."; ?>
                </div>
            <?php endforeach; ?>    
        <?php endif; ?>
    </div>
    
    <h2>Categories</h2>
    
    <div class="list-group">
        <?php if (!empty($categories)) : ?>
            <?php foreach ($categories as $category) : ?>
            <a href="<?= Url::to(array('category/view', 'permalink' => $category->permalink)) ?>" class="list-group-item"><?= $category->title ?></a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
</div>