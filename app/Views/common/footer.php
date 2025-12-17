<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css">

</head>

<body>
  <footer class="footer">
    <div class="container footer-grid">
      <!-- Brand Section -->
      <div class="footer-brand">
        <img
          src="/finance-marketing/public/assets/images/Application Logo.png"
          alt="App logo"
          class="footer-logo" />

        <p class="footer-desc">
          Connecting borrowers and financiers through secure, transparent lending.
        </p>

        <div class="socials">
          <a href="#" aria-label="Twitter" class="social-link">Twitter</a>
          <a href="#" aria-label="LinkedIn" class="social-link">LinkedIn</a>
          <a href="#" aria-label="Facebook" class="social-link">Facebook</a>
        </div>
      </div>

      <!-- Company Links -->
      <div class="footer-links">
        <h4>Company</h4>
        <ul>
          <li><a href="../common/about.php">About</a></li>
          <li><a href="../common/terms.php">Terms & Conditions</a></li>
          <li><a href="../common/privacy.php">Privacy Policy</a></li>
          <li><a href="../common/contact.php">Contact</a></li>
        </ul>
      </div>

      <!-- Product Links -->
      <div class="footer-products">
        <h4>Product</h4>
        <ul>
          <li><a href="../Auth/signup.php">Create Account</a></li>
          <li><a href="../Auth/signin.php">Sign In</a></li>
          <li><a href="#plans">Financier Plans</a></li>
          <li><a href="#">API</a></li>
        </ul>
      </div>

      <!-- Contact + Newsletter -->
      <div class="footer-contact">
        <h4>Contact</h4>

        <address>
          <div>
            Email:
            <a href="mailto:support@financement.example">
              support@financement.example
            </a>
          </div>

          <div>
            Phone:
            <a href="tel:+911234567890">+91 1234 567 890</a>
          </div>

          <div>Office: 123 Finance St, Ludhiana</div>
        </address>

        <form
          class="newsletter"
          action="#"
          method="post"
          aria-label="Subscribe to newsletter">
          <label for="newsletter-email" class="sr-only">Email</label>

          <input
            id="newsletter-email"
            name="email"
            type="email"
            placeholder="Your email"
            required />

          <button class="btn primary" type="submit">Subscribe</button>
        </form>
      </div>
    </div>

    <!-- Bottom Footer -->
    <div class="footer-bottom">
      <div>
        © <span id="year"></span> Financement Faciele. All rights reserved. ·
        Powered By Nouverely
      </div>

      <div class="small-links">
        <a href="../common/privacy.php">Privacy</a> ·
        <a href="../common/terms.php">Terms</a> ·
        <a href="../common/contact.php">Support</a>
      </div>
    </div>
  </footer>

  <script>
    // Auto-update year
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>

</body>

</html>