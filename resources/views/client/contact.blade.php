<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background: #f5f5f5;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #0d3f2f, #1f5f4a);
            color: #fff;
            padding: 80px 10%;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero p {
            max-width: 500px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #ff4d1c;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
        }

        /* FORM */
        .section {
            padding: 60px 10%;
            background: #fff;
        }

        .section h2 {
            margin-bottom: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        textarea {
            height: 120px;
        }

        .full {
            grid-column: 1 / -1;
        }

        .submit-btn {
            background: #ff4d1c;
            color: white;
            padding: 14px;
            border: none;
            width: 100%;
            border-radius: 6px;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 40px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            border-top: 4px solid #ff4d1c;
        }

        .card.dark {
            background: #0d3f2f;
            color: #fff;
        }

        /* FAQ */
        .faq {
            background: #eee;
            padding: 60px 10%;
        }

        .faq-item {
            background: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 6px;
            cursor: pointer;
        }

        /* FOOTER */
        .footer {
            background: #111;
            color: #aaa;
            padding: 40px 10%;
        }

        .footer h4 {
            color: #fff;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        /* RESPONSIVE */
        @media(max-width:768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>

<body>

    <!-- HERO -->
    <section class="hero">
        <h1>Start a Conversation About Your Project</h1>
        <p>Tell us what you're working on and we'll come back with clear next steps on how we can help.</p>
        <a href="#" class="btn">Get in Touch →</a>
    </section>

    <!-- FORM -->
    <section class="section">
        <h2>Send Us a Message</h2>
        <p>Fill out the form below and we'll respond within 24 hours.</p>



        <form method="POST" action="{{ route('contact.submit') }}">
            @csrf

            <div class="form-grid">
                <input type="text" name="name" placeholder="Your name" value="{{ old('name') }}">
                @error('name')
                    <small>{{ $message }}</small>
                @enderror

                <input type="email" name="email" placeholder="your@email.com" value="{{ old('email') }}">
                @error('email')
                    <small>{{ $message }}</small>
                @enderror

                <select name="team" class="full">
                    <option value="">Select a team</option>
                    <option>London</option>
                    <option>Accra</option>
                </select>

                <select name="service" class="full">
                    <option value="">Select a service</option>
                    <option>Web Development</option>
                    <option>Marketing</option>
                </select>

                <select name="package" class="full">
                    <option value="">None</option>
                    <option>Basic</option>
                    <option>Premium</option>
                </select>

                <textarea name="message" class="full" placeholder="Your message">{{ old('message') }}</textarea>

                @error('message')
                    <small>{{ $message }}</small>
                @enderror

                <button class="submit-btn full">Send Message</button>
            </div>
        </form>

        <!-- CARDS -->
        <div class="cards">
            <div class="card">
                <h4>London</h4>
                <p>Eagle London Agency</p>
                <p>+44 0203 967 0281</p>
            </div>

            <div class="card dark">
                <h4>Accra</h4>
                <p>EMH Global Ghana Limited</p>
                <p>+233 302 257 395</p>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq">
        <h2>Frequently Asked Questions</h2>

        <div class="faq-item">How quickly will you respond?</div>
        <div class="faq-item">Which team should I contact?</div>
        <div class="faq-item">What info should I include?</div>
        <div class="faq-item">Do you work with startups?</div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-grid">
            <div>
                <h4>Company</h4>
                <p>About</p>
                <p>Services</p>
            </div>
            <div>
                <h4>Contact</h4>
                <p>London</p>
                <p>Accra</p>
            </div>
            <div>
                <h4>Legal</h4>
                <p>Privacy</p>
            </div>
            <div>
                <h4>Subscribe</h4>
                <input type="email" placeholder="Enter email">
            </div>
        </div>
    </footer>

</body>

</html>
