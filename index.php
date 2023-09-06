<?php
require("include/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BizNews - Free News Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon --> 
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="styles/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#"><?php echo date(' day-month-year') ?></a>
                        </li>
                        <li class="nav-item">
                            
                            <a class="nav-link text-body small" href="#">Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                <div class="container-fluid" style="margin-left: 350px;margin-top: 34px;">
                        <h1 style="color: #5886ff;" class="text-uppercase">Welcome to our World</h1>
                        <p style="color: #5886ff; position: relative; right: 60px;">Where we are always on the look out for what's next by making history</p>
                    </div>
                </a>
            </div>
            
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>

                    <a href="news.php" class="nav-item nav-link">Single News</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <?php
                              $categoriesList = "SELECT * FROM categories";
                              $categoriesResult = mysqli_query($conn, $categoriesList);
                              if(mysqli_num_rows($categoriesResult)>0){
                                while($row = mysqli_fetch_assoc($categoriesResult)){
                                    echo "<a href='category.php?category_id={$row["category_id"]}' class='dropdown-item'>".$row["categories_title"]."</a>";
                                }
                              }
                              
                              
                            ?>
                        </div>
                    </div>
                </div>
                <form action="" method="get">
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" name="search_term"  class="form-control border-0" placeholder="Search Something">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
                </form>
                
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Main News Slider Start -->
    <div class="container-fluid bg-primary">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    <?php
                  $main_news= "SELECT news.news_title, news.text, categories.categories_title, news.image
                  FROM news LEFT JOIN categories ON news.category_id = categories.category_id
                  WHERE news.id IN (16, 19, 20)
                  ORDER BY categories.category_id";

                  $main_query = mysqli_query($conn, $main_news);

                  if(mysqli_num_rows($main_query)){
                      while($row = mysqli_fetch_assoc($main_query)){
                        echo '<div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="h-100" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="640" height="500">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">'.$row["categories_title"].'</a>
                                <a class="text-white" href="">1</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...sdhajhdasjhdahsdajshd</a>
                        </div>
                    </div>';
                      }
                  }
                ?>
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    
                        <?php
                        $main_news= "SELECT news.news_title, news.text, categories.categories_title, news.image
                                     FROM news LEFT JOIN categories ON news.category_id = categories.category_id
                                     WHERE news.id IN (23, 24, 21, 22)
                                     ORDER BY news.id";

                        $main_query = mysqli_query($conn, $main_news);
                        if(mysqli_num_rows($main_query) > 0){
                            while($row = mysqli_fetch_assoc($main_query)){
                        echo '<div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="700" height="435">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">'.$row["categories_title"].'</a>
                                
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">'.$row["news_title"].'</a>
                        </div>
                        </div>
                              </div>
                        ';
                            }
                        }
                        
                        ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            <?php 
                            $breaking_news= "SELECT news.news_title, news.text, categories.categories_title, news.image
                            FROM news LEFT JOIN categories ON news.category_id = categories.category_id
                            ORDER BY news.id DESC";
                            $breaking_query = mysqli_query($conn, $breaking_news);
                            if(mysqli_num_rows($breaking_query) > 0){
                                while($row = mysqli_fetch_assoc($breaking_query)){
                                echo '<div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="">'.$row["news_title"].'</a></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
            </div>
            
            
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                <?php
                  $main_news= "SELECT news.news_title, news.text, categories.categories_title, news.image
                  FROM news LEFT JOIN categories ON news.category_id = categories.category_id
                  ORDER BY news.id DESC";
                  $main_query = mysqli_query($conn, $main_news);
                  if(mysqli_num_rows($main_query) > 0){
                    while($row = mysqli_fetch_assoc($main_query)){
                        echo '<div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid h-100" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="700" height="435">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">'.$row["categories_title"].'</a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">'.$row["news_title"].'</a>
                        </div>
                    </div>';
                    }
                  }else{
                    echo "No Record Found";
                  }
                  
                ?>
                
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                                    <span>
                                <nav aria-label="..." style="margin-top: 12px;">
                                   <ul class="pagination">
                                      
                                      <?php
                                        
                                        $limit = 13;
                                        $sql= "SELECT * FROM news";
                                             
                                        $query = mysqli_query($conn, $sql);
                                        $total_records = mysqli_num_rows($query);
                                        $page = 0;
                                        $no_of_pages = ceil($total_records / $limit);
                                        
                                        if($total_records > 0){
                                            if(isset($_GET['page'])){
                                                $page = $_GET['page'];
                                             }
                                             if($page > 1){
                                                echo "<li class='page-item'><a class='page-link' href='index.php?page=".($page - 1)."'>Previous</a></li>";
                                             }
                                             for($i = 1; $i <= $no_of_pages; $i++){  
                                                if($i == $page){
                                                    echo "<li class='page-item active'>
                                                    <span class='page-link'>
                                                       $i
                                                    <span class='sr-only'>(current)</span>
                                                    </span>
                                                 </li>";
                                                 $GLOBALS['href'] = "index.php?page=".$i."";
                                                }else{
                                                    echo "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>$i</a></li>";
                                                }
                                        }
                                        if($no_of_pages > $page){
                                            echo "<li class='page-item'><a class='page-link' href='index.php?page=".($page + 1)."'>Next</a></li>";
                                         }
                                      ?>
                                    </ul>
                                    
                                </nav>
                                </span>                        
                            </div>
                        </div>
                        
                        
                        <?php
                           if(isset($_REQUEST['search_term'])){
                                $search_term = $_REQUEST['search_term'];
                                $search_query= "SELECT news.news_title, news.text, categories.categories_title, news.image
                                       FROM news LEFT JOIN categories ON news.category_id = categories.category_id
                                       WHERE news.news_title LIKE '%{$search_term}%'";
                                $query = mysqli_query($conn,$search_query);
                                if(mysqli_num_rows($query)){
                                   while ($row = mysqli_fetch_assoc($query)) {
                                    explode(" ", $row['text']);
                         $limitedArray = array_slice(explode(" ", $row['text']), 0, 28);
                         implode(" ",$limitedArray);
                         $string_length = strlen(implode(" ",$limitedArray));
                         $string_length;
                             echo '<div class="col-lg-12">
                             <div class="row news-lg mx-0 mb-3">
                                 <div class="col-md-6 h-100 px-0">
                                     <img class="img-fluid h-100" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="700" height="435">
                                 </div>
                                 <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                     <div class="mt-auto p-4">
                                         <div class="mb-2">
                                             <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                 href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                         </div>
                                         <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="news.php?id='.$row['id'].'">'.$row["news_title"].'</a>
                                         <p class="m-0">'.substr($row['text'], 0, $string_length).'...</p>
                                     </div>
                                     <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                         <div class="d-flex align-items-center">
                                             <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                             <small>John Doe</small>
                                         </div>
                                         <div class="d-flex align-items-center">
                                             <a class="text-secondary" href=""><small class="ml-3"><i class="fas fa-angle-double-right mr-2"></i>Read More</small></a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>';
                                   }
                                } else {
                                    echo "<a class='h4 d-block mb-3 text-secondary text-uppercase font-weight-bold' href=''>No Result Found</a>";
                                }
                           }else{
                            
                            $limit = 4;
                            $offset = ($page - 1) * $limit;
                            if($page == 2){
                             $offset = 13;
                            }
                            $sql= "SELECT news.news_title, news.id, news.text, categories.categories_title, news.image, categories.category_id
                                                FROM news LEFT JOIN categories ON news.category_id = categories.category_id ORDER BY 
                                             news.id LIMIT $offset, $limit";
                             $query = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($query)){
                             explode(" ", $row['text']);
                         $limitedArray = array_slice(explode(" ", $row['text']), 0, 28);
                         implode(" ",$limitedArray);
                         $string_length = strlen(implode(" ",$limitedArray));
                         $string_length;
                             echo '<div class="col-lg-6">
                             <div class="position-relative mb-3">
                                 <img class="w-100" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="304" height="184">
                                 <div class="bg-white border border-top-0 p-4">
                                     <div class="mb-2">
                                         <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                             href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                         <a class="text-body" href=""><small>1</small></a>o
                                     </div>
                                     <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="news.php?id='.$row['id'].'">'.$row["news_title"].'</a>
                                     <p class="m-0">'.substr($row['text'], 0, $string_length).'...</p>
                                 </div>
                                 <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                     <div class="d-flex align-items-center">
                                         <img class="rounded-circle mr-2" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="25" height="25" alt="">
                                         <small>John Doe</small>
                                     </div>
                                     
                                 </div>
                             </div>
                         </div>';
                          }
                        
                         
                         
                         
                         
                            
                               $limit = 4;
                               $offset = ($page - 1) * $limit;
                               $offset = $offset + 4;
                               
                               $sql= "SELECT news.id, categories.category_id, news.news_title, news.text, categories.categories_title, news.image
                                                   FROM news LEFT JOIN categories ON news.category_id = categories.category_id ORDER BY 
                                                news.id LIMIT $offset, $limit";
                                 $limit_query = mysqli_query($conn, $sql);
                               while($row = mysqli_fetch_assoc($limit_query)){
                                 echo '<div class="col-lg-6">
                                 <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                 <img class="img-fluid" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="110" height="110">
                                 <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                     <div class="mb-2">
                                         <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                         <a class="text-body" href=""><small>5</small></a>
                                     </div>
                                     <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="news.php?id='.$row['id'].'">'.$row["news_title"].'</a>
                                 </div>
                             </div>
                             </div>';
                               }
                            
                         
                         
                         $limit = 1;
                         $offset = ($page - 1) * $limit;
                         $offset = $offset + 8;
                         $sql= "SELECT news.id, categories.category_id, news.news_title, news.text, categories.categories_title, news.image
                                             FROM news LEFT JOIN categories ON news.category_id = categories.category_id ORDER BY 
                                          news.id LIMIT $offset, $limit";
                         $next_query = mysqli_query($conn, $sql);
                         while($row = mysqli_fetch_assoc($next_query)){
                         explode(" ", $row['text']);
                         $limitedArray = array_slice(explode(" ", $row['text']), 0, 28);
                         implode(" ",$limitedArray);
                         $string_length = strlen(implode(" ",$limitedArray));
                         $string_length;
                             echo '<div class="col-lg-12">
                             <div class="row news-lg mx-0 mb-3">
                                 <div class="col-md-6 h-100 px-0">
                                     <img class="img-fluid h-100" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="700" height="435">
                                 </div>
                                 <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                     <div class="mt-auto p-4">
                                         <div class="mb-2">
                                             <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                 href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                         </div>
                                         <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="news.php?id='.$row['id'].'">'.$row["news_title"].'</a>
                                         <p class="m-0">'.substr($row['text'], 0, $string_length).'...</p>
                                     </div>
                                     <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                         <div class="d-flex align-items-center">
                                             <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                             <small>John Doe</small>
                                         </div>
                                         <div class="d-flex align-items-center">
                                             <a class="text-secondary" href=""><small class="ml-3"><i class="fas fa-angle-double-right mr-2"></i>Read More</small></a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>';
                         }
                         
                        
                         
                            $limit = 4;
                            $offset = ($page - 1) * $limit;
                            $offset = $offset + 9;
 
                            $sql= "SELECT news.id, categories.category_id, news.news_title, news.text, categories.categories_title, news.image
                                                FROM news LEFT JOIN categories ON news.category_id = categories.category_id ORDER BY 
                                             news.id LIMIT $offset, $limit";
                                             
                              $query = mysqli_query($conn, $sql);         
                              while($row = mysqli_fetch_assoc($query)){
                                 echo '<div class="col-lg-6">
                                 <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                     <img class="img-fluid" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="110" height="110">
                                     <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                         <div class="mb-2">
                                             <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                             <a class="text-body" href=""><small>10</small></a>
                                         </div>
                                         <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="news.php?id='.$row['id'].'">'.$row["news_title"].'</a>
                                     </div>
                                 </div>
                                       
                                  
                                   
                                    
                             </div>';
                              }
                            
                         
                           }
                           
                           
                           ?>

                          
                        
                        
                    </div>
                </div>
               
                <div class="col-lg-4">
                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <?php
                              $limit = 5;
                              $sql= "SELECT news.id, categories.category_id, news.news_title, news.text, categories.categories_title, news.image
                                                  FROM news LEFT JOIN categories ON news.category_id = categories.category_id ORDER BY 
                                               news.id DESC LIMIT $limit";
                              $query = mysqli_query($conn, $sql); 
                              while($row = mysqli_fetch_assoc($query)){
                                echo '<div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="110" height="110">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                        
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="news.php?id='.$row['id'].'">'.substr($row["news_title"], 0, 40).'.....</a>
                                </div>
                            </div>';
                              }
                              
                            ?>
                            
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                            <div class="input-group mb-2" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                </div>
                            </div>
                            <small>Lorem ipsum dolor sit amet elit</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                            <?php
                            $categoriesList = "SELECT * FROM categories";
                              $categoriesResult = mysqli_query($conn, $categoriesList);
                              if(mysqli_num_rows($categoriesResult)>0){
                                while($row = mysqli_fetch_assoc($categoriesResult)){
                                    echo "<a href='' class='btn btn-sm btn-outline-secondary m-1'>$row[categories_title]</a>";
                                }
                              }
                            ?>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <?php
    }else{
        echo "404 Not Found";
    }  
    ?>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                </div>
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                </div>
                <div class="">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                <div class="m-n1">
                    
                    <?php
                            $categoriesList = "SELECT * FROM categories";
                              $categoriesResult = mysqli_query($conn, $categoriesList);
                              if(mysqli_num_rows($categoriesResult)>0){
                                while($row = mysqli_fetch_assoc($categoriesResult)){
                                    echo "<a href='category.php?category_id={$row["category_id"]}' class='btn btn-sm btn-outline-secondary m-1'>$row[categories_title]</a>";
                                }
                                
                              }
                            ?>
                            </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
                <div class="row">
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved. 
		
		<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
		Design by <a href="https://htmlcodex.com">HTML Codex</a><br>
        Distributed by <a href="https://themewagon.com">ThemeWagon</a>
    </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->s
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>