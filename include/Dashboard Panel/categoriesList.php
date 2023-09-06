<?php
ob_start();
include("sidebar.php");
include("header.php");


$table_heading = "";
$table_data = "";
$heading_button = "";
$fetch_database = "SELECT * FROM categories";
$results = mysqli_query($conn, $fetch_database);
if (mysqli_num_rows($results)>0){
    $table_heading.="<thead class='thead-light'>
                         <tr>
                           <th scope='row'>S.No.</th>
                           <th>Title</th>
                           <th>Description</th>
                           <th>Cover</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                        </thead>";
    $heading_button.="<h1 class='mb-0'>All Records</h1>
                      <a href='addCategory.php' class='register-color btn btn-primary'>
                      <i class='fas fa-plus'></i>Click Here to Add
                      </a>";
    while($row = mysqli_fetch_assoc($results)){
        
         $table_data.="<tr>
             <td scope='row'>$row[category_id]</td>
             <td>$row[categories_title]</td>
             <td>$row[description]</td>
             <td>$row[cover]</td>
             <td>$row[status]</td>
             <td><a href='update-category.php?id=$row[category_id]' class='button-color btn btn-primary'><i class='fas fa-edit'></i></a>
             <a href='delete-category.php?id=$row[category_id]' class='button-color btn btn-primary'><i class='fas fa-trash'></i></a></td>
         </tr>";
       }
   } else {
    $no_record = "<h4 style='text-align:center;'>No Record Found</h4>";
    $new_button = "<a href='addCategory.php' class='register-color btn btn-primary'><i class='fas fa-plus'></i>Click Here to Register</a>";
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Categories</title>
    
    <link rel="stylesheet" href="css/customCSS.css" />

    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        div.page_title_left{
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>
<body class="crm_body_bg">

<div class="main_content_iner overly_inner">
            <div class="container-fluid p-0">

                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                            <div class="page_title_left">
                                <?php echo $heading_button; ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="white_card mb_30">
                            <div class="white_card_header ">
                            </div>
                            <div class="">
                                <div class="row table-shadow" style = "display:flex;justify-content:center;">
                                    <table class="table table-bordered table-striped table-hover">
                                         <?php echo $table_heading; ?>
                                        <tbody>
                                            <tr>
                                            <?php
                                            echo $table_data;
                                            if(isset($no_record)){
                                                echo $no_record;
                                                echo $new_button;
                                            }
                                            
                                            ?>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                       

    
</body>

</html>
