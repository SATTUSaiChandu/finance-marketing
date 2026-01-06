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
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/admin-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/admin/admin-users.css">

  <!-- SHARED UI COMPONENTS -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">


</head>

<body>

  <?php
  // Build sidebar links and include sidebar (same pattern as other pages)
  $sidebarLinks = [
    ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/admin/index.php'],
    ['key' => 'users', 'label' => 'Users', 'icon' => '👥', 'href' => '/finance-marketing/app/Views/admin/users.php'],

    ['key' => 'settings', 'label' => 'Settings', 'icon' => '⚙️', 'href' => '/finance-marketing/app/Views/admin/settings.php'],
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
                  <!-- SAMPLE ROWS (replace these with PHP loop to render DB rows) -->
                  <tr data-name="John Smith" data-role="borrower" data-status="verified" data-joined="2025-12-09T10:00:00Z">
                    <td class="user-cell">
                      <div class="user-row">
                        <div class="avatar">JS</div>
                        <div>
                          <div class="user-name">John Smith</div>
                          <div class="user-email">john@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td>Borrower</td>
                    <td><span class="badge badge-green">Verified</span></td>
                    <td>3</td>
                    <td>2 hours ago</td>
                    <td class="more">
                      <div class="more-menu">
                        <button class="more-toggle" aria-expanded="false">⋯</button>
                        <div class="menu" role="menu">
                          <a href="/finance-marketing/app/Views/admin/user-view.php?id=1" role="menuitem">View</a>
                          <a href="/finance-marketing/app/Views/admin/user-edit.php?id=1" role="menuitem">Edit</a>
                          <a href="#" role="menuitem" data-action="suspend" data-id="1">Suspend</a>
                          <a href="#" role="menuitem" data-action="delete" data-id="1">Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr data-name="Sarah Johnson" data-role="financier" data-status="pending" data-joined="2025-12-09T06:00:00Z">
                    <td class="user-cell">
                      <div class="user-row">
                        <div class="avatar">SJ</div>
                        <div>
                          <div class="user-name">Sarah Johnson</div>
                          <div class="user-email">sarah@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td>Financier</td>
                    <td><span class="badge badge-amber">Pending</span></td>
                    <td>0</td>
                    <td>4 hours ago</td>
                    <td class="more">
                      <div class="more-menu">
                        <button class="more-toggle" aria-expanded="false">⋯</button>
                        <div class="menu" role="menu">
                          <a href="/finance-marketing/app/Views/admin/user-view.php?id=2">View</a>
                          <a href="/finance-marketing/app/Views/admin/user-edit.php?id=2">Edit</a>
                          <a href="#" data-action="suspend" data-id="2">Suspend</a>
                          <a href="#" data-action="delete" data-id="2">Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr data-name="Mike Wilson" data-role="borrower" data-status="verified" data-joined="2025-12-08T15:00:00Z">
                    <td class="user-cell">
                      <div class="user-row">
                        <div class="avatar">MW</div>
                        <div>
                          <div class="user-name">Mike Wilson</div>
                          <div class="user-email">mike@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td>Borrower</td>
                    <td><span class="badge badge-green">Verified</span></td>
                    <td>1</td>
                    <td>Yesterday</td>
                    <td class="more">
                      <div class="more-menu">
                        <button class="more-toggle" aria-expanded="false">⋯</button>
                        <div class="menu" role="menu">
                          <a href="/finance-marketing/app/Views/admin/user-view.php?id=3">View</a>
                          <a href="/finance-marketing/app/Views/admin/user-edit.php?id=3">Edit</a>
                          <a href="#" data-action="suspend" data-id="3">Suspend</a>
                          <a href="#" data-action="delete" data-id="3">Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr data-name="Emma Brown" data-role="financier" data-status="suspended" data-joined="2025-12-07T08:00:00Z">
                    <td class="user-cell">
                      <div class="user-row">
                        <div class="avatar">EB</div>
                        <div>
                          <div class="user-name">Emma Brown</div>
                          <div class="user-email">emma@example.com</div>
                        </div>
                      </div>
                    </td>
                    <td>Financier</td>
                    <td><span class="badge badge-red">Suspended</span></td>
                    <td>12</td>
                    <td>2 days ago</td>
                    <td class="more">
                      <div class="more-menu">
                        <button class="more-toggle" aria-expanded="false">⋯</button>
                        <div class="menu" role="menu">
                          <a href="/finance-marketing/app/Views/admin/user-view.php?id=4">View</a>
                          <a href="/finance-marketing/app/Views/admin/user-edit.php?id=4">Edit</a>
                          <a href="#" data-action="unsuspend" data-id="4">Unsuspend</a>
                          <a href="#" data-action="delete" data-id="4">Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <!-- Add more rows server-side via PHP loop -->
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
    /* CLIENT-SIDE SEARCH / FILTER / SORT / PAGINATION
   - Works with the sample rows above.
   - When you render rows from PHP, keep these attributes on <tr>:
     data-name (full name), data-role (borrower|financier|admin),
     data-status (verified|pending|suspended), data-joined (ISO timestamp)
*/

    (function() {
      const tbody = document.getElementById('usersTbody');
      let rows = Array.from(tbody.querySelectorAll('tr'));

      // controls
      const globalSearch = document.getElementById('globalSearch');
      const roleFilter = document.getElementById('roleFilter');
      const statusFilter = document.getElementById('statusFilter');
      const sortBy = document.getElementById('sortBy');

      // pagination
      const pageSize = 8;
      let currentPage = 1;
      const prevBtn = document.getElementById('prevPage');
      const nextBtn = document.getElementById('nextPage');
      const pageNumbersEl = document.getElementById('pageNumbers');

      // more menu toggles
      document.querySelectorAll('.more-menu').forEach(menuWrap => {
        const btn = menuWrap.querySelector('.more-toggle');
        const menu = menuWrap.querySelector('.menu');
        btn.addEventListener('click', (e) => {
          e.stopPropagation();
          // close other menus
          document.querySelectorAll('.more-menu .menu').forEach(m => {
            if (m !== menu) m.style.display = 'none';
          });
          menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
          btn.setAttribute('aria-expanded', menu.style.display === 'block' ? 'true' : 'false');
        });
      });

      // close menus on body click
      document.body.addEventListener('click', () => {
        document.querySelectorAll('.more-menu .menu').forEach(m => m.style.display = 'none');
        document.querySelectorAll('.more-toggle').forEach(b => b.setAttribute('aria-expanded', 'false'));
      });

      function applyFiltersAndRender() {
        const q = globalSearch.value.trim().toLowerCase();
        const role = roleFilter.value;
        const status = statusFilter.value;
        const sort = sortBy.value;

        // filter
        let filtered = rows.filter(row => {
          const name = (row.dataset.name || '').toLowerCase();
          const email = (row.querySelector('.user-email') ? row.querySelector('.user-email').textContent.toLowerCase() : '');
          const rowRole = (row.dataset.role || '').toLowerCase();
          const rowStatus = (row.dataset.status || '').toLowerCase();

          const matchesQ = !q || name.includes(q) || email.includes(q);
          const matchesRole = (role === 'all') || (rowRole === role);
          const matchesStatus = (status === 'all') || (rowStatus === status);

          return matchesQ && matchesRole && matchesStatus;
        });

        // sort
        filtered.sort((a, b) => {
          if (sort === 'joined_desc' || sort === 'joined_asc') {
            const da = new Date(a.dataset.joined || 0);
            const db = new Date(b.dataset.joined || 0);
            return (sort === 'joined_desc') ? (db - da) : (da - db);
          } else if (sort === 'name_az' || sort === 'name_za') {
            const na = (a.dataset.name || '').toLowerCase();
            const nb = (b.dataset.name || '').toLowerCase();
            return (sort === 'name_az') ? na.localeCompare(nb) : nb.localeCompare(na);
          }
          return 0;
        });

        // pagination
        const total = filtered.length;
        const pages = Math.max(1, Math.ceil(total / pageSize));
        if (currentPage > pages) currentPage = pages;

        // render page numbers
        pageNumbersEl.innerHTML = '';
        const startBtn = Math.max(1, currentPage - 2);
        const endBtn = Math.min(pages, startBtn + 4);
        for (let i = startBtn; i <= endBtn; i++) {
          const btn = document.createElement('button');
          btn.className = 'page-num';
          btn.textContent = i;
          if (i === currentPage) btn.classList.add('active');
          btn.addEventListener('click', () => {
            currentPage = i;
            applyFiltersAndRender();
          });
          pageNumbersEl.appendChild(btn);
        }
        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === pages;

        // show/hide rows
        tbody.querySelectorAll('tr').forEach(r => r.style.display = 'none');
        const start = (currentPage - 1) * pageSize;
        const pageRows = filtered.slice(start, start + pageSize);
        pageRows.forEach(r => {
          r.style.display = '';
        });

        // if none, show message
        if (total === 0) {
          if (!document.getElementById('noResults')) {
            const tr = document.createElement('tr');
            tr.id = 'noResults';
            tr.innerHTML = '<td colspan="6" style="padding:20px;text-align:center;color:#6b7280">No users found</td>';
            tbody.appendChild(tr);
          }
        } else {
          const nr = document.getElementById('noResults');
          if (nr) nr.remove();
        }
      }

      // attach
      globalSearch.addEventListener('input', () => {
        currentPage = 1;
        applyFiltersAndRender();
      });
      roleFilter.addEventListener('change', () => {
        currentPage = 1;
        applyFiltersAndRender();
      });
      statusFilter.addEventListener('change', () => {
        currentPage = 1;
        applyFiltersAndRender();
      });
      sortBy.addEventListener('change', () => {
        currentPage = 1;
        applyFiltersAndRender();
      });

      prevBtn.addEventListener('click', () => {
        if (currentPage > 1) {
          currentPage--;
          applyFiltersAndRender();
        }
      });
      nextBtn.addEventListener('click', () => {
        currentPage++;
        applyFiltersAndRender();
      });

      // initial render
      applyFiltersAndRender();
    })();
  </script>

</body>

</html>