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

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<!--ge-debug ge-extra-info-->

<body class="">
  <div class="demo-section">
    <h2>Underline Tabs (Default)</h2>
    <div class="tabs-wrapper">
      <div class="tabs tabs-underline" id="tabs1">
        <button class="active" data-tab="overview">Overview</button>
        <button data-tab="analytics">Analytics<span class="badge">New</span></button>
        <button data-tab="settings">Settings</button>
        <button data-tab="notifications">Notifications</button>
      </div>
      <div class="tab-content">
        <div class="tab-panel active" id="overview">
          <h3>Overview</h3>
          <p>Welcome to the overview dashboard. Here you can see a summary of your account activity.</p>
        </div>
        <div class="tab-panel" id="analytics">
          <h3>Analytics</h3>
          <p>View detailed analytics and insights about your performance metrics.</p>
        </div>
        <div class="tab-panel" id="settings">
          <h3>Settings</h3>
          <p>Configure your account preferences and system settings.</p>
        </div>
        <div class="tab-panel" id="notifications">
          <h3>Notifications</h3>
          <p>Manage your notification preferences and alerts.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Example 2: Pills Tabs -->
  <div class="demo-section">
    <h2>Pills Tabs</h2>
    <div class="tabs-wrapper">
      <div class="tabs tabs-pills" id="tabs2">
        <button class="active" data-tab="profile">Profile</button>
        <button data-tab="security">Security</button>
        <button data-tab="billing">Billing</button>
      </div>
      <div class="tab-content">
        <div class="tab-panel active" id="profile">
          <h3>Profile Information</h3>
          <p>Update your profile details and personal information.</p>
        </div>
        <div class="tab-panel" id="security">
          <h3>Security Settings</h3>
          <p>Manage your password, two-factor authentication, and security preferences.</p>
        </div>
        <div class="tab-panel" id="billing">
          <h3>Billing & Payments</h3>
          <p>View your billing history and manage payment methods.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Example 3: Boxed Tabs -->
  <div class="demo-section">
    <h2>Boxed Tabs</h2>
    <div class="tabs-wrapper">
      <div class="tabs tabs-boxed" id="tabs3">
        <button class="active" data-tab="code">Code</button>
        <button data-tab="preview">Preview</button>
        <button data-tab="documentation">Docs</button>
      </div>
      <div class="tab-content">
        <div class="tab-panel active" id="code">
          <h3>Code Editor</h3>
          <p>Write and edit your code here.</p>
        </div>
        <div class="tab-panel" id="preview">
          <h3>Live Preview</h3>
          <p>See your changes in real-time.</p>
        </div>
        <div class="tab-panel" id="documentation">
          <h3>Documentation</h3>
          <p>Read the API documentation and guides.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Example 4: Minimal Tabs -->
  <div class="demo-section">
    <h2>Minimal Tabs</h2>
    <div class="tabs-wrapper">
      <div class="tabs tabs-minimal" id="tabs4">
        <button class="active" data-tab="all">All</button>
        <button data-tab="active">Active<span class="badge">12</span></button>
        <button data-tab="completed">Completed</button>
        <button data-tab="archived">Archived</button>
      </div>
      <div class="tab-content">
        <div class="tab-panel active" id="all">
          <h3>All Items</h3>
          <p>View all your items in one place.</p>
        </div>
        <div class="tab-panel" id="active">
          <h3>Active Items</h3>
          <p>Currently active items that need attention.</p>
        </div>
        <div class="tab-panel" id="completed">
          <h3>Completed Items</h3>
          <p>Items you've successfully completed.</p>
        </div>
        <div class="tab-panel" id="archived">
          <h3>Archived Items</h3>
          <p>Old items moved to archive.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Example 5: Vertical Tabs -->
  <div class="demo-section">
    <h2>Vertical Tabs</h2>
    <div class="tabs-wrapper tabs-vertical">
      <div class="tabs tabs-underline tabs-vertical" id="tabs5">
        <button class="active" data-tab="general">General</button>
        <button data-tab="appearance">Appearance</button>
        <button data-tab="privacy">Privacy</button>
        <button data-tab="advanced">Advanced</button>
      </div>
      <div class="tab-content">
        <div class="tab-panel active" id="general">
          <h3>General Settings</h3>
          <p>Configure general application settings and preferences.</p>
        </div>
        <div class="tab-panel" id="appearance">
          <h3>Appearance</h3>
          <p>Customize the look and feel of your interface.</p>
        </div>
        <div class="tab-panel" id="privacy">
          <h3>Privacy & Data</h3>
          <p>Control your privacy settings and data management.</p>
        </div>
        <div class="tab-panel" id="advanced">
          <h3>Advanced Options</h3>
          <p>Access advanced configuration options.</p>
        </div>
      </div>
    </div>
  </div>

  <script type="module" src="<?= asset('grid_engine.js') ?>"></script>
  <script nomodule src="<?= asset('grid_engine.js', 'nomodule') ?>"></script>

  <script type="module" src="<?= asset('main.js') ?>"></script>
  <script nomodule src="<?php echo asset('main.js', 'nomodule'); ?>"></script>
</body>

</html>