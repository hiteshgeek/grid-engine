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
      content="Create a mdern grid for your website and components"
    />
    <link rel="stylesheet" href="<?php echo asset('main.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('grid_engine.css'); ?>" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
  </head>

  <!--ge-debug ge-extra-info-->

  <body class="">
    <div class="buttons-wrapper">
      <h2>Solid Button Variants</h2>
      <div class="demo-section">
        <button class="btn btn-primary">Primary</button>
        <button class="btn btn-secondary">Secondary</button>
        <button class="btn btn-success">Success</button>
        <button class="btn btn-danger">Danger</button>
        <button class="btn btn-warning">Warning</button>
        <button class="btn btn-info">Info</button>
        <button class="btn btn-light">Light</button>
        <button class="btn btn-dark">Dark</button>
      </div>

      <h2>Outline Button Variants</h2>
      <div class="demo-section">
        <button class="btn btn-outline-primary">Primary</button>
        <button class="btn btn-outline-secondary">Secondary</button>
        <button class="btn btn-outline-success">Success</button>
        <button class="btn btn-outline-danger">Danger</button>
        <button class="btn btn-outline-warning">Warning</button>
        <button class="btn btn-outline-info">Info</button>
        <button class="btn btn-outline-light">Light</button>
        <button class="btn btn-outline-dark">Dark</button>
      </div>

      <h2>Button Sizes</h2>
      <div class="demo-section">
        <button class="btn btn-primary btn-xs">Extra Small Button</button>
        <button class="btn btn-primary btn-sm">Small Button</button>
        <button class="btn btn-success">Default Button</button>
        <button class="btn btn-danger btn-lg">Large Button</button>
      </div>

      <h2>Block / Full Width Button</h2>
      <div class="demo-section" style="width: 300px">
        <button class="btn btn-primary btn-block">Block Button</button>
      </div>

      <h2>Icon Buttons</h2>
      <div class="demo-section">
        <button class="btn btn-primary btn-icon">
          <i class="fa fa-home"></i>
        </button>
        <button class="btn btn-success btn-icon">
          <i class="fa fa-check"></i>
        </button>
        <button class="btn btn-danger btn-icon">
          <i class="fa fa-trash"></i>
        </button>
        <button class="btn btn-warning btn-icon">
          <i class="fa fa-exclamation"></i>
        </button>
        <button class="btn btn-info btn-icon">
          <i class="fa fa-info"></i>
        </button>
      </div>

      <h2>Disabled Buttons</h2>
      <div class="demo-section">
        <button class="btn btn-primary" disabled>Primary Disabled</button>
        <button class="btn btn-outline-success" disabled>
          Outline Disabled
        </button>
        <button class="btn btn-dark disabled">Disabled Class</button>
      </div>
    </div>

    <div id="debug_buttons">
      <button id="toggle_debug">Col</button>
      <button id="toggle_extra_info">Extra Debug Info</button>
      <button id="toggle_col_info">Col Info</button>
    </div>

    <script type="module" src="<?= asset('grid_engine.js') ?>"></script>
    <script nomodule src="<?= asset('grid_engine.js', 'nomodule') ?>"></script>

    <script type="module" src="<?= asset('main.js') ?>"></script>
    <script nomodule src="<?php echo asset('main.js', 'nomodule'); ?>"></script>
  </body>
</html>
