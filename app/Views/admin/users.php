<?php
// app/Views/admin/users.php
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Users — Admin — FinanceHub</title>

  <!-- use your existing admin css (adjust path if required) -->
  <!-- GLOBAL LAYOUT -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/admin/admin-users.css">

  <!-- SHARED UI COMPONENTS -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">


</head>

<body>

  <?php
  // Build sidebar links and include sidebar (same pattern as other pages)
  $sidebarLinks = [
    ['key' => 'dashboard', 'href' => '/admin'],
    ['key' => 'users', 'href' => '/admin/users'],
    ['key' => 'settings', 'href' => '/admin/settings'],

  ];
  $active = 'users';
  include __DIR__ . '/../common/sidebar.php';
  ?>

  <div class="page-wrap">

    <?php
    $pageTitle = "Users";
    $pageSubtitle = "Manage platform users";
    $userName = "Admin";
    $userEmail = "admin@finance.com";
    $accountMenu = [
      ['label' => 'Home', 'href' => '/finance-marketing/app/Views/Dashboard/index.php'],
      ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
    ];
    include __DIR__ . '/../common/header.php';
    ?>

    <main class="main-content">
      <div class="user-page">
        <div class="container">

          <!-- Header controls -->
          <section class="content-area" aria-labelledby="users-title">
            <div class="content-header">



              <div class="controls-row">
                <input id="globalSearch" type="text" placeholder="Search users by name or email..." class="search-input" aria-label="Search users" />

                <select id="roleFilter" class="filter-select" aria-label="Filter by role">
                  <option value="all">All roles</option>
                  <option value="borrower">Borrower</option>
                  <option value="financier">Financier</option>

                </select>

                <select id="statusFilter" class="filter-select" aria-label="Filter by status">
                  <option value="all">All statuses</option>
                  <option value="verified">Verified</option>
                  <option value="pending">Pending</option>
                  <option value="suspended">Suspended</option>
                </select>

                <select id="sortBy" class="filter-select" aria-label="Sort by">
                  <option value="joined_desc">Joined (Newest)</option>
                  <option value="joined_asc">Joined (Oldest)</option>
                  <option value="name_az">Name A → Z</option>
                  <option value="name_za">Name Z → A</option>
                </select>


              </div>
            </div>

            <!-- Table -->
            <div class="table-wrap" role="region" aria-label="Users table">
              <table class="user-table" cellspacing="0" cellpadding="0" role="table" aria-label="Users">
                <thead>
                  <tr>
                    <th scope="col">User</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Loans</th>
                    <th scope="col">Joined</th>
                    <th scope="col" style="width:80px"></th>
                  </tr>
                </thead>
                <tbody id="usersTbody">


                </tbody>
              </table>
            </div>

            <!-- Pagination controls -->
            <div class="pagination" style="margin-top:18px;">
              <button id="prevPage" class="page-btn" aria-label="Previous page">Prev</button>
              <div id="pageNumbers" class="page-numbers" style="display:inline-flex; gap:8px;"></div>
              <button id="nextPage" class="page-btn" aria-label="Next page">Next</button>
            </div>
          </section>

        </div> <!-- /.container -->
      </div>
    </main>

  </div> <!-- /.page-wrap -->
  <script>
    fetch('/api/admin/users.php')
      .then(res => res.json())
      .then(users => {
        const tbody = document.getElementById('usersTbody');

        tbody.innerHTML = users.map(u => {
          const initials = u.name.split(' ').map(p => p[0]).join('').slice(0, 2).toUpperCase();
          const badgeClass =
            u.status === 'verified' ? 'badge-green' :
            u.status === 'pending' ? 'badge-amber' :
            'badge-red';

          return `
        <tr 
          data-name="${u.name}"
          data-role="${u.role}"
          data-status="${u.status}"
          data-joined="${u.created_at}"
        >
          <td class="user-cell">
            <div class="user-row">
              <div class="avatar">${initials}</div>
              <div>
                <div class="user-name">${u.name}</div>
                <div class="user-email">${u.email}</div>
              </div>
            </div>
          </td>

          <td>${capitalize(u.role)}</td>

          <td>
            <span class="badge ${badgeClass}">
              ${capitalize(u.status)}
            </span>
          </td>

          <td>${u.loans}</td>

          <td>${timeAgo(u.created_at)}</td>

          <td class="more">
            <div class="more-menu">
              <button class="more-toggle" aria-expanded="false">⋯</button>
              <div class="menu" role="menu">
                <a href="/admin/users/view?id=${u.id}">View</a>
                <a href="/admin/users/edit?id=${u.id}">Edit</a>
                ${u.status !== 'suspended'
                  ? `<a href="#" data-action="suspend" data-id="${u.id}">Suspend</a>`
                  : `<a href="#" data-action="unsuspend" data-id="${u.id}">Unsuspend</a>`
                }
                <a href="#" data-action="delete" data-id="${u.id}">Delete</a>
              </div>
            </div>
          </td>
        </tr>
      `;
        }).join('');

        /* re-bind menu toggles after dynamic insert */
        document.querySelectorAll('.more-menu').forEach(menuWrap => {
          const btn = menuWrap.querySelector('.more-toggle');
          const menu = menuWrap.querySelector('.menu');
          btn.addEventListener('click', (e) => {
            e.stopPropagation();
            document.querySelectorAll('.more-menu .menu').forEach(m => {
              if (m !== menu) m.style.display = 'none';
            });
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            btn.setAttribute('aria-expanded', menu.style.display === 'block');
          });
        });

      });

    function capitalize(str) {
      return str.charAt(0).toUpperCase() + str.slice(1);
    }

    function timeAgo(date) {
      const seconds = Math.floor((new Date() - new Date(date)) / 1000);
      if (seconds < 3600) return Math.floor(seconds / 60) + ' min ago';
      if (seconds < 86400) return Math.floor(seconds / 3600) + ' hrs ago';
      return Math.floor(seconds / 86400) + ' days ago';
    }
  </script>


</body>

</html>