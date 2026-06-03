<?php
// Start session so we can read $_SESSION data saved by kadai06_4.php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>php1 - kadai06_3</title>
</head>

<body>

  <header class="bg-info">
    <div class="text-light ms-5 pt-5 pb-3">
      <h1 class="h6">サーバーサイドスクリプト演習１</h1>
      <h2 class="pt-3">セッション</h2>
    </div>
  </header>

  <main>
    <div class="form-control">

      <!-- Send to kadai06_4.php via POST -->
      <form action="kadai06_4.php" method="POST" novalidate>
        <div class="p-5 row">
          <div class="col mh-100">
            <label class="form-label" for="comment">コメント</label>

            <!--
              If $_SESSION['old'] exists (set by kadai06_4.php),
              restore the previous input inside the textarea.
              ?? '' prevents null warning if session key doesn't exist yet.
            -->
            <textarea
              name="comment"
              id="comment"
              class="form-control form-control-lg border-info"
              rows="7"><?= htmlspecialchars($_SESSION['old'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>

          </div>
        </div>

        <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="submit" class="btn btn-danger btn-lg">入力内容の確認</button>
        </div>
      </form>

    </div>
  </main>

</body>
</html>