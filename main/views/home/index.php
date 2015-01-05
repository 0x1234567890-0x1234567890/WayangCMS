<?php
use system\core\helpers\Url;

$this->title = 'Wayang-CMS - Home';

?>

<div class="row col-lg-8">
    <?php if(!empty($posts)): ?>
    <?php foreach($posts as $post): ?>
    <div class="posting">
        <h2><a href="<?= Url::to(array('post/view', 'permalink' => $post->permalink)) ?>"><?= $post->title ?></a></h2>
        <h4 class="meta"><i class="fa fa-calendar-o"></i>&nbsp; <?= $post->date_add; ?>   &nbsp;&nbsp;
            <i class="fa fa-tags"></i>&nbsp; 
                <?php 
                
                $t = explode(",", $post->tag);
                $lab = array("label-warning", "label-default", "label-success", "label-info");
                
                foreach ($t as $k => $v)
                {
                    $l = array_rand($lab);
                    echo " <span class='label ".$lab[$l]."'>".$v."</span> ";
                }
                ?>
        </h4>
        <div class="content clearfix">
            <?= $post->content ?>
        </div>
        <a href="<?= Url::to(array('post/view', 'permalink' => $post->permalink)) ?>" class="btn btn-info">  Read More&nbsp; <i class="fa fa-chevron-right"></i> </a>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
