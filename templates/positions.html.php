<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChessCoach — Positions</title>
    <meta name="description" content="Explained in terms of chess concepts: Center, space, outpost squares, forks, pins, pressure, connectivity of the pieces, direct opposition, bad bishops, king safety, piece protection, and more!">

    <meta property="og:title" content="ChessCoach — Positions">
    <meta property="og:description" content="Explained in terms of chess concepts: Center, space, outpost squares, forks, pins, pressure, connectivity of the pieces, direct opposition, bad bishops, king safety, piece protection, and more!">
    <meta property="og:url" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/positions">
    <meta property="og:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/cover.jpg">
    <meta property="og:site_name" content="ChessCoach">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="ChessCoach — Positions">
    <meta name="twitter:description" content="Explained in terms of chess concepts: Center, space, outpost squares, forks, pins, pressure, connectivity of the pieces, direct opposition, bad bishops, king safety, piece protection, and more!">
    <meta name="twitter:site" content="@programarivm">
    <meta name="twitter:image" content="<?php echo $scheme; ?>://<?php echo $host; ?>:<?php echo $port; ?>/cover.jpg">
    <meta name="twitter:creator" content="@programarivm">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/spinner.css">
  </head>
  <body>
    <div id="spinner"></div>
    <?php require __DIR__ . '/partial/nav.html.php'; ?>

    <div class="container my-4">
      <div class="row p-3">
        <div class="col-lg-8 px-0">
          <article>
            <h1>Positions</h1>
            <p class="fs-5 fw-bold">
              Explained in terms of concepts like a chess tutor would do
            </p>
            <p>
              Center, space, outpost squares, forks, pins, pressure, connectivity
              of the pieces, direct opposition, bad bishops, king safety, piece
              protection, and more! ChessCoach can spot weaknesses in the pawn
              structure like isolated pawns, backward pawns and doubled pawns.
            </p>
            <form id="gameForm">
              <label for="game" class="form-label"><b>Enter a position in FEN format</b>:</label>
              <div class="input-group mb-3">
                <input type="text" id="game" class="form-control" placeholder="e.g. 8/5k2/4n3/8/8/1BK5/1B6/8 w - - 0 1" spellcheck="false">
                <button id="submitBtn" class="btn btn-primary" type="submit" title="ChessCoach me!">
                  <i class="bi bi-chat-square-text"></i>
                </button>
              </div>
            </form>
            <div id="chessboard" class="text-center mb-3"></div>
            <div id="tutor" class="alert alert-primary" role="alert">
            </div>
          </article>
        </div>
        <div class="col-lg-4 p-5">
          <?php require __DIR__ . '/partial/social.html.php'; ?>
        </div>
      </div>
    </div>

    <div class="container">
      <?php require __DIR__ . '/partial/footer.html.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script id="theScript" src="assets/js/positions.js" data-scheme="<?php echo $scheme; ?>" data-host="<?php echo $host; ?>" data-port="<?php echo $port; ?>"></script>
  </body>
</html>
