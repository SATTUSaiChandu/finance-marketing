<footer class="footer">
  <div class="container footer-grid">

    <!-- Brand -->
    <div class="footer-brand">
      <img
        src="/finance-marketing/public/assets/images/Application Logo.png"
        alt="App logo"
        class="footer-logo" />

      <p class="footer-desc">
        Connecting borrowers and financiers through secure, transparent lending.
      </p>

      <div class="socials">
        <a href="#" class="social-link">Twitter</a>
        <a href="#" class="social-link">LinkedIn</a>
        <a href="#" class="social-link">Facebook</a>
      </div>
    </div>

    <!-- Company -->
    <div class="footer-links">
      <h4>Company</h4>
      <ul>
        <li><a href="/finance-marketing/public/about">About</a></li>
        <li><a href="/finance-marketing/public/terms">Terms &amp; Conditions</a></li>
        <li><a href="/finance-marketing/public/privacy">Privacy Policy</a></li>
        <li><a href="/finance-marketing/public/contact">Contact</a></li>
      </ul>
    </div>

    <!-- Product -->
    <div class="footer-products">
      <h4>Product</h4>
      <ul>
        <li><a href="/finance-marketing/public/auth/signup">Create Account</a></li>
        <li><a href="/finance-marketing/public/auth/signin">Sign In</a></li>
        <li><a href="/finance-marketing/public/">Financier Plans</a></li>
        <li><a href="#">API</a></li>
      </ul>
    </div>



    <!-- Bottom -->
    <div class="footer-bottom">
      <div>
        © <span id="year"></span> Financement Faciele. All rights reserved. ·
        Powered By Nouverely
      </div>

      <div class="small-links">
        <a href="/finance-marketing/public/privacy"><b>
            <ul>Privacy</ul>
          </b> </a>
        <a href="/finance-marketing/public/terms"><b>
            <ul>Terms</ul>
          </b></a>
        <a href="/finance-marketing/public/contact"><b>
            <ul>Support</ul>
          </b></a>
      </div>
    </div>
</footer>

<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>