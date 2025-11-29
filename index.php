<?php
include_once __DIR__ . '/includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Grid Engine - Modern Grid Manager</title>
      <link rel="icon" href="/grid-engine/src/assets/images/grid-engine.svg" />
      <meta
            name="description"
            content="Create a mdern grid for your website and components" />
      <link rel="stylesheet" href="<?php echo asset('main.css'); ?>" />
      <link rel="stylesheet" href="<?php echo asset('grid_engine.css'); ?>" />
</head>

<body>
      <script type="module" src="<?= asset('grid_engine.js') ?>"></script>
      <script nomodule src="<?= asset('grid_engine.js', 'nomodule') ?>"></script>

      <script type="module" src="<?= asset('main.js') ?>"></script>
      <script nomodule src="<?php echo asset('main.js', 'nomodule'); ?>"></script>
</body>

</html>