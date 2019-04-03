<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        <title>Add Item</title>

        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li class="active">
                                <a href="/">
                                    <i class="fas fa-book"></i>Listar Livros <?php
                                    #echo $lines;
                                    ?></a>
                            </li>
                            <li class="">
                                <a href="/check_basket_repeat">
                                    <i class="fas fa-book"></i>Basket agregados e quantidade</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">

                </header>
                <!-- END HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong><font style="vertical-align: inherit;"></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Verificar no
                                            </font><strong><font style="vertical-align: inherit;">Basket</font></strong></font></div>
                                        <div class="card-body card-block">

                                            <form action="/check_choose_file" class="form-horizontal" enctype="multipart/form-data">

                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Arquivo: </font></font></label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="file"  name="file" placeholder="File" class="form-control" required>
                                                        <small class="help-block form-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Por favor escolha o Ficheiro</font></font></small>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label  class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Autor: </font></font></label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="Text"  name="author" placeholder="Autor" class="form-control" required>
                                                        <small class="help-block form-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Por favor introduza o Autor</font></font></small>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-dot-circle-o"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Enviar
                                                        </font></font></button>
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-ban"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Restabelecer
                                                        </font></font></button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright Â© 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

    </body>

</html>
<!-- end document--> 