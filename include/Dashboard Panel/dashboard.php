<?php
ob_start();
include("sidebar.php");
include("header.php");

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <style>
        div.page_title_left{
            margin: 0 auto;
        }
    </style>
</head>

<body class="crm_body_bg">

    

    

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                            <div class="page_title_left">
                                <h1 class="mb-0">Welcome to News Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-xl-12">
                        <div class="white_card  mb_30">
                            <div class="white_card_header ">
                                <div class="box_header m-0">
                                    <ul class="nav  theme_menu_dropdown">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Sports</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Entertainment</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Current Affairs</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Business</a>
                                                <a class="dropdown-item" href="#">Politics</a>
                                                <a class="dropdown-item" href="#">Crime and Investigation</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="white_card_body anlite_table p-0">
                                <div class="row" style = "display:flex;justify-content:center;">
                                    <div class="col-lg-3">
                                        <div class="single_analite_content">
                                            <h4>No. of Posts</h4>
                                            <h3><span class="counter">
                                                <?php
                                                  $fetch_database = "SELECT news.id, categories.category_id, news.news_title, news.text, news.status, categories.categories_title
                                                  FROM news LEFT JOIN categories ON news.category_id = categories.category_id ORDER BY 
                                                  news.id";
                                                  $results = mysqli_query($conn, $fetch_database);
                                                  echo mysqli_num_rows($results);
                                                ?>
                                            </span> </h3>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_analite_content">
                                            <h4>Journalists</h4>
                                            <h3><span class="counter"><?php 
                                            $fetch_database = "SELECT * FROM user";
                                            $results = mysqli_query($conn, $fetch_database);
                                            echo mysqli_num_rows($results);
                                             ?>
                                        
                                        </span> </h3>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                       

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
<i class="ti-angle-up"></i>
</a>
    </div>

    <script src="js/jquery1-3.4.1.min.js"></script>

    <script src="js/popper1.min.js"></script>

    <script src="js/bootstrap1.min.js"></script>

    <script src="js/metisMenu.js"></script>

    <script src="vendors/count_up/jquery.waypoints.min.js"></script>

    <script src="vendors/chartlist/Chart.min.js"></script>

    <script src="vendors/count_up/jquery.counterup.min.js"></script>

    <script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>

    <script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

    <script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="vendors/datatable/js/jszip.min.js"></script>
    <script src="vendors/datatable/js/pdfmake.min.js"></script>
    <script src="vendors/datatable/js/vfs_fonts.js"></script>
    <script src="vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="vendors/datatable/js/buttons.print.min.js"></script>

    <script src="vendors/datepicker/datepicker.js"></script>
    <script src="vendors/datepicker/datepicker.en.js"></script>
    <script src="vendors/datepicker/datepicker.custom.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="vendors/chartjs/roundedBar.min.js"></script>

    <script src="vendors/progressbar/jquery.barfiller.js"></script>

    <script src="vendors/tagsinput/tagsinput.js"></script>

    <script src="vendors/text_editor/summernote-bs4.js"></script>
    <script src="vendors/am_chart/amcharts.js"></script>

    <script src="vendors/scroll/perfect-scrollbar.min.js"></script>
    <script src="vendors/scroll/scrollable-custom.js"></script>

    <script src="vendors/vectormap-home/vectormap-2.0.2.min.js"></script>
    <script src="vendors/vectormap-home/vectormap-world-mill-en.js"></script>

    <script src="vendors/apex_chart/apex-chart2.js"></script>
    <script src="vendors/apex_chart/apex_dashboard.js"></script>

    <script src="vendors/chart_am/core.js"></script>
    <script src="vendors/chart_am/charts.js"></script>
    <script src="vendors/chart_am/animated.js"></script>
    <script src="vendors/chart_am/kelly.js"></script>
    <script src="vendors/chart_am/chart-custom.js"></script>

    <script src="js/dashboard_init.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>