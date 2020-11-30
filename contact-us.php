<!DOCTYPE html>
<html lang="en">
<head>
<?php include("meta.php"); ?> 
<link rel="stylesheet" href="assets/css/bundle.min.css" />
</head>
<body>
<?php include("header-inner.php"); ?> 
  <!-- Breadcrumb Area Start -->
  <nav class="breadcrumb-area bg-dark bg-6 pt-60 pb-30">
    <div class="container d-md-flex">
      <h2 class="text-white mb-0">Contact Us</h2>
      <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
        <li class="breadcrumb-item"><a href="index.html">Home</a> <span class="text-white">/</span></li>
        <li aria-current="page" class="breadcrumb-item active">Contact Us</li>
      </ol>
    </div>
  </nav>
  <!-- Breadcrumb Area End -->
  <div class="bg-3 bg-white">
		  <!-- Contact Area Start -->
  <section class="contact-area section-ptb white-bg">
    <div class="container">
      <div class="row  d-flex align-items-center">
        <div class="col-12 col-md-6 col-lg-7 ">
          <div class="contact-form">
            <h2>Leave a Message</h2>
            <hr class="line line-sm mb-40">
            <form class="form-group" id="contact_form" action="" method="post">
              <div class="row">
                <div class="col-12 col-md-6">
                  <input class="form-control" type="text" name="name" id="contact_name" placeholder="Your Name">
                </div>
                <div class="col-12 col-md-6">
                  <input class="form-control" type="email" name="email" id="contact_email" placeholder="Your Email">
                </div>
              </div>
              <input class="form-control" type="text" name="subject" id="contact_subject" placeholder="Subject">
              <textarea class="form-control" name="message" id="contact_message" rows="3" placeholder="Your Message"></textarea>
              <button class="btn btn-primary mt-5" type="submit" id="contact_submit" data-complete-text="Well done!">Send Message</button>
            </form>
          </div>
        </div>
        <div class="col-12 col-md-6 offset-lg-1 col-lg-4">
          <div class="contact-info">
            <h2>Contact Info</h2>
            <hr class="line line-sm">
            <ul class="list-unstyled">
              <li><span>Phone:</span> <a href="tel:+98-589-698-589">+91 80- 4122 9695</a></li>
			  <li><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;      </span> <a href="fax:58-598-575">+91 80- 4150 6620</a></li>
              <li><span>Email:</span> <a href="mailto:info@brokingindia.com">info@brokingindia.com </a></li>
              
            </ul>
            <hr class="line max-w mb-20">
            <p>#82, Sri Sai Arcade, 3rd Floor, Gandhi Bazaar Main Road, Basavanagudi, Bangalore - 560004, Karnataka, India</p>
          </div>
        </div>
      </div>      
    </div>
  </section>
  <!-- Contact Area End -->
  </div>
<?php include("footer.php"); ?> 
<script src="assets/js/bundle.min.js"></script>
<script type="text/javascript" src="assets/js/brokerage.min.js"></script>
</body>
</html>
