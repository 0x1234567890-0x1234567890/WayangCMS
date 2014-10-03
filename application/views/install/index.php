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
                                <center>Mohon dibaca dan dipahami dengan sebaik-baiknya</center>
                                </p>
                                </br>
                                <p class="chat" style="text-align: justify">
                                    Wayang CMS adalah salah satu CMS yang bersifat opensource yang diperuntukkan untuk penggunakan khalayak umum. Lisensi yang digunakan oleh Wayang CMS adalah <a href="http://opensource.org/licenses/MIT">MIT License.</a> Segala bentuk legalitas dan aturan mengenai penggunakan resource Wayang CMS sesuai dengan <a href="http://opensource.org/licenses/MIT">MIT License.</a> Untuk lebih jelas silahkan dibaca <a href="http://opensource.org/licenses/MIT">MIT License </a>berikut:  
                                </p>
                                </br>
                                <p class="chat" style="text-align: justify">
                                    The MIT License (MIT)

Copyright (c) <year> <copyright holders>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
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
