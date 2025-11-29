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

      <div class="demo-container">
            <h1>Custom Modal Examples</h1>

            <div class="btn-group">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Basic Modal</button>
                  <button class="btn btn-success" data-toggle="modal" data-target="#successModal">Success Header</button>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#dangerModal">Danger Header</button>
                  <button class="btn btn-warning" data-toggle="modal" data-target="#warningModal">Warning Header</button>
                  <button class="btn btn-info" data-toggle="modal" data-target="#largeModal">Large Modal</button>
                  <button class="btn btn-secondary" data-toggle="modal" data-target="#centeredModal">Centered Modal</button>
            </div>
      </div>

      <!-- Basic Modal -->
      <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                              <h5 class="modal-title">Modal Title</h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <p>This is a basic modal with default styling. You can add any content here.</p>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save Changes</button>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Success Header Modal -->
      <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header modal-header-success">
                              <h5 class="modal-title">Success!</h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <p>Your operation was completed successfully!</p>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Danger Header Modal -->
      <div class="modal fade" id="dangerModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header modal-header-danger">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <p>Are you sure you want to delete this item? This action cannot be undone.</p>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Warning Header Modal -->
      <div class="modal fade" id="warningModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header modal-header-warning">
                              <h5 class="modal-title">Warning!</h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <p>Please review the following information carefully before proceeding.</p>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-warning">Proceed</button>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Large Modal -->
      <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header modal-header-info">
                              <h5 class="modal-title">Large Modal</h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <p>This is a large modal with more space for content. It's perfect for displaying forms, tables, or detailed information.</p>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Centered Modal -->
      <div class="modal fade" id="centeredModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                        <div class="modal-header modal-header-secondary">
                              <h5 class="modal-title">Centered Modal</h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <p>This modal is vertically centered in the viewport.</p>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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