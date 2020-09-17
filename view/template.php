<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Rose Naudin" />
        <title><?= $title ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="public/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="public/css/styles.css" rel="stylesheet" />
         
    </head>
        
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php#page-top">Home</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#projects">Projects</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?action=getPosts">Blog</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="public/CV_NaudinR-en.pdf">CV</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?= $content ?>

        <section class="contact-section bg-black">
            <div class="container">
                <h2 class="text-center text-white-50">Around the web</h2>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="https://www.linkedin.com/in/naudin-rose/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="mx-2" href="#!"><i class="fas fa-at"></i></a>
                    <a class="mx-2" href="https://github.com/08rose08/"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50">
            <div class="container">Copyright © ThePinkMuffin 2020</div>
        </footer>

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="public/mail/jqBootstrapValidation.js"></script>
        <script src="public/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="public/js/scripts.js"></script>
    </body>
</html>