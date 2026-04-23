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
            <a href="/services">Services</a>
            <a href="/work">Work</a>
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

    {{--
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <div id="map" style="height:500px; border-radius:10px;"></div>

    <script>
        var map = L.map('map').setView([20, 20], 2);

        // ✅ WORKING DARK MAP
        L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap & CARTO'
        }).addTo(map);

        // Custom icon
        var orangeIcon = L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
            iconSize: [25, 25]
        });

        // Locations
        L.marker([10.0159, 76.3419], {
            icon: orangeIcon
        }).addTo(map).bindPopup("India - Kochi");
        L.marker([52.6369, -1.1398], {
            icon: orangeIcon
        }).addTo(map).bindPopup("UK");
        L.marker([43.6532, -79.3832], {
            icon: orangeIcon
        }).addTo(map).bindPopup("Canada");
        L.marker([-33.8688, 151.2093], {
            icon: orangeIcon
        }).addTo(map).bindPopup("Australia");
        L.marker([46.0569, 14.5058], {
            icon: orangeIcon
        }).addTo(map).bindPopup("Slovenia");
        L.marker([41.9981, 21.4254], {
            icon: orangeIcon
        }).addTo(map).bindPopup("Macedonia");
        L.marker([1.3521, 103.8198], {
            icon: orangeIcon
        }).addTo(map).bindPopup("Singapore");
    </script>  --}}


    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            background: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
        }

        #map {
            height: 500px;
            margin: 20px auto;
            max-width: 1000px;
            border-radius: 10px;
        }

        /* Optional: hide zoom buttons for clean UI */
        .leaflet-control-zoom {
            display: none;
        }
    </style>
    </head>

    <body>

        <h2>Our Offices</h2>

        <div id="map"></div>

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

        <script>
            var map = L.map('map').setView([20, 20], 2);

            // ✅ Dark map (no API key needed)
            L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; OpenStreetMap & CARTO'
            }).addTo(map);

            // ✅ Custom orange icon
            var orangeIcon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                iconSize: [25, 25]
            });

            // ✅ Locations array
            var locations = [{
                    name: "Kochi, India",
                    coords: [10.0159, 76.3419]
                },
                {
                    name: "Bangalore, India",
                    coords: [12.9716, 77.5946]
                },
                {
                    name: "UK (Peterborough)",
                    coords: [52.6369, -1.1398]
                },
                {
                    name: "Canada (North York)",
                    coords: [43.6532, -79.3832]
                },
                {
                    name: "Australia (NSW)",
                    coords: [-33.8688, 151.2093]
                },
                {
                    name: "Slovenia (Ljubljana)",
                    coords: [46.0569, 14.5058]
                },
                {
                    name: "Macedonia (Skopje)",
                    coords: [41.9981, 21.4254]
                },
                {
                    name: "Singapore",
                    coords: [1.3521, 103.8198]
                }
            ];

            var markers = [];

            // ✅ Loop and add markers
            locations.forEach(function(loc) {
                var marker = L.marker(loc.coords, {
                        icon: orangeIcon
                    })
                    .addTo(map)
                    .bindPopup("<b>" + loc.name + "</b>");

                markers.push(marker);
            });

            // ✅ Auto fit all markers
            var group = new L.featureGroup(markers);
            map.fitBounds(group.getBounds());
        </script>





        <!-- Footer -->
        <div class="footer">
            <p>© 2026 Agency. All rights reserved.</p>
        </div>

    </body>

</html>
