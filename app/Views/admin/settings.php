<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Settings — Admin — FinanceHub</title>
  <!-- GLOBAL LAYOUT -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/layout/admin-layout.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/admin/admin-settings.css">

  <!-- SHARED UI COMPONENTS -->
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/sidebar.css">
  <link rel="stylesheet" href="/finance-marketing/public/assets/css/common/header.css">



</head>

<body>

  <!-- Sidebar (your existing include) -->
  <?php
  $sidebarLinks = [
    ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/finance-marketing/app/Views/admin/index.php'],
    ['key' => 'users', 'label' => 'Users', 'icon' => '👥', 'href' => '/finance-marketing/app/Views/Admin/users.php'],
    ['key' => 'settings', 'label' => 'Settings', 'icon' => '⚙️', 'href' => '#'],
  ];
  $active = 'settings';
  include __DIR__ . '/../common/sidebar.php';
  ?>


  <!-- Header -->

  <div class="page-wrap">
    <?php
    $pageTitle = "Settings";
    $pageSubtitle = "Manage subscriptions, terms & FAQs";
    $userName = "Admin";
    $userEmail = "admin@finance.com";
    $accountMenu = [
      ['label' => 'Home', 'href' => '/finance-marketing/app/Views/Dashboard/index.php'],
      ['label' => 'Logout', 'href' => '/finance-marketing/app/Views/Dashboard/index.php', 'class' => 'menu-logout'],
    ];
    include __DIR__ . '/../common/header.php';
    ?>



    <main class="main-content">
      <div class="container">

        <div class="settings-grid">

          <!-- LEFT SIDE — SUBSCRIPTIONS + FAQS -->
          <div>

            <!-- Subscription Plans -->
            <section class="panel">
              <h3>Subscription Plans</h3>
              <p class="muted">Edit plans — changes will later sync to database.</p>

              <div class="table-scroll">
                <table class="subs-table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Monthly</th>
                      <th>Access Details</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="subsTbody">
                    <tr>
                      <td>Free</td>
                      <td>0.00</td>
                      <td>Basic access</td>
                      <td><button class="btn-small edit-sub">Edit</button></td>
                    </tr>
                    <tr>
                      <td>Growth</td>
                      <td>49.00</td>
                      <td>Advanced analytics + vetted leads</td>
                      <td><button class="btn-small edit-sub">Edit</button></td>
                    </tr>
                    <tr>
                      <td>Pro</td>
                      <td>199.00</td>
                      <td>API access + dedicated support</td>
                      <td><button class="btn-small edit-sub">Edit</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <button id="btnAddPlan" class="btn-primary" style="margin-top:12px;">Add New Plan</button>
            </section>

            <!-- FAQs -->
            <section class="panel" style="margin-top:20px;">
              <h3>FAQs</h3>
              <p class="muted">Frequently asked questions shown to users.</p>

              <div class="faq-list" id="faqList">
                <div class="faq-item">
                  <div>
                    <strong>How do I verify my account?</strong>
                    <div class="muted">Upload ID & proof of address.</div>
                  </div>
                  <div class="faq-actions">
                    <button class="btn-small">Edit</button>
                    <button class="btn-small">Delete</button>
                  </div>
                </div>

                <div class="faq-item">
                  <div>
                    <strong>How can I contact support?</strong>
                    <div class="muted">Email support@finance.com</div>
                  </div>
                  <div class="faq-actions">
                    <button class="btn-small">Edit</button>
                    <button class="btn-small">Delete</button>
                  </div>
                </div>
              </div>

              <button id="btnAddFaq" class="btn-primary" style="margin-top:12px;">Add FAQ</button>
            </section>

          </div>

          <!-- RIGHT SIDE — TERMS & CONDITIONS -->
          <aside>
            <section class="panel">
              <h3>Terms & Conditions</h3>
              <p class="muted">Publish new versions. The newest one becomes active.</p>

              <textarea class="terms-editor" id="termsEditor">
# Terms & Conditions
1. Fake ads will not be tolerated.
2. Valid documents must be submitted.
                </textarea>

              <div class="row">
                <input type="text" id="newVersionLabel" class="tiny-input" placeholder="Version (v1.1)">
                <button class="btn-primary">Publish</button>
                <button class="btn-small" id="previewBtn">Preview</button>
              </div>

              <div class="versions">
                <strong>Version Log</strong>
                <div class="version-entry">v1.1 — Published 01/01/2025</div>
                <div class="version-entry">v1.0 — Initial release</div>
              </div>
            </section>
          </aside>

        </div>

      </div>
    </main>
  </div>

  <!-- Subscription Modal -->
  <div class="modal" id="modalSub">
    <div class="modal-inner">
      <h3>Edit Subscription</h3>

      <input class="input" id="subName" placeholder="Name">
      <input class="input" id="subMonthly" placeholder="Monthly Cost">
      <textarea class="input" id="subAccess" placeholder="Access details"></textarea>

      <div class="modal-actions">
        <button class="btn-small close-modal">Cancel</button>
        <button class="btn-primary">Save</button>
      </div>
    </div>
  </div>

  <!-- FAQ Modal -->
  <div class="modal" id="modalFaq">
    <div class="modal-inner">
      <h3>Edit FAQ</h3>

      <input class="input" id="faqQuestion" placeholder="Question">
      <textarea class="input" id="faqAnswer" placeholder="Answer"></textarea>

      <div class="modal-actions">
        <button class="btn-small close-modal">Cancel</button>
        <button class="btn-primary">Save FAQ</button>
      </div>
    </div>
  </div>

  <!-- Terms Preview Modal -->
  <div class="modal" id="modalPreview">
    <div class="modal-inner">
      <h3>Preview Terms</h3>
      <div id="previewContent" class="preview-box"></div>

      <div class="modal-actions">
        <button class="btn-small close-modal">Close</button>
      </div>
    </div>
  </div>

  <script>
    /* Only UI behavior; backend comes later */

    document.querySelectorAll(".close-modal").forEach(btn => {
      btn.onclick = () => btn.closest(".modal").classList.remove("open");
    });

    document.getElementById("previewBtn").onclick = () => {
      const modal = document.getElementById("modalPreview");
      document.getElementById("previewContent").textContent =
        document.getElementById("termsEditor").value;
      modal.classList.add("open");
    };
  </script>

</body>

</html>