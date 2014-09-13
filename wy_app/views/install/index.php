<?php $router = WY_Registry::get('router'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">WayangCMS Installation Step License Agreement</h3>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="<?php echo $router->generate('install-step', array('id'=>1));?>" enctype="multipart/form-data" >
            <fieldset>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="chat-panel panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-list fa-fw"></i>
                                WayangCMS License Agreement
                            </div>
                            <div class="panel-body">
                                <p class="chat">
                                    About Start Bootstrap
Start Bootstrap is a collection of free to use, open source themes and templates for the Bootstrap framework. The project was created in 2013 by Iron Summit Media Strategies, a digital marketing agency in Orlando, FL. All of the templates you see on Start Bootstrap are free to use for any purpose, even commercial, without attribution. New and existing templates are created and maintained by Iron Summit Media Strategies.

Copyright and License
Start Bootstrap is licensed under the Apache License, Version 2.0. Our free themes and templates that you can download on our site are open source, and are free to use, even commercially. Additionally, attribution is not required if you use our templates. All we ask is that if you like Start Bootstrap, be sure to share our website with your friends! You can view a copy of the license in our GitHub repository.

About Bootstrap
Bootstrap is a "sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development." All of Start Bootstrap's templates are built using the Bootstrap framework, and you should have a good understanding of the framework before using our templates.

You can read more about Bootstrap on their official website at http://getbootstrap.com/about/.

Accessing the Themes & Templates
To use our free templates, you can download them directly from our website using the download button on each of the template overview pages. You can also find the source files for each of our templates on GitHub, and you can fork a copy of the Start Bootstrap GitHub repository for your own development purposes.

Still Having Trouble?
If you run into any bugs with any of our templates, please feel free to open an issue on our GitHub page. If you have solved a bug within one of our templates, you can submit a pull request with the bug fix. For additional support and other questions, please email us at help@startbootstrap.com and we will try our best to assist you. You can also hire us and we can complete your project for you! Thanks for visiting Start Bootstrap!

Hire Us!
The Start Bootstrap team is here to help you with your next Bootstrap based project. Whether you need a custom theme or are extending an existing Bootstrap template, we can help get the job done! Read more about how to hire us on our custom design services page.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox col-md-12">
                        <label>
                            <input name="agree" type="checkbox" value="agree" required="required">I have read and agree with license agreement
                        </label>
                    </div>
                </div>
                
                <!-- Change this to a button or input when using this as a form -->
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-md btn-primary btn-block">I Agree</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
