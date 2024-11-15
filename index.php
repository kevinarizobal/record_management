<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include("links/links.php");?>
</head>
<body class="bg-light">
<?php include("links/header.php");?>


<!-- modal login -->
<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- carousel -->
<section id="home">
  <div class="container-fluid  px-lg-3 py-lg-2 mt-4 ">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
              <div class="carousel-item active">
              <img src="img/carousel/smc1.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
              <img src="img/carousel/smc2.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
              <img src="img/carousel/smc3.png" class="d-block w-100" alt="...">
              </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
      </div>
  </div>
  <h1 class="text-center fw-bold mt-4 bg-success text-white px-lg-3 py-lg-4 shadow-lg">RECORD MANAGEMENT SYSTEM</h1>

</section>

<!-- ABOUT -->
<section id="about">
  <div class="px-lg-2 py-lg-2">
    <h1 class="text-center mt-4">ABOUT US</h1>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae provident, porro tempora aspernatur,
    consequatur <br>repudiandae quas rerum mollitia dolorem eum illum. Expedita, praesentium dignissimos?. 
    </p>
  </div>
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
        <h1 class="mb-4">Record Management System <br>(RMS)</h1>
        <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla, quam magni, repudiandae
          accusantium nesciunt nisi corporis accusamus modi cum officia reprehenderit animi eligendi 
          possimus illum similique sint dignissimos quas necessitatibus<br>
        <br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis deleniti optio sapiente assumenda 
        error laborum dolor quae asperiores reprehenderit facilis, in corporis impedit eos voluptatem 
        accusamus animi ab exercitationem aperiam adipisci modi facere illo aspernatur! Pariatur labore 
        in facilis impedit odit cupiditate non veniam, aut voluptatum laborum optio. Quo sed nisi tenetur 
        ullam laudantium distinctio architecto quidem eveniet voluptatem mollitia! 
        </p>
      </div>
      <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
        <img src="img/smc.png" class=" w-100">
      </div>
    </div>
  </div>
</section>

<!-- contact -->
<section id="contact">
  <div class="px-lg-2 py-lg-2 bg-white">
    <h1 class="text-center mt-3">CONTACT US</h1>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
    Connect with us effortlessly through our Contact Us page – your gateway to seamless communication. Have questions,<br> suggestions, or just want to say hello? Our dedicated team is here to assist you.
    </p>
    <div class="container shadow-md">
      <div class="row shadow-lg p-4 rounded mb-3">
        <div class="col-lg-6 col-md-6 mt-4">
            <iframe class="w-100 rounded" height="300px" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d504064.63625170704!2d126.0030178!3d9.2438528!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3303d71e99221dfd%3A0x18cb40c0bdb8e03e!2sSaint%20Michael%20College%2C%20Cantilan%2C%20Incorporated!5e0!3m2!1sen!2sph!4v1731504063436!5m2!1sen!2sph" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <div class="row">
              <div class="col-lg-6 col-md-3">
                <h5 class="mt-3">Call us</h5>
                <a href="tel: +6311 222 3333 " class="d-line-block mb-2 text-decoration-none text-dark">
                  <i class="bi bi-telephone-fill"></i> +6311 222 3333
                </a>
                <h5 class="mt-3">Address</h5>
                <a href="#" target="_blank" class="d-inline-block text-decoration-none text-dark">
                  <i class="bi bi-geo-alt-fill"></i> Rizal Street 8317 Cantilan, Philippines
                </a>
              </div>
              <div class="col-lg-6 col-md-3">
                <h5 class="mt-3 ">Email</h5>
                <a href="mailto: rms@gmail.com" class="d-line-block mb-2 text-decoration-none text-dark">
                  <i class="bi bi-envelope-fill"></i> Rms_smc@gmail.com
                </a>

                <h5 class="mt-3">Follow us</h5>
                <a href="www.twitter.com" class="d-line-block text-dark text-decoration-none fs-5 me-2">
                  <i class="bi bi-twitter me-1"></i>
                </a>
                <a href="www.facebook.com" class="d-line-block text-dark text-decoration-none fs-5 me-2">
                  <i class="bi bi-facebook me-1"></i>
                  </span>
                </a>
                <a href="www.instagram.com" class="d-line-block text-dark text-decoration-none fs-5">
                  <i class="bi bi-instagram me-1"></i>
                  </span>
                </a>
              </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mt-4">
          <div >
            <form method="POST">
              <h1 class="text-center mt-3" style="font-size: 1.50rem;">Help Us To Improve By Sending A Message</h1>
              <div class="mt-2">
                <label class="form-label" style="font-weight: 500;">Name:</label>
                <input name="name" required type="text" class="form-control shadow-none">
              </div>
              <div class="mt-2">
                <label class="form-label" style="font-weight: 500;">Email:</label>
                <input name="email" required type="email" class="form-control shadow-none">
              </div>
              <div class="mt-2">
                <label class="form-label" style="font-weight: 500;">Subject:</label>
                <input name="subject" required type="text" class="form-control shadow-none">
              </div>
              <div class="mt-2">
                <label class="form-label" style="font-weight: 500;">Message:</label>
                <textarea name="message" required class="form-control shadow-none" rows="3" style="resize: none;"></textarea>
              </div>
              <button type="submit" name="send" class="btn text-white bg-success mt-2">SEND</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer>
  <h6 class="text-center bg-success text-white p-3 m-0" >Design & Developed by: BS-COMPUTER SCIENCE </h6>
</footer>

<a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top "><i class="bi bi-arrow-up"></i></a>

<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
