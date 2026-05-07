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
    
    <title><?php echo $settings_r['site_title'] ?> - Contact</title>
    <style>
        .lgbtn button:hover{
            background-color:rgb(19, 246, 60);
            
        }
        .lgbtn button{
            border: 2px solid black;
               border-radius: 8px;
               width: 100px;
        }
        .custom-alert{
           position: fixed;
             top: 100px; 
           right: 25px;
}
    </style>
</head>
<body>
         <!-- header part -->

<?php require('inc/header.php'); ?>
        


<div class="mt-5 px-4">
    
 
    <h2 class="fw-bold h-font text-center">Contact Us</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        
    </p>
</div>



<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 mb-5 px-4">
              <div class="bg-white rounded shadow p-4 ">
              <iframe class="w-100 rounded mb-4" height="350px" src="<?php echo $contact_r['iframe'] ?>"   loading="lazy" ></iframe>
                <h5>Address</h5>
                <a href="<?php echo $contact_r['gmap'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address'] ?>
                </a>
                <h5 class="mt-4">Call us</h5>
             <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
             <i class="bi bi-telephone-fill"></i>  +<?php echo $contact_r['pn1'] ?>
            </a>
            <br>
            <a href="tel: +<?php echo $contact_r['pn2'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
             <i class="bi bi-telephone-fill"></i>  +<?php echo $contact_r['pn2'] ?>
            </a>
            <br>
            <a href="tel: +<?php echo $contact_r['pn3'] ?>" class="d-inline-block  text-decoration-none text-dark">
             <i class="bi bi-telephone-fill"></i>  +<?php echo $contact_r['pn3'] ?>
            </a>
                   
               <h5 class="mt-4">Email</h5>
               <a href="mailto: <?php echo $contact_r['email'] ?>" class="d-inline-block  text-decoration-none text-dark">
               <i class="bi bi-envelope-fill"></i> <?php echo $contact_r['email'] ?>
               </a>

               <h5 class="mt-4">Follow us</h5>
             <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block  text-dark fs-5 me-2">
               <i class="bi bi-twitter me-1"></i>
               
            </a>
    
            <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block  text-dark fs-5 me-2">
                <i class="bi bi-facebook me-1"></i>                 
            </a>

            <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark fs-5">
                <i class="bi bi-instagram me-1"></i>             
            </a>
            </div>
        </div>

        <div class="col-lg-6  px-4">
              <div class="bg-white rounded shadow  p-4 ">
               <form method="POST">
                <h5>Send a Message</h5>
                <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Name</label>
            <input name="name" required type="text" class="form-control shadow-none" />
              </div>
              <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Email</label>
            <input name="email" required type="email" class="form-control shadow-none" />
              </div>
              <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Subject</label>
            <input name="subject" required type="text" class="form-control shadow-none" />
              </div>
              <div class="mt-3">
            <label class="form-label" style="font-weight: 500;">Message</label>
            <textarea name="message" required name="text address" rows="5" cols="50" style="width: 562px; height: 130px; resize: none; "> </textarea>
              </div>
              <div class="lgbtn">
                    <button type="submit" name="send" class="mt-3">SEND</button>
                     </div>
               </form>
            </div>
        </div>
      </div>
</div>

<?php 
 if(isset($_POST['send']))
 {
  $frm_data = filteration($_POST);

  $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
  $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];
  $res = insert($q,$values,'ssss');
  if($res==1){
    alert('success','mail sent!');
  }
  else{
    alert('error','server down ! try again later.');
  }
 }

?>


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