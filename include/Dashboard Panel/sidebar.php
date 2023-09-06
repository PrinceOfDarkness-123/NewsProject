<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap1.min.css" />
    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />
    <link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />
    <link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />
    <link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />
    <link rel="stylesheet" href="vendors/datepicker/date-picker.css" />
    <link rel="stylesheet" href="vendors/vectormap-home/vectormap-2.0.2.css" />
    <link rel="stylesheet" href="vendors/scroll/scrollable.css" />
    <link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />
    <link rel="stylesheet" href="vendors/morris/morris.css">
    <link rel="stylesheet" href="vendors/material_icon/material-icons.css" />
    <link rel="stylesheet" href="css/metisMenu.css">
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="crm_body_bg">
<nav class="sidebar dark_sidebar">
        <div class="logo d-flex justify-content-between">
            <a class="large_logo" href="index.html"><img src="img/logo_white.png" alt></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class>
                <a href="dashboard.php" aria-expanded="false">
                <div class="nav_icon_small">
                        <img src="img/menu-icon/1.svg" alt>
                    </div>
                    <div class="nav_title">
                        <span>Dashboard</span>
                    </div>
                </a>
                    
            </li>
            <li class>
                <a href="posts.php" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="img/menu-icon/2.svg" alt>
                    </div>
                    <div class="nav_title">
                        <span>News Posts</span>
                    </div>
                </a>
            </li>
            <li class>
            <a href="categoriesList.php" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="img/menu-icon/3.svg" alt>
                    </div>
                    <div class="nav_title">
                        <span>Categories</span>
                    </div>
                </a>
            </li>
            <li class>
            <a href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="img/menu-icon/4.svg" alt>
                    </div>
                    <div class="nav_title">
                        <span>Records</span>
                        <i style="position:relative;left:100px" class="fa fa-arrow-right"></i>

                    </div>
            </a>
                <ul>
                    <li><a href="users.php">User</a></li>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="addUser.php">Add User</a></li>
                </ul>
            </li>
            <li class>
                <a href="crypto_wallet.html" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="img/menu-icon/7.svg" alt>
                    </div>
                    <div class="nav_title">
                        <span>Settings</span>
                    </div>
                </a>
            </li>
            <li class>
                <a href="crypto_wallet.html" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="img/menu-icon/8.svg" alt>
                    </div>
                    <div class="nav_title">
                        <span>FAQ</span>
                    </div>
                </a>
            </li>
            <li class>
                <a href="crypto_wallet.html" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="img/menu-icon/Pages.svg" alt>
                    </div>
                    <div class="nav_title">
                        <span>About</span>
                    </div>
                </a>
            </li>
            <li class>
                <a href="../Sign In and Sign Out/logout.php" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="img/menu-icon/General.svg" alt>
                    </div>
                    <div class="nav_title">
                        <span>Logout</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
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