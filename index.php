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

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<!--ge-debug ge-extra-info-->

<body class=''>
      <div id="grid_demo">
            <div class="tabs-wrapper grid-group-tabs">
                  <div class="tabs tabs-underline" id="grid_tabs">
                        <button class="active" data-tab="even_columns">Even Columns<span class="badge">5</span></button>
                        <button data-tab="uneven_columns">Uneven Columns<span class="badge">5</span></button>
                        <button data-tab="split_columns">Split Columns<span class="badge">5</span></button>
                  </div>
                  <div class="tab-content">
                        <div class="tab-panel active" id="even_columns">
                              <div class="ge-container ge-preview">
                                    <div class="ge-row">
                                          <div class='ge-col-3'>
                                                <div class="ge-row">
                                                      <div class="ge-col-2">
                                                      </div>
                                                      <div class="ge-col-2">
                                                      </div>
                                                      <div class="ge-col-2">
                                                      </div>
                                                      <div class="ge-col-2">
                                                      </div>
                                                      <div class="ge-col-2">
                                                      </div>
                                                      <div class="ge-col-2">
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="ge-col-3">
                                                <div class="ge-row">
                                                      <div class="ge-col-6"></div>
                                                      <div class="ge-col-6"></div>
                                                </div>
                                                <div class="ge-row">
                                                      <div class="ge-col-3"></div>
                                                      <div class="ge-col-9"></div>
                                                </div>
                                                <div class="ge-row">
                                                      <div class="ge-col-9"></div>
                                                      <div class="ge-col-3"></div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="tab-panel" id="uneven_columns">
                              <h3>Analytics</h3>
                              <p>View detailed analytics and insights about your performance metrics.</p>
                        </div>
                        <div class="tab-panel" id="split_columns">
                              <h3>Settings</h3>
                              <p>Configure your account preferences and system settings.</p>
                        </div>
                  </div>
            </div>
      </div>

      <div id='debug_buttons'>
            <button id='toggle_debug'>Col</button>
            <button id='toggle_color_info'>Color Info</button>
            <button id='toggle_breakpoint_info'>Breakpoint Info</button>
            <button id='toggle_col_info'>Col Info</button>
      </div>


      <script type="module" src="<?= asset('grid_engine.js') ?>"></script>
      <script nomodule src="<?= asset('grid_engine.js', 'nomodule') ?>"></script>

      <script type="module" src="<?= asset('main.js') ?>"></script>
      <script nomodule src="<?php echo asset('main.js', 'nomodule'); ?>"></script>
</body>

</html>