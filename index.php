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
            <div class="grid-demo-wrapper">
                  <h4 class='grid-demo-title'>Add Row — Choose a layout</h4>
                  <h4 class='grid-demo-title'>
                        <span>Mode : View</span>
                        <span>
                              <button class='ge-btn ge-btn-sm ge-btn-primary' id='toggle_grid_edit'>Edit Mode</button>
                        </span>
                  </h4>
                  <hr class="grid-separator" />
                  <div class="tabs-wrapper grid-group-tabs">
                        <div class="tabs tabs-minimal" id="grid_tabs">
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
                                                      <span class='grid-name'>3 Columns</span>
                                                </div>
                                                <div class="ge-col-3">
                                                      <div class="ge-row">
                                                            <div class="ge-col-2 ge-col-xxl-10 ge-col-xl-2 ge-col-lg-10 ge-col-md-2 ge-col-sm-10"></div>
                                                            <div class="ge-col-10 ge-col-xxl-2 ge-col-xl-10 ge-col-lg-2 ge-col-md-10 ge-col-sm-2"></div>
                                                      </div>
                                                      <div class="ge-row">
                                                            <div class="ge-col-3"></div>
                                                            <div class="ge-col-9"></div>
                                                      </div>
                                                      <div class="ge-row">
                                                            <div class="ge-col-9"></div>
                                                            <div class="ge-col-3"></div>
                                                      </div>
                                                      <span class='grid-name'>3 Columns</span>
                                                </div>
                                                <div class="ge-col-3">
                                                      <div class="ge-row">
                                                            <div class="ge-col-12"></div>
                                                      </div>
                                                      <span class='grid-name'>3 Columns</span>
                                                </div>
                                                <div class="ge-col-3">
                                                      <div class="ge-row">
                                                            <div class="ge-col-12"></div>
                                                      </div>
                                                      <span class='grid-name'>3 Columns</span>
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
                  </div>

                  <div id='debug_buttons'>
                        <button class='ge-btn ge-btn-sm ge-btn-primary' id='toggle_debug'>Col</button>
                        <button class='ge-btn ge-btn-sm ge-btn-primary' id='toggle_color_info'>Color Info</button>
                        <button class='ge-btn ge-btn-sm ge-btn-primary' id='toggle_breakpoint_info'>Breakpoint Info</button>
                        <button class='ge-btn ge-btn-sm ge-btn-primary' id='toggle_col_info'>Col Info</button>
                  </div>


                  <script type="module" src="<?= asset('grid_engine.js') ?>"></script>
                  <script nomodule src="<?= asset('grid_engine.js', 'nomodule') ?>"></script>

                  <script type="module" src="<?= asset('main.js') ?>"></script>
                  <script nomodule src="<?php echo asset('main.js', 'nomodule'); ?>"></script>
</body>

</html>