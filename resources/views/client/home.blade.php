<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Home</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f6f6f6;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 15px 50px;
            background: #fff;
            align-items: center;
        }

        .navbar a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
        }

        .btn {
            padding: 10px 18px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #ff5a1f;
            color: #fff;
        }

        .btn-dark {
            background: #222;
            color: #fff;
        }

        /* Hero */
        .hero {
            background: linear-gradient(135deg, #0f3d3e, #1b5e20);
            color: white;
            padding: 100px 50px;
        }

        .hero h1 {
            font-size: 40px;
            max-width: 600px;
        }

        .hero p {
            max-width: 500px;
        }

        /* Section */
        .section {
            padding: 60px 50px;
            text-align: center;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: left;
        }

        /* Featured */
        .featured {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .featured img {
            width: 100%;
            border-radius: 8px;
        }

        /* Packages */
        .packages {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .package {
            background: #fff;
            padding: 25px;
            width: 250px;
            border-radius: 8px;
        }

        .package.active {
            background: #ff5a1f;
            color: #fff;
        }

        /* Testimonials */
        .testimonial {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
        }

        /* Footer */
        .footer {
            background: #222;
            color: #fff;
            padding: 40px;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <h2>LOGO</h2>
        <div>
            <a href="/">Home</a>
            <a href="#">Services</a>
            <a href="#">Work</a>
            <a href="/contact">Contact</a>
            <a href="#" class="btn btn-primary">Get Started</a>
        </div>
    </div>

    <!-- Hero -->
    <section class="hero">
        <h1>Growth Through Authentic Connection: Strategy, Creative & Digital Solutions</h1>
        <p>We help brands grow through strategy, creative execution and digital transformation.</p>
        <br>
        <a href="#" class="btn btn-primary">Get Started</a>
        <a href="#" class="btn btn-dark">Learn More</a>
    </section>

    <!-- Services -->
    <section class="section">
        <h2>Our Services</h2>
        <p>We provide strategic, creative, and digital services.</p>

        <div class="cards">
            <div class="card">Strategy & Consulting</div>
            <div class="card">Branding & Communication</div>
            <div class="card">Creative Production</div>
            <div class="card">Digital Marketing</div>
            <div class="card">Web & App Development</div>
        </div>
    </section>

    <!-- Featured Work -->
    <section class="section">
        <h2>Featured Work</h2>

        <div class="featured">
            <img src="https://via.placeholder.com/400x250">
            <img src="https://via.placeholder.com/400x250">
            <img src="https://via.placeholder.com/400x250">
            <img src="https://via.placeholder.com/400x250">
        </div>
    </section>

    <!-- Packages -->
    <section class="section">
        <h2>Packages We Offer</h2>

        <div class="packages">
            <div class="package">Basic</div>
            <div class="package active">Pro Plan</div>
            <div class="package">Enterprise</div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section">
        <h2>Client Testimonials</h2>

        <div class="testimonial">
            <p>"Amazing experience! The team delivered outstanding results."</p>
            <strong>- Client Name</strong>
        </div>
    </section>

    <!-- CTA -->
    <section class="section" style="background:#f4e3db;">
        <h2>Ready to Get Started?</h2>
        <a href="#" class="btn btn-primary">Contact Us</a>
    </section>

    <!-- Footer -->
    <div class="footer">
        <p>© 2026 Agency. All rights reserved.</p>
    </div>

</body>

</html>
