<?php
session_start();


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website</title>

    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Link -->


    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- Font Awesome Cdn -->


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- Google Fonts -->
</head>




<body>
    


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="index.php" id="logo">
            <img src="images/voyage.png" alt=""><span>V</span>OYAGE</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="/travel/index.php">HOME</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/travel/package-list.php">PACKAGES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/travel/index.php#services">SERVICES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/travel/index.php#gallary">GALLARY</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/travel/index.php#about">ABOUT</a>
              </li>
             
            </ul>
            
              
              <!-- Check if user is logged in and display name or login button -->
              <?php
               if (isset($_SESSION['name'])) {
           echo '<span class="navbar-text" style="color: white; padding-right: 1rem;">Logged in as: ' . $_SESSION['name'] . '</span>';
           echo '<form action="connect.php" method="post">';
           echo '<input type="submit" name="logout" value="Logout" style="background-color: darkgreen; padding: 5px 10px; color: white;border: none; border-radius: 10%; cursor: pointer;">';
           echo '</form>';
           } else {
            echo '<button class="button" id="form-open">Login</button>';
             }
               ?>
          </div>
        </div>
      </nav>
    <!-- Navbar End -->




  

   



    <!-- Home Section Start -->
    <div class="home">
        <div class="content">
            <h5>Welcome To Bangladesh</h5>
            <h1>Visit <span class="changecontent"></span></h1>
            <p>Embark on a wonderful journey to explore the beauty of Bangladesh with Voyage</p>
            <a href="http://localhost/travel/package-list.php">Book Place</a>
        </div>



   <!-- Login Reg Start -->
        <div class="form_container">
          <i class="uil uil-times form_close"></i>
          <!-- Login From -->
          <div class="form login_form">
            <form action="connect.php" method="post">
              <h2>Login</h2>

              <div class="input_box">
                <input type="email" placeholder="Enter your email" name="login_email"  required />
                <i class="uil uil-envelope-alt email"></i>
              </div>
              <div class="input_box">
                <input type="password" placeholder="Enter your password" name="login_password" required />
                <i class="uil uil-lock password"></i>
                <i class="uil uil-eye-slash pw_hide"></i>
              </div>
              <div class="option_field">
                <span class="checkbox">
                  <input type="checkbox" id="check" />
                  <label for="check">Remember me</label>
                </span>
                <a href="#" class="forgot_pw">Forgot password?</a>
              </div>

              <button class="sigi button" type="submit" name="login_submit" >LOGIN</button>

              <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
            </form>
          </div>
          <!-- Signup From -->
          <div class="form signup_form">
            <form action="connect.php" method="post">
              <h2>Signup</h2>
              <div class="input_box">
                <input type="text" placeholder="Enter your name" name="name" required />
                <i class="uil uil-user email"></i>
              </div>
             
              <div class="input_box">
                <input type="email" placeholder="Enter your email" name="email" required />
                <i class="uil uil-envelope-alt email"></i>
              </div>
              <div class="input_box">
                <input type="password" placeholder="Create password" name="password" required />
                <i class="uil uil-lock password"></i>
                <i class="uil uil-eye-slash pw_hide"></i>
              </div>
              <div class="input_box">
                <input type="password" placeholder="Confirm password" required />
                <i class="uil uil-lock password"></i>
                <i class="uil uil-eye-slash pw_hide"></i>
              </div>
              <button class="sig button" name="submit">Signup Now</button>
              <div class= "login_signup">Already have an account? <a href="#" id="login">Login</a></div>
            </form>
          </div>
        </div>
     <!-- Login Reg End -->
     <?php
    if (isset($_SESSION['registration_message'])) {
        echo '<script>';
        echo 'alert("' . $_SESSION['registration_message'] . '");';
        echo '</script>';
        unset($_SESSION['registration_message']);
    }
    if (isset($_SESSION['login_message'])) {
      echo '<script>';
      echo 'alert("' . $_SESSION['login_message'] . '");';
      echo '</script>';
      unset($_SESSION['login_message']);
  }
  if (isset($_SESSION['booking_message'])) {
    echo '<script>';
    echo 'alert("' . $_SESSION['booking_message'] . '");';
    echo '</script>';
    unset($_SESSION['booking_message']);
}

   // Check if logout success session variable is set
   if (isset($_SESSION['logout_successful']) && $_SESSION['logout_successful']) {
    echo '<p style="color: green;">Logout successful!</p>';
    // Reset the logout success session variable
    $_SESSION['logout_successful'] = false;
}
   
    ?>
   

        
        <div class="custom-shape-divider-bottom-1689525085">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>

    </div>
    <!-- Home Section End -->

    <script src="script.js"></script>



 <!-- About Start -->
 <section class="about" id="about">
  <div class="container">

    <div class="main-txt">
      <h1>About <span>Us</span></h1>
    </div>

    <div class="row" style="margin-top: 50px;">

      <div class="col-md-6 py-3 py-md-0">
        <div class="card">
          <img src="./images/about us.jpg" alt="">
        </div>
      </div>

      <div class="col-md-6 py-3 py-md-0">
        <h2>How Voyage Works</h2>
        <p>Welcome to the captivating realm of Voyage, where we extend an invitation to partake in an unparalleled expedition across the diverse tapestry of Bangladesh. Our profound purpose is to unlock the hidden gems, cultural riches, and natural wonders that define our beloved land. With an unwavering dedication to sharing the essence of Bangladesh, our adept team of enthusiasts orchestrates meticulously tailored odysseys that unveil the heart and soul of our nation. As pioneers of conscientious travel, we venture beyond the conventional, facilitating authentic interactions with local communities and showcasing the splendor of our environment. Whether your aspirations are stirred by the tranquility of Sylhet's waterways, the pristine allure of Cox's Bazar's beaches, or the enigmatic allure of the Sundarbans, every Voyage we craft is a symphony of exploration, each note resonating with the symphony of our extraordinary homeland. Embark on a transformative journey with us and let the chapters of your grand Voyage through Bangladesh unfold.</p>
        
      </div>

    </div>

  </div>
