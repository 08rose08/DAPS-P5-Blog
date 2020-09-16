<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<!-- Masthead-->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        
        <div class="mx-auto text-center">
            <h1 class="mx-auto my-0 text-uppercase">Rose Naudin</h1>
            <h2 class="text-white-50 mx-auto mt-2 mb-5">Web developer - Stockholm</h2>
            
            <!--<a class="btn btn-primary js-scroll-trigger" href="public/CV_NaudinR-en.pdf"><i class="fas fa-download"></i> CV</a>
        -->
        </div>
    </div>
</header>

<!-- About Section-->
<section class="about-section text-center" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!--<img class="masthead-avatar mb-5" src="public/img/profil.png" alt="Photo de profil de Rose Naudin" style="border-radius: 50%;" />
-->
                <h2 class="text-white mb-4">About</h2>
                <p class="text-white-50">
                    Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
                    <a href="https://startbootstrap.com/template-overviews/grayscale/">the preview page</a>
                    . The theme is open source, and you can use it for any purpose, personal or commercial.
                </p>
            </div>
        </div>
        <!--<img class="img-fluid" src="public/img/ipad.png" alt="" />-->
    </div>
</section>

<!-- Projects-->
<section class="projects-section bg-light" id="projects">
    <div class="container">
        <!-- Featured Project Row-->
        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="public/img/bg-masthead.jpg" alt="" /></div>
            <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left">
                    <h4>Github</h4>
                    <p class="text-black-50 mb-0">Grayscale is open source and MIT licensed. This means you can use it for any project - even commercial projects! Download it, customize it, and publish your website!</p>
                </div>
            </div>
        </div>
        <!-- Project One Row-->
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
            <div class="col-lg-6"><img class="img-fluid" src="public/img/demo-image-01.jpg" alt="" /></div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Les Films de Plein Air</h4>
                            <p class="mb-0 text-white-50">
                            Choose a suitable technical solution among the existing solutions if it is relevant,
                            list the features requested by a customer,
                            analyze a specification and
                            write detailed project specifications.
                            <hr class="d-none d-lg-block mb-0 ml-0" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project Two Row-->
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-6"><img class="img-fluid" src="public/img/demo-image-02.jpg" alt="" /></div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4 class="text-white">Chalets et caviar</h4>
                            <p class="mb-0 text-white-50">
                                Adapt a Wordpress theme to meet customer requirements,
                                write documentation for non-specialist users,
                                and select a customized Wordpress theme.
                            </p>
                            <hr class="d-none d-lg-block mb-0 mr-0" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Contact Section-->
<section class="signup-section bg-light" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <div class="text-center">
            <h2 class="text-white text-center mb-0 mt-0">Contact Me</h2>
        </div>
        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Name</label>
                            <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Email Address</label>
                            <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br />
                    <div id="success"></div>
                    <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Send</button></div>
                </form>
            </div>
        </div>
    </div>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>