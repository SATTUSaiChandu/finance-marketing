<?php

require_once __DIR__ . '/../Models/Document.php';

trait HandlesDocuments
{
  protected function uploadDocumentForUser(string $redirectBase): void
  {
    $user = Auth::user();

    if (!isset($_FILES['document'])) {
      $_SESSION['error'] = 'No file uploaded';
      header("Location: {$redirectBase}?tab=documents");
      exit;
    }

    $file = $_FILES['document'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
      $_SESSION['error'] = 'Upload failed';
      header("Location: {$redirectBase}?tab=documents");
      exit;
    }

    $allowed = ['pdf', 'jpg', 'jpeg', 'png'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed, true)) {
      $_SESSION['error'] = 'Invalid file type';
      header("Location: {$redirectBase}?tab=documents");
      exit;
    }

    $dir = __DIR__ . '/../../public/uploads/' . $user['id'];
    if (!is_dir($dir)) {
      mkdir($dir, 0777, true);
    }

    $name = uniqid('doc_', true) . '.' . $ext;
    move_uploaded_file($file['tmp_name'], "{$dir}/{$name}");

    Document::upload(
      $user['id'],
      null,
      $_POST['doc_type'] ?? 'general',
      $_POST['title'] ?? 'Document',
      "/uploads/{$user['id']}/{$name}"
    );

    $_SESSION['success'] = 'Document uploaded successfully';
    header("Location: {$redirectBase}?tab=documents");
    exit;
  }
}
