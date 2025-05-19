<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kho Dental Clinic</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./images/KDC logo.jpg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/index.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Roboto:wght@400;500;600&display=swap"
    rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header">

    <div class="header-top">
      <div class="container">

        <ul class="contact-list">

          <li class="contact-item">
            <ion-icon name="mail-outline"></ion-icon>

            <a href="mailto:info@example.com" class="contact-link">khocharlotteannbautista@gmail.com</a>
          </li>

          <li class="contact-item">
            <ion-icon name="call-outline"></ion-icon>

            <a href="tel:+639612468749" class="contact-link">+63 961 2468 749</a>
          </li>

        <ul class="social-list">

          <li>
            <a href="https://www.facebook.com/profile.php?id=100063644036406" class="social-link">
              <ion-icon name="logo-facebook" alt="facebook"></ion-icon>
            </a>
          </li>

        </ul>

      </div>
    </div>

     <div class="col-10 col-sm-9 col-xl-10 p-0 m-0">
            <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
                <div class="container-fluid">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                <button  Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

    <div class="header-bottom" data-header>
      <div class="container">

        <a href="#" class="logo">Kho Dental Clinic.</a>

        <nav class="navbar container" data-navbar>
          <ul class="navbar-list">

            <li>
              <a href="#home" class="navbar-link" data-nav-link>Home</a>
            </li>

            <li>
              <a href="#service" class="navbar-link" data-nav-link>Services</a>
            </li>

            <li>
              <a href="#about" class="navbar-link" data-nav-link>AboutUs</a>
            </li>

            <li>
              <a href="#footer" class="navbar-link" data-nav-link>Contact</a>
            </li>

            <li>
              <a href="login.php" class="navbar-link" data-nav-link>logout</a>
            </li>

          </ul>
        </nav>

        <a href="book.php" class="btn">Book appointment</a>


        <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
          <ion-icon name="menu-sharp" aria-hidden="true" class="menu-icon"></ion-icon>
          <ion-icon name="close-sharp" aria-hidden="true" class="close-icon"></ion-icon>
        </button>


      </div>
    </div>

  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home" style="background-image: url('./assets/images/hero-bg.png')"
        aria-label="hero">
        <div class="container">

          <div class="hero-content">

            <p class="section-subtitle">Welcome To  Kho Dental Clinic</p>

            <h1 class="h1 hero-title">We Are Best Dental Service</h1>

            <p class="hero-text">
              Brighten your smile with our expert dental care! We offer professional cleanings, fillings, teeth whitening, and more to keep your oral health in top shape. Book your appointment today for a healthier, more confident smile!
            </p>

            <form action="" class="hero-form">
              <input type="email" name="email_address" aria-label="email" placeholder="Your Email Address..." required
                class="email-field">

              <button type="submit" class="btn">Get Call Back</button>
            </form>

          </div>

          <figure class="hero-banner">
            <img src="./images/doccha.png" width="587" height="839" alt="hero banner" class="w-100">
          </figure>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

