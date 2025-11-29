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

<!--ge-debug ge-extra-info-->

<body class=''>
      <div class="ge-container ge-preview">
            <div class="ge-row">

                  <!-- Left Column -->
                  <div class="ge-col-3 ge-col-lg-4 ge-col-md-6 ge-col-sm-12">
                        <small class='col-info'>[Default:3] [lg:4] [md:6] [sm:12]</small>
                  </div>

                  <!-- Center Column with Nested Grid -->
                  <div class="ge-col-6 ge-col-lg-4 ge-col-md-12 ge-col-sm-12">
                        <small class='col-info'>[Default:6] [lg:4] [md:12] [sm:12]</small>
                        <div class="ge-row">
                              <!-- Nested: Full Width -->
                              <div class="ge-col-12 ge-col-lg-12 ge-col-md-12 ge-col-sm-12">
                                    <small class='col-info'>[Default:12] [lg:12] [md:12] [sm:12]</small>
                              </div>

                              <!-- Nested Column 2 -->
                              <div class="ge-col-9 ge-col-md-6 ge-col-sm-12">
                                    <small class='col-info'>[Default:9] [md:6] [sm:12]</small>
                              </div>

                              <!-- Nested Column 3 -->
                              <div class="ge-col-3 ge-col-md-6 ge-col-sm-12">
                                    <small class='col-info'>[Default:3] [md:6] [sm:12]</small>
                              </div>

                        </div>
                  </div>

                  <!-- Right Column -->
                  <div class="ge-col-3 ge-col-lg-4 ge-col-md-6 ge-col-sm-12">
                        <small class='col-info'>[Default:3] [lg:4] [md:6] [sm:12]</small>
                  </div>

            </div>

            <div class="ge-row">

                  <!-- Left Column -->
                  <div class="ge-col-3 ge-col-lg-4 ge-col-md-6 ge-col-sm-12">
                        <small class='col-info'>[Default:3] [lg:4] [md:6] [sm:12]</small>
                  </div>

                  <!-- Center Column with Nested Grid -->
                  <div class="ge-col-6 ge-col-lg-4 ge-col-md-12 ge-col-sm-12">
                        <small class='col-info'>[Default:6] [lg:4] [md:12] [sm:12]</small>
                        <div class="ge-row">
                              <!-- Nested: Full Width -->
                              <div class="ge-col-12 ge-col-lg-12 ge-col-md-12 ge-col-sm-12">
                                    <small class='col-info'>[Default:12] [lg:12] [md:12] [sm:12]</small>
                              </div>

                              <!-- Nested Column 2 -->
                              <div class="ge-col-9 ge-col-md-6 ge-col-sm-12">
                                    <small class='col-info'>[Default:9] [md:6] [sm:12]</small>
                              </div>

                              <!-- Nested Column 3 -->
                              <div class="ge-col-3 ge-col-md-6 ge-col-sm-12">
                                    <small class='col-info'>[Default:3] [md:6] [sm:12]</small>
                              </div>

                        </div>
                  </div>

                  <!-- Right Column -->
                  <div class="ge-col-3 ge-col-lg-4 ge-col-md-6 ge-col-sm-12">
                        <small class='col-info'>[Default:3] [lg:4] [md:6] [sm:12]</small>
                  </div>

            </div>

            <div class="ge-row">

                  <!-- Left Column -->
                  <div class="ge-col-3 ge-col-lg-4 ge-col-md-6 ge-col-sm-12">
                        <small class='col-info'>[Default:3] [lg:4] [md:6] [sm:12]</small>
                  </div>

                  <!-- Center Column with Nested Grid -->
                  <div class="ge-col-6 ge-col-lg-4 ge-col-md-12 ge-col-sm-12">
                        <small class='col-info'>[Default:6] [lg:4] [md:12] [sm:12]</small>
                        <div class="ge-row">
                              <!-- Nested: Full Width -->
                              <div class="ge-col-12 ge-col-lg-12 ge-col-md-12 ge-col-sm-12">
                                    <small class='col-info'>[Default:12] [lg:12] [md:12] [sm:12]</small>
                              </div>

                              <!-- Nested Column 2 -->
                              <div class="ge-col-9 ge-col-md-6 ge-col-sm-12">
                                    <small class='col-info'>[Default:9] [md:6] [sm:12]</small>
                              </div>

                              <!-- Nested Column 3 -->
                              <div class="ge-col-3 ge-col-md-6 ge-col-sm-12">
                                    <small class='col-info'>[Default:3] [md:6] [sm:12]</small>
                              </div>

                        </div>
                  </div>

                  <!-- Right Column -->
                  <div class="ge-col-3 ge-col-lg-4 ge-col-md-6 ge-col-sm-12">
                        <small class='col-info'>[Default:3] [lg:4] [md:6] [sm:12]</small>
                  </div>

            </div>
      </div>


      <div id='debug_buttons'>
            <button id='toggle_debug'>Col</button>
            <button id='toggle_extra_info'>Extra Debug Info</button>
            <button id='toggle_col_info'>Col Info</button>
      </div>


      <script type="module" src="<?= asset('grid_engine.js') ?>"></script>
      <script nomodule src="<?= asset('grid_engine.js', 'nomodule') ?>"></script>

      <script type="module" src="<?= asset('main.js') ?>"></script>
      <script nomodule src="<?php echo asset('main.js', 'nomodule'); ?>"></script>
</body>

</html>