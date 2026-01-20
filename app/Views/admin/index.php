<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?= htmlspecialchars($pageTitle . ' — FinanceHub') ?></title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/admin/admin-dashboard.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/kpis.css">
</head>

<body>

  <!-- Sidebar -->
  <?php include __DIR__ . '/../common/sidebar.php'; ?>

  <div class="page-wrap">
    <div class="main-column">

      <!-- Header -->
      <?php include __DIR__ . '/../common/header.php'; ?>

      <!-- KPIs -->
      <div class="container">
        <?php include __DIR__ . '/../common/kpis.php'; ?>
      </div>

      <main class="main-content">
        <div class="container">

          <!-- Recent Users -->
          <section class="content-block">
            <div class="content-header">
              <h3>Recent Users</h3>
              <div class="controls">
                <input type="text" placeholder="Search users..." class="search-input" />
                <button class="btn-outline">🔍</button>
              </div>
            </div>

            <div class="table-wrap">
              <table class="user-table">
                <thead>
                  <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Loans</th>
                    <th>Joined</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="usersTable">

                </tbody>
              </table>
            </div>

            <br>
            <!-- ROUTE FIXED -->
            <a href="/admin/users" class="btn-primary manage-link">
              Manage Users
            </a>
          </section>

          <br>
          <section class="modules" id="modules">

          </section>

        </div>
      </main>
    </div>
  </div>

  <script>
    fetch('/finance-marketing/public/api/admin/dashboard.php')
      .then(res => res.json())
      .then(data => {

        /* ===== USERS TABLE ===== */
        const tbody = document.getElementById('usersTable');
        tbody.innerHTML = data.users.map(u => `
      <tr>
        <td>
          ${u.name}<br>
          <small>${u.email}</small>
        </td>
        <td>${u.role}</td>
        <td>
          <span class="badge badge-${u.status === 'Verified' ? 'green' : 'yellow'}">
            ${u.status}
          </span>
        </td>
        <td>${u.loans}</td>
        <td>${timeAgo(u.created_at)}</td>
        <td>⋯</td>
      </tr>
    `).join('');

        /* ===== MODULES ===== */
        const modules = document.getElementById('modules');
        modules.innerHTML = data.modules.map(m => `
      <div class="module-card">
        <h4>${m.title}</h4>
        <p>${m.description}</p>
        <a href="${m.url}" class="btn-primary">Open</a>
      </div>
    `).join('');
      });

    function timeAgo(date) {
      const seconds = Math.floor((new Date() - new Date(date)) / 1000);
      if (seconds < 3600) return Math.floor(seconds / 60) + ' min ago';
      if (seconds < 86400) return Math.floor(seconds / 3600) + ' hrs ago';
      return Math.floor(seconds / 86400) + ' days ago';
    }
  </script>

</body>

</html>