<section class="section service" id="service" aria-label="service">
  <div class="container">

    <p class="section-subtitle text-center">Our Services</p>

    <h2 class="h2 section-title text-center">What We Provide</h2>

    <ul class="service-list">

      <li>
        <div class="service-card">

          <div class="card-icon">
            <img src="./assets/images/service-icon-1.png" width="100" height="100" loading="lazy"
              alt="service icon" class="w-100">
          </div>

          <div>
            <h3 class="h3 card-title">Root Canal</h3>
            <p class="service-price">₱800</p>
            <p class="card-text">
              Save your tooth with a painless root canal! We remove infection, relieve pain, and restore your smile.
            </p>
          </div>

        </div>
      </li>

      <li>
        <div class="service-card">

          <div class="card-icon">
            <img src="./assets/images/service-icon-2.png" width="100" height="100" loading="lazy"
              alt="service icon" class="w-100">
          </div>

          <div>
            <h3 class="h3 card-title">Alignment Teeth</h3>
            <p class="service-price">₱1300</p>
            <p class="card-text">
              Straighten your smile with expert teeth alignment! Braces or clear aligners for a healthier, more confident you.
            </p>
          </div>

        </div>
      </li>

      <li>
        <div class="service-card">

          <div class="card-icon">
            <img src="./assets/images/service-icon-3.png" width="100" height="100" loading="lazy"
              alt="service icon" class="w-100">
          </div>

          <div>
            <h3 class="h3 card-title">Cosmetic Teeth</h3>
            <p class="service-price">₱2500</p>
            <p class="card-text">
              Enhance your smile with cosmetic dentistry! Whitening, veneers, and more for a flawless look.
            </p>
          </div>

        </div>
      </li>

      <li class="service-banner">
        <figure>
          <img src="./assets/images/service-banner.png" width="409" height="467" loading="lazy"
            alt="service banner" class="w-100">
        </figure>
      </li>

      <li>
        <div class="service-card">

          <div class="card-icon">
            <img src="./assets/images/service-icon-4.png" width="100" height="100" loading="lazy"
              alt="service icon" class="w-100">
          </div>

          <div>
            <h3 class="h3 card-title">Oral Hygiene</h3>
            <p class="service-price">₱2000</p>
            <p class="card-text">
              Keep your smile healthy with good oral hygiene! Brush, floss, and visit your dentist regularly.
            </p>
          </div>

        </div>
      </li>

      <li>
        <div class="service-card">

          <div class="card-icon">
            <img src="./assets/images/service-icon-5.png" width="100" height="100" loading="lazy"
              alt="service icon" class="w-100">
          </div>

          <div>
            <h3 class="h3 card-title">Live Advisory</h3>
            <p class="service-price">₱500</p>
            <p class="card-text">
              Get real-time dental advice with our live advisory! Expert guidance for your oral health concerns.
            </p>
          </div>

        </div>
      </li>

      <li>
        <div class="service-card">

          <div class="card-icon">
            <img src="./assets/images/service-icon-6.png" width="100" height="100" loading="lazy"
              alt="service icon" class="w-100">
          </div>

          <div>
            <h3 class="h3 card-title">Cavity Inspection</h3>
            <p class="service-price">₱500</p>
            <p class="card-text">
              Detect cavities early with a professional inspection! Protect your teeth and prevent decay.
            </p>
          </div>

        </div>
      </li>

    </ul>

  </div>
</section>

      <!-- 
        - #CTA
      -->

      <section class="section cta" aria-label="cta">
        <div class="container" style="display: flex; flex-direction: column; align-items: center; text-align: center;">

          <div class="cta-content" style="display: flex; flex-direction: column; align-items: center;">
            <p class="section-subtitle">Book Dental Appointment</p>
            <h2 class="h2 section-title">We Are Open And Welcoming Patients</h2>
            <a href="book.php" class="btn">Book Appointment</a>
          </div>

        </div>
      </section>



      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">
            <img src="./images/about-banner.jpg" width="470" height="400" loading="lazy" alt="about banner"
              class="w-90">
          </figure>

          <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">We Care For Your Dental Health</h2>
            <br>
            <p class="section-text">
              At Kho Dental Clinic, your smile is our priority! We are dedicated to providing top-quality dental care in a comfortable and friendly environment. From routine checkups to advanced treatments, our expert team ensures your oral health is in the best hands. Because a healthy smile is a happy smile!
            </p>
          </div>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer" id="footer" aria-label="footer">

    <div class="footer-top section">
      <div class="container">

        <div class="footer-brand">

          <li>
            <p class="footer-list-title">Clinic Hours</p>
          </li>

          <div class="schedule">

            <span class="span">
              Monday :<br>
              9:00 AM - 3:00 PM <br>
              Tuesday - Friday :<br>
              9:00 AM - 5:00 PM <br>
              Saturday : <br>
              9:00 - 3:00 PM<br>
              Sunday : CLOSED
            </span>
          </div>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Other Links</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Home</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">About Us</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Services</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Project</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Our Team</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Latest Blog</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Our Services</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Root Canal</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Alignment Teeth</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Cosmetic Teeth</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Oral Hygiene</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Live Advisory</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="add-outline"></ion-icon>

              <span class="span">Cavity Inspection</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Contact Us</p>
          </li>

          <li class="footer-item">
            <div class="item-icon">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="item-text">
              Cato, Infanta, Pangasinan
            </address>
          </li>

          <li class="footer-item">
            <div class="item-icon">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+639612468749" class="footer-link">+63 961 2468 749</a></li>

          <li class="footer-item">
            <div class="item-icon">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:help@example.com" class="footer-link">khocharlotteannbautista@gmail.com</a>
          </li>

        </ul>

      </div>
    </div>
    </div>
    </div>

  </footer>





 




  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</body>

</html>