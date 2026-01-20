<?php

require_once __DIR__ . '/BaseController.php';

class AdminController extends BaseController
{
  /**
   * Admin Dashboard
   * Route: /admin
   */
  public function index()
  {
    $data = [
      'pageTitle'    => 'Admin Dashboard',
      'pageSubtitle' => 'Administration',

      'userName'  => 'Admin',
      'userEmail' => 'admin@finance.com',

      'sidebarLinks' => [
        ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/admin'],
        ['key' => 'users',     'label' => 'Users',     'icon' => '👥', 'href' => '/admin/users'],
        ['key' => 'settings',  'label' => 'Settings',  'icon' => '⚙️', 'href' => '/admin/settings'],
      ],

      'active' => 'dashboard',

      'accountMenu' => [
        ['label' => 'Profile', 'href' => '/admin/profile'],
        ['label' => 'Logout',  'href' => '/auth/logout', 'class' => 'menu-logout'],
      ],
    ];

    $this->view('admin/index', $data);
  }

  /**
   * User Management
   * Route: /admin/users
   */
  public function users()
  {
    $data = [
      'pageTitle'    => 'Users',
      'pageSubtitle' => 'Manage platform users',

      'userName'  => 'Admin',
      'userEmail' => 'admin@finance.com',

      'sidebarLinks' => [
        ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/admin'],
        ['key' => 'users',     'label' => 'Users',     'icon' => '👥', 'href' => '/admin/users'],
        ['key' => 'settings',  'label' => 'Settings',  'icon' => '⚙️', 'href' => '/admin/settings'],
      ],

      'active' => 'users',

      'accountMenu' => [
        ['label' => 'Profile', 'href' => '/admin/profile'],
        ['label' => 'Logout',  'href' => '/auth/logout', 'class' => 'menu-logout'],
      ],
    ];

    $this->view('admin/users', $data);
  }

  /**
   * Admin Settings
   * Route: /admin/settings
   */
  public function settings()
  {
    $data = [
      'pageTitle'    => 'Settings',
      'pageSubtitle' => 'System configuration',

      'userName'  => 'Admin',
      'userEmail' => 'admin@finance.com',

      'sidebarLinks' => [
        ['key' => 'dashboard', 'label' => 'Dashboard', 'icon' => '📊', 'href' => '/admin'],
        ['key' => 'users',     'label' => 'Users',     'icon' => '👥', 'href' => '/admin/users'],
        ['key' => 'settings',  'label' => 'Settings',  'icon' => '⚙️', 'href' => '/admin/settings'],
      ],

      'active' => 'settings',

      'accountMenu' => [
        ['label' => 'Profile', 'href' => '/admin/profile'],
        ['label' => 'Logout',  'href' => '/auth/logout', 'class' => 'menu-logout'],
      ],
    ];

    $this->view('admin/settings', $data);
  }
}
