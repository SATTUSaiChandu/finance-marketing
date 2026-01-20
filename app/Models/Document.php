<?php

require_once __DIR__ . '/../Core/Database.php';

class Document
{
  /**
   * Required documents per role
   */
  public static function requiredForRole(string $role): array
  {
    if ($role === 'borrower') {
      return [
        'identity_proof',
        'address_proof',
        'income_proof',
        'bank_statement'
      ];
    }

    if ($role === 'financier') {
      return [
        'identity_proof',
        'company_registration',
        'bank_statement',
        'tax_declaration'
      ];
    }

    return [];
  }

  /**
   * Upload document
   */
  public static function upload(
    int $userId,
    ?int $loanRequestId,
    string $type,
    string $title,
    string $filePath
  ): void {
    $db = Database::get();

    $stmt = $db->prepare("
            INSERT INTO documents (user_id, loan_request_id, doc_type, title, file_path)
            VALUES (?, ?, ?, ?, ?)
        ");

    $stmt->execute([
      $userId,
      $loanRequestId,
      $type,
      $title,
      $filePath
    ]);
  }

  /**
   * Get all documents by user
   */
  public static function byUser(int $userId): array
  {
    $db = Database::get();

    $stmt = $db->prepare("
            SELECT *
            FROM documents
            WHERE user_id = ?
            ORDER BY uploaded_at DESC
        ");

    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Check if a specific document type is uploaded
   */
  public static function hasDocument(int $userId, string $docType): bool
  {
    $db = Database::get();

    $stmt = $db->prepare("
            SELECT 1
            FROM documents
            WHERE user_id = ?
              AND doc_type = ?
            LIMIT 1
        ");

    $stmt->execute([$userId, $docType]);
    return (bool) $stmt->fetchColumn();
  }

  /**
   * Get document status list (uploaded / missing)
   */
  public static function statusForUser(int $userId, string $role): array
  {
    $required = self::requiredForRole($role);
    $status = [];

    foreach ($required as $docType) {
      $status[$docType] = self::hasDocument($userId, $docType)
        ? 'uploaded'
        : 'missing';
    }

    return $status;
  }

  /**
   * Documents completion percentage
   */
  public static function completion(int $userId, string $role): int
  {
    $required = self::requiredForRole($role);

    if (empty($required)) {
      return 100;
    }

    $uploaded = 0;
    foreach ($required as $docType) {
      if (self::hasDocument($userId, $docType)) {
        $uploaded++;
      }
    }

    return (int) round(($uploaded / count($required)) * 100);
  }

  /**
   * Check if all required documents are uploaded
   */
  public static function isComplete(int $userId, string $role): bool
  {
    foreach (self::requiredForRole($role) as $docType) {
      if (!self::hasDocument($userId, $docType)) {
        return false;
      }
    }
    return true;
  }
}
