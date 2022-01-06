<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chintia Coffee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- <link rel="stylesheet" href="https://materializecss.com/templates/parallax-template/css/style.css"> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- <script src="float-panel.js"></script> -->
</head>

<body class="pink lighten-4">
    <nav id="home" class="pink darken-3" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo">Chintia Coffee</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#home">Home</a></li>
                <li><a href="#product">Product</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About Us</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#home">Home</a></li>
                <li><a href="#product">Product</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center pink-text text-darken-3">Chintia Coffee</h1>
                <div class="row center">
                    <h5 class="header col s12 light white-text">A modern responsive front-end framework based on Material Design</h5>
                </div>
                <div class="row center">
                    <a href="https://wa.me/6283852153846" target="_blank" id="download-button" class="btn-large waves-effect waves-light pink darken-3">Contact Us</a>
                </div>
                <br><br>

            </div>
        </div>
        <div class="parallax"><img src="https://materializecss.com/templates/parallax-template/background1.jpg" alt="Unsplashed background img 1"></div>
    </div>


    <div id="showcase" class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center pink-text"><i class="material-icons">flash_on</i></h2>
                        <h5 class="center">Speeds up development</h5>

                        <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center pink-text"><i class="material-icons">group</i></h2>
                        <h5 class="center">User Experience Focused</h5>

                        <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center pink-text"><i class="material-icons">settings</i></h2>
                        <h5 class="center">Easy to work with</h5>

                        <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light white-text">A modern responsive front-end framework based on Material Design</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="https://materializecss.com/templates/parallax-template/background1.jpg" alt="Unsplashed background img 2"></div>
    </div>

    <div id="product" class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m6">
                    <div class="icon-block">
                        <img src="<?= url('assets/img/coconut.png'); ?>" class="materialboxed" alt="" />
                        <h2 class="center pink-text"><i class="material-icons">flash_on</i></h2>
                        <h5 class="center">Speeds up development</h5>

                        <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= url('assets/img/coconut.png'); ?>">
                            <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                        </div>
                    </div>


                </div>

                <div class="col s12">
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="<?= url('assets/img/coconut.png'); ?>">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action">
                                <a href="#">This is a link</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="icon-block">
                        <h2 class="center pink-text"><i class="material-icons">group</i></h2>
                        <h5 class="center">User Experience Focused</h5>

                        <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center pink-text"><i class="material-icons">settings</i></h2>
                        <h5 class="center">Easy to work with</h5>

                        <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light white-text">A modern responsive front-end framework based on Material Design</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="https://materializecss.com/templates/parallax-template/background2.jpg" alt="Unsplashed background img 2"></div>
    </div>

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h3><i class="mdi-content-send pink-text"></i></h3>
                    <h4>Contact Us</h4>
                    <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                </div>
            </div>

        </div>
    </div>


    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light white-text">A modern responsive front-end framework based on Material Design</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="https://materializecss.com/templates/parallax-template/background3.jpg" alt="Unsplashed background img 3"></div>
    </div>

    <footer class="page-footer pink darken-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Company Bio</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Settings</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <h6>Made with <i class="material-icons red-text">favorite</i> by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a></h6>

            </div>
        </div>
    </footer>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- <script src="js/init.js"></script> -->
    <script type="text/javascript">
        (function($) {
            $(function() {

                // $('.sidenav').sidenav();
                // $('.parallax').parallax();
                M.AutoInit();

            }); // end of document ready
        })(jQuery); // end of jQuery name space
    </script>
</body>

</html>