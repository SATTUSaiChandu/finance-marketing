<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Contact • Financement Faciele</title>
  <!-- keep using your main stylesheet -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css" />
  <style>
    /* Small page-specific helpers */
    .contact-hero {
      background: #ffffff;
      padding: 56px 0 26px;
    }

    .contact-inner {
      display: flex;
      gap: 32px;
      align-items: flex-start;
      justify-content: center;
      flex-wrap: wrap;
    }

    .contact-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
      padding: 26px;
      max-width: 720px;
      width: 100%;
      border: 1px solid #e6eef9;
    }

    .contact-grid {
      display: grid;
      grid-template-columns: 1fr 340px;
      gap: 28px;
      align-items: start;
    }

    /* form */
    form.contact-form label {
      display: block;
      margin: 10px 0 6px;
      color: #475569;
      font-weight: 600;
      font-size: 14px;
    }

    form.contact-form input[type="text"],
    form.contact-form input[type="email"],
    form.contact-form input[type="tel"],
    form.contact-form textarea,
    form.contact-form select {
      width: 100%;
      padding: 10px 12px;
      border-radius: 8px;
      border: 1px solid #e6eef9;
      font-size: 15px;
      color: #0f172a;
    }

    form.contact-form textarea {
      min-height: 140px;
      resize: vertical;
    }

    .contact-info {
      background: linear-gradient(180deg,
          rgba(250, 250, 255, 1),
          rgba(245, 249, 255, 1));
      padding: 18px;
      border-radius: 10px;
      border: 1px solid #eaeffc;
    }

    .contact-info h4 {
      margin: 0 0 8px;
      font-size: 16px;
      color: #0f172a;
    }

    .contact-info p,
    .contact-info a {
      color: #475569;
      margin: 6px 0;
      display: block;
      text-decoration: none;
    }

    .map-embed {
      width: 100%;
      height: 200px;
      border-radius: 8px;
      overflow: hidden;
      border: 1px solid #e6eef9;
    }

    .map-embed img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .submit-row {
      display: flex;
      gap: 12px;
      margin-top: 14px;
      align-items: center;
      flex-wrap: wrap;
    }

    .success-msg {
      display: none;
      color: #0f5132;
      background: #ecfdf3;
      border: 1px solid #bbf7d0;
      padding: 10px 12px;
      border-radius: 8px;
      font-weight: 600;
    }

    @media (max-width: 880px) {
      .contact-grid {
        grid-template-columns: 1fr;
      }

      .map-embed {
        height: 180px;
      }
    }
  </style>
</head>

