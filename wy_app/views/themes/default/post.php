<div class="row col-lg-8">
    <?php if(!empty($post)): ?>
    <div class="posting">
        <h2><a href="<?php echo WY_Request::base_url(); ?>/post/<?php echo $post->permalink;?>"><?php echo $post->title; ?></a></h2>
        <?php echo $post->content; ?>
    </div>
    <?php else: ?>
    <div class="posting">
        <h4>Tidak ada data</h4>
    </div>
    <?php endif; ?>
    <div class="comment">
        <h3>Written By <a href="#">WWyadmin</a></h3>
        <div class="col-lg-4 avatar">
            <img src="http://lorempixel.com/268/150/" class="media-object" />
        </div>
        <div class="col-lg-8">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, porro nobis exercitationem aliquam vitae. Dolor praesentium nemo tenetur minima eos nam, quod magnam animi, quo hic, dolorum blanditiis, ipsum eaque.</p>
        </div>
        <div class="col-lg-12 ">
            <div class="content socials">

                <ul>
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-github"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-vk"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
             <hr>
            <h3>Left a Comment</h3>
            
            <div class="col-lg-12 row">
                <div class="">
                    <form role="form" class="form-group" method="POST" action="<?php echo WY_Request::base_url();?>/post/comment/">
                        <input type="hidden" name="postid" id="postid" value="<?php echo $post->post_id;?>"/>
                        <input type="hidden" name="p" id="permalink" value="<?php echo $post->permalink;?>"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        URL</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span>
                                        </span>
                                        <input type="url" class="form-control" id="url" name="url" placeholder="Enter URL" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject">
                                        Captha</label>
                                    <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Enter captha" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                    <i class="fa fa-send"></i> Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="list-comment">
        <?php if(!empty($comment)): ?>
        <?php foreach($comment as $c): ?>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object ava" src="http://lorempixel.com/150/150/" alt="Generic placeholder image">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $c->name;?></h4>
                <h4 class="media-meta"><i class="fa fa-clock-o"></i> <?php echo $c->date;?>/h4>
                <p><?php echo $c->content;?></p>
            </div>
        </div>
        <?php endforeach;
        else: ?>
        <h4>No Comment Found for This Post.</h4>
        <?php endif; ?>
    </div>
</div>