</section>
<!-- About End -->








    







    <!-- Section Services Start -->

      
        <section id="services" class="services">
          
              
          <div class="container3">
            <div class="main-txt">
              <h1><span>Our</span> Services</h1>
            </div>
  
                  <div class="card-wrapper">
  
                      <div class="card"> 
                          <img src="./images/car.png" alt="">
                         <h2> Fast Travel</h2>
                         
                      <p>We provide fast and secure travel options. </p>
                      </div>
                      
                      <div class="card"> 
                          <img src="./images/tour-guide.png" alt="">
                         <h2> Tour Guide</h2>
                         
                      <p>We provide trained and professional tour guides.</p>
                      </div>
  
                      <div class="card"> 
                          <img src="./images/adventure.png" alt="">
                         <h2> Adventure & Culture</h2>
                         
                      <p>We provide awesome adventure packages.</p>
                      </div>
  
                      <div class="card"> 
                          <img src="./images/money.png" alt="">
                         <h2>Afordable Price</h2>
                         
                      <p>We provide affordable travel options.</p>
                      </div>
  
                      <div class="card"> 
                          <img src="./images/hotel.png" alt="">
                         <h2> Best Hotels</h2>
                         
                      <p>We provide the best hotels and resorts.</p>
                      </div>
  
                      <div class="card"> 
                          <img src="./images/food.png" alt="">
                         <h2> Great Foods</h2>
                         
                      <p>We provide great food options for adults and children.</p>
                      </div>
                  </div>
          </div>
  
      </section>
    <!-- Section Services End -->




    <!-- Section Gallary Start -->
    <section class="gallary" id="gallary">
      <div class="container">

        <div class="main-txt">
          <h1><span>G</span>allary</h1>
        </div>

        <div class="row" style="margin-top: 30px;">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/sajekG.jpg" alt="" height="230px">
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/cox-overview.jpg" alt="" height="230px">
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/sundarbanG.jpg" alt="" height="230px">
            </div>
          </div>
        </div>


        <div class="row" style="margin-top: 30px;">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/bandarbanG.jpg" alt="" height="230px">
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/sylhetG.jpg" alt="" height="230px">
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/Saint-martin's-islandG.jpg" alt="" height="230px">
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- Section Gallary End -->







   








    <!-- Footer Start -->
    <footer id="footer">
      <h1><span>V</span>OYAGE</h1>
      <p>Embark on unforgettable journeys with our curated travel experiences.</p>
      <div class="social-links">
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-youtube"></i>
        <i class="fa-brands fa-pinterest-p"></i>
      </div>
      <div class="credit">
        <p>Designed By Janina</p>
      </div>
      <div class="copyright">
        <p>&copy;Copyright Janina. All Rights Reserved</p>
      </div>
    </footer>
    <!-- Footer End -->







    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>