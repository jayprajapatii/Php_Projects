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
    <title><?php echo $settings_r['site_title'] ?> - About</title>
    <style>
        .absimg img{
             width: 280px;
              height: 280px;
              border: 5px solid black;
               border-radius: 8px;
            }

           .absimg img:hover{
            transform: scale(1.03);
            transition: all 0.3s;
            border-color:rgb(19,246,60);
           }
        .box{
            border-top-color:rgb(19, 246, 60) !important;
             
        }
    
    </style>
    
</head>
<body class="bg-light">
         <!-- header part -->

<?php require('inc/header.php'); ?>
        


<div class="mt-5 px-4">
  
    <h2 class="fw-bold h-font text-center">About us</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
    
    </p>
</div>

<div class="container mt-5">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6 mb-4">
            <h3 class="mb-3">Jk Website</h3>
            <p>🕰 Our History
Established in 1998, The Grand Horizon Hotel began as a modest 20-room guesthouse nestled in the heart of Paran. Founded by the visionary entrepreneur Jay Prajapati, Khushi Patel, and Krish Patel, the hotel was built on the principles of warm hospitality, personalized service, and a passion for excellence.

Over the years, The Grand Horizon evolved into one of the city's most trusted names in hospitality. Through continuous upgrades, innovation, and an unwavering commitment to guest satisfaction, the hotel expanded to over 120 luxurious rooms, multiple fine-dining restaurants, and world-class event facilities.

From hosting royalty and dignitaries to welcoming families and business travelers from around the world, our journey has been one of pride, dedication, and heartfelt service. Today, The Grand Horizon stands as a blend of tradition and modern comfort — offering guests a timeless stay experience they’ll always remember.

'</p>
        </div>
        <div class="col-lg-5 mb-4 absimg" >
            <img src="img/about/p8.jpg">
        </div>
    </div>
</div>







<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="img/about/hotel.svg" width="70px">
                <h4 class="mt-3">100+ Rooms</h4>
            </div>
        </div>
        <div class="col-lg-3 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="img/about/customers.svg" width="70px">
                <h4 class="mt-3">200+ Customers</h4>
            </div>
        </div>
        <div class="col-lg-3 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="img/about/rating.svg" width="70px">
                <h4 class="mt-3">150+ Reviews</h4>
            </div>
        </div>
        <div class="col-lg-3 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="img/about/staff.svg" width="70px">
                <h4 class="mt-3">200+ Staffs</h4>
            </div>
        </div>
    </div>
</div>

<h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

<div class="container px-4">
<div class="swiper mySwiper">
    <div class="swiper-wrapper mb-5">
     <?php 
       $about_r = selectAll('team_details'); 
       $path=ABOUT_IMG_PATH;

       while($row = mysqli_fetch_assoc($about_r)){
           echo<<<data
                 <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                    <img src="$path$row[picture]" class="w-100">
                      <h5 class="mt-2">$row[name]</h5>
                </div>
           data;
       }
     ?>

    </div>
    <div class="swiper-pagination"></div>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 40,
    pagination: {
      el: ".swiper-pagination",
    },
  });
</script>

</html>