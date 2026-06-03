<?php
session_start();

// ① If request is not POST → redirect back to input page
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: kadai06_3.php');
    exit;
}

// Get comment from POST data
$comment = $_POST['comment'] ?? '';

// Save comment to session so kadai06_3.php can restore it later
$_SESSION['old'] = $comment;

// Get current session ID to display
$session_id = session_id();

// XSS protection first, then convert newlines to <br>
// Order matters:
//   1. htmlspecialchars → converts < > & " to safe entities
//   2. nl2br           → converts \n to <br> tag
// If reversed, the <br> tag itself would get escaped and show as text
$comment_display = nl2br(htmlspecialchars($comment, ENT_QUOTES, 'UTF-8'));
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>php1 - kadai06_4</title>
</head>

<body>

  <header class="bg-info">
    <div class="text-light ms-5 pt-5 pb-3">
      <h1 class="h6">サーバーサイドスクリプト演習１</h1>
      <h2 class="pt-3">セッション</h2>
    </div>
  </header>

  <main>
    <div class="">

      <!-- Display session ID -->
      <div class="px-5 pt-5 row">
        <label class="form-label">ID</label>
        <p class="form-control form-control-lg border-info">
          <?= htmlspecialchars($session_id, ENT_QUOTES, 'UTF-8') ?>
        </p>
      </div>

      <!-- Display comment (XSS-safe, newlines converted to <br>) -->
      <div class="px-5 row">
        <label class="form-label">コメント</label>
        <p class="form-control form-control-lg border-info">
          <?= $comment_display ?>
        </p>
      </div>

      <!-- Back button → goes back to kadai06_3.php -->
      <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-secondary btn-lg" href="kadai06_3.php">入力に戻る</a>
      </div>

    </div>
  </main>

</body>
</html>