<body>
  <!-- NAV (same as other pages) -->
  <header class="nav">
    <div class="container nav-inner">
      <div class="brand">
        <div class="logo">
          <a href="../Dashboard/index.php"><img
              src="/finance-marketing/public/assets/images/Application Logo.png"
              alt="Application Logo" /></a>
        </div>
      </div>

      <div class="nav-actions">
        <a class="btn" href="/Auth/signin.php">Login</a>
        <a class="btn primary" href="/Auth/signup.php">Get Started</a>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <section class="contact-hero">
    <div class="container">
      <div style="text-align: center; max-width: 820px; margin: 0 auto 8px">
        <h1 class="hero-top-title" style="margin-bottom: 6px">Contact Us</h1>
        <p class="lead" style="margin: 0 auto">
          Have questions, feedback or need support? Our team at Nouverely is
          here to help. Fill out the form below or reach us directly via email
          or phone.
        </p>
      </div>

      <div class="contact-inner" style="margin-top: 20px">
        <div class="contact-card" style="width: 100%">
          <div class="contact-grid">
            <!-- LEFT: FORM -->
            <div>
              <h3 style="margin-top: 0; color: #0f172a">Send us a message</h3>

              <form class="contact-form" id="contactForm" novalidate>
                <label for="name">Full name</label>
                <input
                  id="name"
                  name="name"
                  type="text"
                  placeholder="Your full name"
                  required />

                <label for="email">Email address</label>
                <input
                  id="email"
                  name="email"
                  type="email"
                  placeholder="you@example.com"
                  required />

                <label for="phone">Phone (optional)</label>
                <input
                  id="phone"
                  name="phone"
                  type="tel"
                  placeholder="+91 1234 567 890" />

                <label for="subject">Subject</label>
                <input
                  id="subject"
                  name="subject"
                  type="text"
                  placeholder="Short subject"
                  required />

                <label for="message">Message</label>
                <textarea
                  id="message"
                  name="message"
                  placeholder="Tell us what's up..."
                  required></textarea>

                <label for="contact-method" style="margin-top: 8px">Preferred contact method</label>
                <select id="contact-method" name="contact-method">
                  <option value="email">Email</option>
                  <option value="phone">Phone</option>
                </select>

                <div class="submit-row">
                  <button type="submit" class="btn primary">
                    Send Message
                  </button>
                  <button type="reset" class="btn">Reset</button>

                  <div
                    id="success"
                    class="success-msg"
                    role="status"
                    aria-live="polite">
                    Thanks — we received your request and will reply within
                    1-2 business days.
                  </div>
                </div>
              </form>
            </div>

            <!-- RIGHT: Contact details / map -->
            <aside class="contact-info" aria-label="Contact information">
              <h4>Contact details</h4>
              <p><strong>Company:</strong> Nouverely</p>
              <p><strong>Product:</strong> Financement Faciele</p>
              <p>
                <strong>Email:</strong>
                <a href="mailto:support@nouverely.io">support@nouverely.io</a>
              </p>
              <p>
                <strong>Phone:</strong>
                <a href="tel:+911234567890">+91 1234 567 890</a>
              </p>
              <p><strong>Address:</strong> 123 Finance St, Ludhiana, India</p>

              <div style="margin-top: 12px">
                <h4 style="margin-bottom: 8px">Our office (approx.)</h4>
                <!-- using uploaded image as map/mockup -->
                <div class="map-embed" aria-hidden="false">
                  <img
                    src="/mnt/data/Screenshot 2025-11-21 at 1.07.40 PM.png"
                    alt="Office & map mockup" />
                </div>
              </div>

              <div style="margin-top: 12px">
                <h4 style="margin-bottom: 8px">Follow us</h4>
                <div style="display: flex; gap: 8px; flex-wrap: wrap">
                  <a class="social-link" href="#" aria-label="Twitter">Twitter</a>
                  <a class="social-link" href="#" aria-label="LinkedIn">LinkedIn</a>
                  <a class="social-link" href="#" aria-label="Facebook">Facebook</a>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA (short) -->
  <section style="padding: 18px 0">
    <div class="container">
      <div class="cta" style="max-width: 900px; margin: 0 auto">
        <h2 style="margin: 0 0 6px">Need immediate support?</h2>
        <p style="margin: 0 0 12px">
          For urgent enquiries call <strong>+91 1234 567 890</strong> or email
          <a href="mailto:support@nouverely.io">support@nouverely.io</a>.
        </p>
        <div style="text-align: center">
          <a class="btn primary" href="../Auth/signin.php">Sign In</a>
          <a class="btn" href="../Auth/signin.php" style="margin-left: 10px">Create Account</a>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER (unchanged) -->
  <?php include __DIR__ . '/footer.php'; ?>

  <script>
    // set footer year
    document.getElementById("year").textContent = new Date().getFullYear();

    // very small client-side form handler (placeholder)
    const form = document.getElementById("contactForm");
    const success = document.getElementById("success");

    form.addEventListener("submit", (e) => {
      e.preventDefault();

      // simple validation
      const name = form.name.value.trim();
      const email = form.email.value.trim();
      const subject = form.subject.value.trim();
      const message = form.message.value.trim();

      if (!name || !email || !subject || !message) {
        alert(
          "Please fill in the required fields (name, email, subject, message)."
        );
        return;
      }

      // show success — replace with real API call later
      success.style.display = "block";

      // optional: clear form
      form.reset();

      // hide message after a while
      setTimeout(() => {
        success.style.display = "none";
      }, 6000);
    });
  </script>
</body>

</html>