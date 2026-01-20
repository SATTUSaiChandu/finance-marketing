<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>FinanceHub — Verification Dashboard</title>

  <!-- Font (optional) -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/agent-layout.css">

  <link rel="stylesheet" href="/finance-marketing/public/assets/css/agent/agent-dashboard.css" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css" />
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css" />
</head>

<body>
  <!-- =======================================
       FIXED SIDEBAR
       ======================================= -->

  <?php
  $sidebarLinks = [
    [
      'key'   => 'dashboard',
      'label' => 'Dashboard',
      'icon'  => '🏠',
      'href'  => '/finance-marketing/app/Views/agent/index.php',
    ],
    [
      'key'   => 'history',
      'label' => 'History',
      'icon'  => '📊',
      'href'  => '/finance-marketing/app/Views/agent/history.php',
    ],

  ];

  $active = 'dashboard';

  include __DIR__ . '/../common/sidebar.php';
  ?>

  <!-- =======================================
       PAGE WRAP (SHIFTED RIGHT)
       ======================================= -->
  <div class="page-wrap">
    <!-- ===== Sticky fixed-height header ===== -->
    <?php
    $pageTitle     = "Verification Dashboard";
    $pageSubtitle  = "Agent";


    $userName  = "Agent";
    $userEmail = "agent@finance.com";
    $accountMenu = [
      ['label' => 'Home', 'href' => '/finance-marketing/app/Views/Dashboard/index.php'],
      ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
    ];

    include __DIR__ . '/../common/header.php';
    ?>

    <!-- =======================================
         MAIN CONTENT + RIGHT COLUMN
         ======================================= -->
    <main class="main-content">
      <!-- Tabs + time filter -->
      <section class="controls">
        <div class="tabs" role="tablist" aria-label="Application status">
          <button class="tab active" data-status="pending" role="tab">
            Pending
          </button>
          <button class="tab" data-status="inprogress" role="tab">
            In Progress
          </button>
          <button class="tab" data-status="completed" role="tab">
            Completed
          </button>
        </div>

        <div class="time-filter">
          <label for="timeFilter">Filter by time</label>
          <select id="timeFilter" aria-label="Filter by application time">
            <option value="all">All</option>
            <option value="24h">Last 24 hours</option>
            <option value="7d">Last 7 days</option>
            <option value="older">Older</option>
          </select>
        </div>
      </section>

      <!-- Roomy cards + pagination -->
      <section class="list-block">
        <div id="reviewList" class="list">
          <!-- SAMPLE CARDS — later you’ll output these with PHP -->
          <article
            class="review-card"
            data-status="pending"
            data-time="2025-12-09T22:00:00Z">
            <div class="avatar-sm">AC</div>
            <div class="meta">
              <div class="name">Alice Cooper</div>
              <div class="submitted">Submitted 2 hours ago</div>
              <div class="summary">
                New borrower application — check ID &amp; employment proof.
              </div>
            </div>
            <div class="actions">
              <button class="btn-outline">Review</button>
              <button class="btn-primary">Verify</button>
              <button class="btn-danger">✕</button>
            </div>
          </article>

          <article
            class="review-card"
            data-status="pending"
            data-time="2025-12-09T20:00:00Z">
            <div class="avatar-sm">BM</div>
            <div class="meta">
              <div class="name">Bob Martin</div>
              <div class="submitted">Submitted 4 hours ago</div>
              <div class="summary">
                Financier — pending validation of bank statement.
              </div>
            </div>
            <div class="actions">
              <button class="btn-outline">Review</button>
              <button class="btn-primary">Verify</button>
              <button class="btn-danger">✕</button>
            </div>
          </article>

          <article
            class="review-card"
            data-status="pending"
            data-time="2025-12-09T18:30:00Z">
            <div class="avatar-sm">JR</div>
            <div class="meta">
              <div class="name">Julia Roberts</div>
              <div class="submitted">Submitted 5 hours ago</div>
              <div class="summary">
                Borrower — verify address against utility bill.
              </div>
            </div>
            <div class="actions">
              <button class="btn-outline">Review</button>
              <button class="btn-primary">Verify</button>
              <button class="btn-danger">✕</button>
            </div>
          </article>

          <article
            class="review-card"
            data-status="inprogress"
            data-time="2025-12-08T12:00:00Z">
            <div class="avatar-sm">CW</div>
            <div class="meta">
              <div class="name">Carol White</div>
              <div class="submitted">Submitted Yesterday</div>
              <div class="summary">
                In progress — waiting for updated payslip.
              </div>
            </div>
            <div class="actions">
              <button class="btn-outline">Review</button>
              <button class="btn-primary">Verify</button>
              <button class="btn-danger">✕</button>
            </div>
          </article>

          <article
            class="review-card"
            data-status="completed"
            data-time="2025-12-01T09:30:00Z">
            <div class="avatar-sm">DL</div>
            <div class="meta">
              <div class="name">David Lee</div>
              <div class="submitted">Submitted 9 days ago</div>
              <div class="summary">
                Completed — application verified and approved.
              </div>
            </div>
            <div class="actions">
              <button class="btn-outline">Review</button>
              <button class="btn-primary">Verify</button>
              <button class="btn-danger">✕</button>
            </div>
          </article>

          <article
            class="review-card"
            data-status="completed"
            data-time="2025-11-28T14:00:00Z">
            <div class="avatar-sm">MS</div>
            <div class="meta">
              <div class="name">Maria Sanchez</div>
              <div class="submitted">Submitted 12 days ago</div>
              <div class="summary">
                Completed — rejected; mismatched income details.
              </div>
            </div>
            <div class="actions">
              <button class="btn-outline">Review</button>
              <button class="btn-primary">Verify</button>
              <button class="btn-danger">✕</button>
            </div>
          </article>
        </div>

        <!-- Pagination controls -->
        <div class="pagination" id="pagination">
          <button class="page-btn" id="prevPage" aria-label="Previous page">
            Prev
          </button>
          <div id="pageNumbers" class="page-numbers"></div>
          <button class="page-btn" id="nextPage" aria-label="Next page">
            Next
          </button>
        </div>
      </section>
    </main>

    <!-- Right column: quick guidelines card -->
    <aside class="rightcol">
      <div class="guidelines">
        <h3>Quick Guidelines</h3>
        <ul>
          <li>Verify photo ID matches profile</li>
          <li>Check document dates are current</li>
          <li>Ensure income matches bank statements</li>
        </ul>
        <button id="openGuidelines" class="btn-outline full">
          View Full Guidelines
        </button>
      </div>
    </aside>
  </div>

  <!-- =======================================
       FULL GUIDELINES SLIDE PANEL
       ======================================= -->
  <aside id="guidelinesPanel" class="guidelines-panel" aria-hidden="true">
    <div class="guidelines-panel-inner">
      <div class="guidelines-panel-header">
        <h2>Full Guidelines</h2>
        <button id="collapseGuidelines" class="btn-outline">Collapse</button>
      </div>
      <div class="guidelines-panel-body">
        <h4>Verification checklist</h4>
        <ol>
          <li>
            Confirm full name, date of birth, and photo match the submitted
            ID.
          </li>
          <li>
            Check that ID issue and expiry dates are valid and believable.
          </li>
          <li>
            Compare address on file with the address on utility or bank
            statement.
          </li>
          <li>
            Verify income lines against bank statements (minimum 3 months).
          </li>
          <li>
            Flag any mismatches and add a short note for the audit trail.
          </li>
          <li>
            Use pre-defined templates for rejection or additional-doc
            requests.
          </li>
        </ol>

        <h4>Notes</h4>
        <p>
          Always keep a clear log of actions (Review, Verify, Reject) with
          timestamp and agent name. If anything looks suspicious, escalate the
          case to a senior reviewer instead of approving or rejecting
          directly.
        </p>
      </div>
    </div>
  </aside>

  <!-- =======================================
       JS: Tabs + time filter + pagination
       ======================================= -->
  <script>
    (function() {
      const tabs = Array.from(document.querySelectorAll(".tab"));
      const timeSelect = document.getElementById("timeFilter");
      const list = document.getElementById("reviewList");
      const allCards = Array.from(list.querySelectorAll(".review-card"));

      const prevBtn = document.getElementById("prevPage");
      const nextBtn = document.getElementById("nextPage");
      const pageNumbersEl = document.getElementById("pageNumbers");

      let currentPage = 1;
      const pageSize = 4; // cards per page

      function filterCards() {
        const activeStatus = tabs
          .find((t) => t.classList.contains("active"))
          .getAttribute("data-status");
        const timeFilter = timeSelect.value;
        const now = new Date();

        return allCards.filter((card) => {
          const status = card.getAttribute("data-status");
          if (status !== activeStatus) return false;

          if (timeFilter === "all") return true;

          const t = new Date(card.getAttribute("data-time"));
          const diffHours = (now - t) / (1000 * 60 * 60);

          if (timeFilter === "24h") return diffHours <= 24;
          if (timeFilter === "7d") return diffHours <= 24 * 7;
          if (timeFilter === "older") return diffHours > 24 * 7;

          return true;
        });
      }

      function renderPagination(filtered) {
        const total = filtered.length;
        const pages = Math.max(1, Math.ceil(total / pageSize));
        if (currentPage > pages) currentPage = pages;

        pageNumbersEl.innerHTML = "";

        const maxButtons = 7;
        const start = Math.max(1, currentPage - Math.floor(maxButtons / 2));
        const end = Math.min(pages, start + maxButtons - 1);

        for (let i = start; i <= end; i++) {
          const btn = document.createElement("button");
          btn.className = "page-num";
          btn.textContent = i;
          btn.dataset.page = i;
          if (i === currentPage) btn.classList.add("active");
          btn.addEventListener("click", function() {
            currentPage = i;
            applyFiltersAndPaginate();
          });
          pageNumbersEl.appendChild(btn);
        }

        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === pages;
      }

      function showPage(filtered) {
        allCards.forEach((card) => {
          card.style.display = "none";
        });

        const start = (currentPage - 1) * pageSize;
        const visible = filtered.slice(start, start + pageSize);
        visible.forEach((card) => {
          card.style.display = "";
        });
      }

      function applyFiltersAndPaginate() {
        const filtered = filterCards();
        if (filtered.length === 0) currentPage = 1;
        renderPagination(filtered);
        showPage(filtered);
      }

      // Tab events
      tabs.forEach((tab) => {
        tab.addEventListener("click", function() {
          tabs.forEach((t) => t.classList.remove("active"));
          this.classList.add("active");
          currentPage = 1;
          applyFiltersAndPaginate();
        });
      });

      // Time filter change
      timeSelect.addEventListener("change", function() {
        currentPage = 1;
        applyFiltersAndPaginate();
      });

      // Pagination buttons
      prevBtn.addEventListener("click", function() {
        if (currentPage > 1) {
          currentPage--;
          applyFiltersAndPaginate();
        }
      });

      nextBtn.addEventListener("click", function() {
        currentPage++;
        applyFiltersAndPaginate();
      });

      // Initial render
      applyFiltersAndPaginate();
    })();

    // Guidelines panel open / collapse
    (function() {
      const openBtn = document.getElementById("openGuidelines");
      const collapseBtn = document.getElementById("collapseGuidelines");
      const panel = document.getElementById("guidelinesPanel");

      openBtn.addEventListener("click", function() {
        panel.classList.add("open");
        panel.setAttribute("aria-hidden", "false");
      });

      collapseBtn.addEventListener("click", function() {
        panel.classList.remove("open");
        panel.setAttribute("aria-hidden", "true");
      });
    })();
  </script>
</body>

</html>