<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About • Financement Faciele</title>

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/about.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/dashboard.css">

</head>

<body>

  <header class="nav">
    <div class="container nav-inner">
      <div class="brand">
        <a href="/finance-marketing/public/dashboard">
          <img src="/finance-marketing/public/assets/images/Application Logo.png" alt="App Logo" />
        </a>
      </div>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero">
    <h1 id="hero-title"></h1>
    <p id="hero-content" class="lead"></p>
  </section>

  <!-- BODY -->
  <section class="container section">
    <div class="about-card">

      <h2 id="who-title"></h2>
      <p id="who-content"></p>

      <h2 id="what-title"></h2>
      <p id="what-content"></p>

      <h2 id="how-title"></h2>
      <p id="how-content"></p>

      <h2 id="mission-title"></h2>
      <p id="mission-content"></p>

    </div>
  </section>

  <?php include __DIR__ . '/footer.php'; ?>

  <script>
    fetch('/finance-marketing/public/Models/about.php')
      .then(res => res.json())
      .then(response => {
        if (response.status !== 'success') return;

        const data = response.data;

        document.getElementById('hero-title').textContent = data.hero.title;
        document.getElementById('hero-content').textContent = data.hero.content;

        document.getElementById('who-title').textContent = data.who_we_are.title;
        document.getElementById('who-content').textContent = data.who_we_are.content;

        document.getElementById('what-title').textContent = data.what_we_do.title;
        document.getElementById('what-content').textContent = data.what_we_do.content;

        document.getElementById('how-title').textContent = data.how_it_works.title;
        document.getElementById('how-content').textContent = data.how_it_works.content;

        document.getElementById('mission-title').textContent = data.mission.title;
        document.getElementById('mission-content').textContent = data.mission.content;
      })
      .catch(err => console.error(err));
  </script>
</body>

</html>