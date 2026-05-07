<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - Facilities</title>
    <style>
        .pop:hover{
            border-top-color:rgb(19, 246, 60) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>
<body>
         <!-- header part -->
 
<?php require('inc/header.php'); ?>
        

<div class="mt-5 px-4">
    

    <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        
    </p>
</div>

<div class="container mt-5">
    <div class="row">
      <?php
        $res = selectAll('facilites');
        $path = FACILITIES_IMG_PATH;

        while($row = mysqli_fetch_assoc($res)){
            echo<<<data
                
               <div class="col-lg-4 mb-5 px-4">
                 <div class="bg-white rounded shadow border-top border-4 p-4 border-dark pop">
                  <div class="d-flex align-items-center mb-2">
                  <img src="$path$row[icon]" width="40px">
                  <h5 class="m-0 ms-3">$row[name]</h5>
                  </div>
                <p>$row[description]</p>
                </div>
              </div>
            data;
        }
       
      ?>

    </div>
</div>

<?php require('inc/footer.php'); ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<script>
var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      
    });
</script>

</html>