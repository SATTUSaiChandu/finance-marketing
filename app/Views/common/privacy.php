<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Privacy Policy • Financement Faciele</title>

  <!-- Base styles -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css" />

  <style>
    /* ================= RESET ================= */
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
      color: #0f172a;
      background: #f8fafc;
      position: relative;
    }

    /* Watermark background */
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      z-index: -1;
      background-image: url("/finance-marketing/public/assets/images/Application Logo.png");
      background-repeat: no-repeat;
      background-position: center;
      background-size: 120% auto;
      filter: blur(10px) saturate(.9) opacity(.15);
      transform: scale(1.05);
    }

    /* ================= NAV ================= */
    .nav {
      background: #ffffff;
      border-bottom: 1px solid #e6eef9;
    }

    .nav-inner {
      display: flex;
      justify-content: center;
      padding: 14px;
    }

    .logo img {
      width: 180px;
    }

    /* ================= POLICY CARD ================= */
    .policy-card {
      max-width: 900px;
      margin: 60px auto;
      background: #ffffff;
      padding: 36px 28px;
      border-radius: 14px;
      border: 1px solid #e6eef9;
      box-shadow: 0 12px 36px rgba(15, 23, 42, 0.05);
    }

    .policy-card h1 {
      margin-top: 0;
      font-size: 34px;
      font-weight: 800;
    }

    .section-title {
      margin-top: 32px;
      font-size: 22px;
      font-weight: 700;
    }

    .lead {
      color: #475569;
      font-size: 16px;
      line-height: 1.7;
    }

    ul {
      padding-left: 18px;
      line-height: 1.7;
      color: #475569;
    }

    .divider {
      height: 1px;
      background: #e6eef9;
      margin: 18px 0;
    }

    .actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      margin-top: 28px;
    }

    .btn {
      padding: 10px 18px;
      border-radius: 999px;
      border: 1px solid #e6eef9;
      background: #ffffff;
      color: #0f172a;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.15s ease;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
    }

    .btn.primary {
      background: #2563eb;
      color: #ffffff;
      border-color: #2563eb;
    }

    .btn.ghost {
      background: transparent;
    }

    @media (max-width: 700px) {
      .policy-card {
        margin: 30px 14px;
        padding: 26px 20px;
      }

      .policy-card h1 {
        font-size: 26px;
      }
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <header class="nav">
    <div class="nav-inner">
      <div class="logo">
        <a href="../Dashboard/index.php">
          <img src="/finance-marketing/public/assets/images/Application Logo.png" alt="App Logo" />
        </a>
      </div>
    </div>
  </header>

  <!-- MAIN CONTENT -->
  <main>
    <article class="policy-card" role="article" aria-labelledby="policy-title">
      <h1 id="policyTitle"></h1>
      <div class="divider"></div>

      <p class="lead" id="policyLead"></p>

      <div id="policyContent"></div>

      <div class="actions">
        <a class="btn primary" href="../Auth/signin.php">Back to Sign In</a>
        <a class="btn ghost" href="../common/terms.php">View Terms & Conditions</a>
      </div>


    </article>
  </main>

  <!-- FOOTER -->
  <?php include __DIR__ . '/footer.php'; ?>

  <script>
    fetch('/finance-marketing/public/privacy.php')
      .then(res => res.json())
      .then(res => {

        const sections = res.sections;
        const bullets = res.bullets;

        // Title & lead
        document.getElementById('policyTitle').textContent =
          sections.find(s => s.section_key === 'page_title').title;

        document.getElementById('policyLead').textContent =
          sections.find(s => s.section_key === 'page_lead').content;

        const container = document.getElementById('policyContent');

        sections.forEach(s => {
          if (s.section_key.startsWith('section_')) {

            const h = document.createElement('h2');
            h.className = 'section-title';
            h.textContent = s.title;
            container.appendChild(h);

            if (bullets[s.section_key]) {
              const ul = document.createElement('ul');
              bullets[s.section_key].forEach(b => {
                const li = document.createElement('li');
                li.innerHTML = b;
                ul.appendChild(li);
              });
              container.appendChild(ul);
            } else if (s.content) {
              const p = document.createElement('p');
              p.className = 'lead';
              p.textContent = s.content;
              container.appendChild(p);
            }
          }

          if (s.section_key === 'contact') {
            const p = document.createElement('p');
            p.className = 'lead';
            p.innerHTML = s.content;
            container.appendChild(p);
          }
        });
      });
  </script>


</body>

</html>