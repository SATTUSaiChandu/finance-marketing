<?php
require_once 'LoanRequest.php';
require_once 'Wishlist.php';
require_once 'Investment.php';

class Financier
{
  public static function dashboardStats(int $financierId): array
  {
    return [
      'available'      => count(LoanRequest::verified()),
      'wishlist'       => Wishlist::count($financierId),
      'active_loans'   => Investment::activeCount($financierId),
      'total_invested' => Investment::totalInvested($financierId),
    ];
  }

  public static function recentApplications(int $limit = 5): array
  {
    return LoanRequest::recentVerified($limit);
  }
}
