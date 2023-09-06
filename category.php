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

    

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="styles/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="styles/font-awesome.css" rel="stylesheet">

    
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Monday, January 1, 2045</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="#">Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
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
            <div class="col-lg-8 text-center text-lg-right">
                <a href="https://htmlcodex.com"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a>
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
                    <a href="index.php" class="nav-item nav-link">Home</a>
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
                    
                    <a href="single.php" class="nav-item nav-link">Single News</a>
                </div>
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control border-0" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Category: <?php if(isset($_GET['category_id'])){
                                      $getCategory = "SELECT news.news_title, news.text, categories.categories_title, news.image, categories.category_id
                                      FROM news LEFT JOIN categories ON news.category_id = categories.category_id WHERE categories.category_id = {$_GET['category_id']}
                                      LIMIT 1";
                                      $categoryQuery = mysqli_query($conn, $getCategory);
                                      if(mysqli_num_rows($categoryQuery)){
                                          while($row = mysqli_fetch_assoc($categoryQuery)){
                                              echo $row["categories_title"];
                                          }
                                      }else{
                                        echo "no category found";
                                      }
                                }
                                ?></h4>
                                <div class="form-row align-items-center">
                                <nav aria-label="..." style="margin-top: 12px;">
                                   <u class="pagination">
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
                                                }else{
                                                    echo "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>$i</a></li>";
                                                }
                                        }
                                        if($no_of_pages > $page){
                                            echo "<li class='page-item'><a class='page-link' href='index.php?page=".($page + 1)."'>Next</a></li>";
                                         }
                                        }  
                                      ?>
                                    </u l>
                                    
                                </nav>
                                </div>
                            </div>
                        </div>
                        <?php
                            $category_id = $_GET['category_id'];
                            $limit = 2;
                            $offset = 0;
                            $sql = "SELECT news.id, categories.category_id, news.news_title, news.text, categories.categories_title, news.image
                            FROM news LEFT JOIN categories ON news.category_id = categories.category_id
                            WHERE categories.category_id = $category_id
                            ORDER BY news.id LIMIT $offset, $limit";
                            $query = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($query)){
                                while($row = mysqli_fetch_assoc($query)){
                                    explode(" ", $row['text']);
                        $limitedArray = array_slice(explode(" ", $row['text']), 0, 28);
                        implode(" ",$limitedArray);
                        $string_length = strlen(implode(" ",$limitedArray));
                        $string_length;
                                    echo '<div class="col-lg-6">
                                   <div class="position-relative mb-3">
                                <img class="w-100" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="429" height="267">
                         <div class="bg-white border border-top-0 p-4">
                             <div class="mb-2">
                                 <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                     href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                 <a class="text-body" href=""><small>1</small></a>
                             </div>
                             <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="news.php?id='.$row['id'].'">'.$row["news_title"].'</a>
                             <p class="m-0">'.substr($row['text'], 0, $string_length).'...</p>
                         </div>
                         <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                             <div class="d-flex align-items-center">
                                 <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                 <small>John Doe</small>
                             </div>
                             <div class="d-flex align-items-center">
                                 <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                 <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                             </div>
                         </div>
                     </div>
                        </div>';
                                }
                            }else{
                                echo "There is no news for this category";
                            }
                           
                          
                          
                          
                        ?>
                        <?php
                            $category_id = $_GET['category_id'];
                            $limit = 2;
                            $offset = 2;
                            $sql1 = "SELECT news.id, categories.category_id, news.news_title, news.text, categories.categories_title, news.image
                            FROM news LEFT JOIN categories ON news.category_id = categories.category_id WHERE categories.category_id = $category_id  
                            ORDER BY news.id LIMIT $offset, $limit";
                            $query1 = mysqli_query($conn, $sql1);
                            if(mysqli_num_rows($query1)){
                                while($row = mysqli_fetch_assoc($query1)){
                                    echo '<div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <img class="w-100" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="304" height="189">
                                        <div class="bg-white border border-top-0 p-4">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                    href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                                <a class="text-body" href=""><small>2</small></a>
                                            </div>
                                            <a class="h4 d-block mb-0 text-secondary text-uppercase font-weight-bold" href="news.php?id='.$row['id'].'">'.$row["news_title"].'</a>
                                        </div>
                                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                                <small>John Doe</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                                <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                }
                            }
                          
                        
                        ?>
                        <?php
                        
                        
                            $category_id = $_GET['category_id'];
                            $limit = 4;
                            $offset = 4;
                            $sql2 = "SELECT news.id, categories.category_id, news.news_title, news.text, categories.categories_title, news.image
                            FROM news LEFT JOIN categories ON news.category_id = categories.category_id WHERE categories.category_id = $category_id  
                            ORDER BY news.id LIMIT $offset, $limit";
                            $query2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($query2)) {
                                while ($row = mysqli_fetch_assoc($query2)) {
                                    echo '<div class="col-lg-6">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="110" height="110">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="news.php?id='.$row['id'].'">'.$row["news_title"].'</a>
                                </div>
                            </div>
                        </div>';
                                }
                            }
                            
                        
                          
                        ?>
                        <?php
                            $category_id = $_GET['category_id'];
                            $limit = 1;
                            $offset = 8;
                            $sql3 = "SELECT news.id, categories.category_id, news.news_title, news.text, categories.categories_title, news.image
                            FROM news LEFT JOIN categories ON news.category_id = categories.category_id WHERE categories.category_id = $category_id  
                            ORDER BY news.id LIMIT $offset, $limit";
                            $query3 = mysqli_query($conn, $sql3);
                            if (mysqli_num_rows($query3)){
                               while ($row = mysqli_fetch_assoc($query3)){
                                explode(" ", $row['text']);
                                $limitedArray = array_slice(explode(" ", $row['text']), 0, 28);
                                implode(" ",$limitedArray);
                                $string_length = strlen(implode(" ",$limitedArray));
                                $string_length;
                                   echo '<div class="col-lg-12">
                                   <div class="row news-lg mx-0 mb-3">
                                       <div class="col-md-6 h-100 px-0">
                                           <img class="h-100" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="700" height="435">
                                       </div>
                                       <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                           <div class="mt-auto p-4">
                                               <div class="mb-2">
                                                   <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                       href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                                   <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                               </div>
                                               <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="news.php?id='.$row['id'].'">'.$row["news_title"].'</a>
                                               <p class="m-0">'.substr($row['text'], 0, $string_length).'...</p>
                                           </div>
                                           <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                               <div class="d-flex align-items-center">
                                                   <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="Profile Image Here">
                                                   <small>John Doe</small>
                                               </div>
                                               <div class="d-flex align-items-center">
                                                   <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                                   <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>';
                               }
                            }
                         
                         
                         
                        ?>
                        <?php
                            $category_id = $_GET['category_id'];
                            $limit = 1;
                            $offset = 8; 
                            $sql4 = "SELECT news.id, categories.category_id, news.news_title, news.text, categories.categories_title, news.image
                            FROM news LEFT JOIN categories ON news.category_id = categories.category_id WHERE categories.category_id = $category_id  
                            ORDER BY news.id LIMIT $offset, $limit";
                            $query4 = mysqli_query($conn, $sql4);
                            if (mysqli_num_rows($query4)){
                                while ($row = mysqli_fetch_assoc($query4)){
                                    echo '<div class="col-lg-6">
                                    <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                        <img class="img-fluid" src="include/Dashboard Panel/Backend Images/'.$row["image"].'" width="110" height="110">
                                        <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                                <a class="text-body" href=""><small>Jan 01, 2045</small></a>
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
                
                    <!-- Tags End -->
                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
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

                    
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
                        
                               
        
    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                <?php
                              $limit = 3;
                              $sql= "SELECT news.id, categories.category_id, news.news_title, news.text, categories.categories_title, news.image
                                                  FROM news LEFT JOIN categories ON news.category_id = categories.category_id ORDER BY 
                                               news.id DESC LIMIT $limit";
                              $query = mysqli_query($conn, $sql); 
                              while($row = mysqli_fetch_assoc($query)){
                                echo '<div class="mb-3">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id='.$row['category_id'].'">'.$row["categories_title"].'</a>
                                </div>
                                <a class="small text-body text-uppercase font-weight-medium" href="news.php?id='.$row['id'].'">'.$row["news_title"].'</a>
                            </div>';
                              }
                              
                            ?>
                
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                <div class="m-n1">
                    <a href="" class="btn btn-sm btn-secondary m-1">Politics</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Corporate</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Health</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Education</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Science</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Foods</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Entertainment</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Travel</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Lifestyle</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Politics</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Corporate</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Health</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Education</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Science</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Business</a>
                    <a href="" class="btn btn-sm btn-secondary m-1">Foods</a>
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
        Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>