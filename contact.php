<?php 
include 'includes/header.php';
?>

<!-- Hero Section -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Contact</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Information Section -->
<div class="container my-5">
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
            <h5>Our Fellowship Location</h5>
            <p>Nyanchwa Mission Hospital SDA Church, Kisii Town</p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-phone fa-3x text-primary mb-3"></i>
            <h5>Contact Us</h5>
            <p>Director: <a href="tel:+254111289899">+254 111 289 899</a><br>
            Secretary: <a href="tel:+254727456619">+254 727 456 619</a></p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-envelope fa-3x text-primary mb-3"></i>
            <h5>Email Us</h5>
            <p><a href="mailto:info@crownministerschoir.com">info@crownministerschoir.com</a></p>
        </div>
    </div>
</div>

<!-- Contact Form -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">Get In Touch</p>
            <h1 class="display-3">Contact For Any Queries</h1>
        </div>

        <form method="POST" action="https://formspree.io/f/xkgwarar">
            <div class="row g-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="col-sm-6">
                    <label><i class="fas fa-user"></i> Your Name</label>
                    <input type="text" name="name" class="form-control bg-transparent p-3" placeholder="Your Name" required>
                </div>
                <div class="col-sm-6">
                    <label><i class="fas fa-envelope"></i> Your Email</label>
                    <input type="email" name="email" class="form-control bg-transparent p-3" placeholder="Your Email" required>
                </div>
                <div class="col-12">
                    <label><i class="fas fa-heading"></i> Subject</label>
                    <input type="text" name="subject" class="form-control bg-transparent p-3" placeholder="Subject" required>
                </div>
                <div class="col-12">
                    <label><i class="fas fa-comment"></i> Your Message</label>
                    <textarea name="message" class="w-100 form-control bg-transparent p-3" rows="6" placeholder="Your Message" required></textarea>
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-primary border-0 py-3 px-5" type="submit">Send Message</button>
                </div>
            </div>
        </form>

    </div>
</div>

<!-- Google Maps Integration -->
<div class="container-fluid p-0 mt-5">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.635807819606!2d34.7747065!3d-0.6810915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182849f7db6c76af%3A0x3f5a7f73b2264ef!2sNyanchwa%20Mission%20Hospital!5e0!3m2!1sen!2ske!4v1694681391278!5m2!1sen!2ske" 
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
    </iframe>
</div>

<!-- Social Media Links -->
<div class="container text-center my-5">
    <h3>Follow Us on Social Media</h3>
    <a href="https://facebook.com" class="mx-3"><i class="fab fa-facebook fa-2x"></i></a>
    <a href="https://twitter.com" class="mx-3"><i class="fab fa-twitter fa-2x"></i></a>
    <a href="https://youtube.com" class="mx-3"><i class="fab fa-youtube fa-2x"></i></a>
</div>

<?php include 'includes/footer.php'; ?>
