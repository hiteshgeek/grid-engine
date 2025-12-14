<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vertical Tabs Example</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { 
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      padding: 2rem;
      background: #f9fafb;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      background: white;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    h1 { margin-bottom: 2rem; color: #111827; }

    /* Vertical Tabs Layout */
    .tabs-wrapper {
      display: flex;
      flex-direction: row;
      gap: 2rem;
      align-items: flex-start;
    }

    /* Tabs Navigation */
    .tabs {
      display: flex;
      flex-direction: column;
      min-width: 200px;
      max-width: 250px;
      flex-shrink: 0;
      border-right: 1px solid rgba(0, 0, 0, 0.08);
      padding-right: 0.5rem;
    }

    .tabs button {
      padding: 0.875rem 1.25rem;
      background: transparent;
      border: none;
      border-right: 2px solid transparent;
      color: #6b7280;
      font-size: 0.9375rem;
      font-weight: 500;
      cursor: pointer;
      text-align: left;
      transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
      outline: none;
    }

    .tabs button:hover:not(.active) {
      color: #374151;
      border-right-color: rgba(37, 99, 235, 0.2);
    }

    .tabs button.active {
      color: #2563eb;
      border-right-color: #2563eb;
      font-weight: 600;
    }

    .tabs button:focus-visible {
      outline: 2px solid #2563eb;
      outline-offset: -2px;
      background: rgba(37, 99, 235, 0.05);
    }

    /* Content Area */
    .tab-content {
      flex: 1;
      min-width: 0;
    }

    .tab-panel {
      display: none;
    }

    .tab-panel.active {
      display: block;
      animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateX(10px); }
      to { opacity: 1; transform: translateX(0); }
    }

    .tab-panel h3 {
      font-size: 1.5rem;
      color: #111827;
      margin-bottom: 1rem;
    }

    .tab-panel p {
      color: #6b7280;
      line-height: 1.6;
      margin-bottom: 1rem;
    }

    .tab-panel .content-box {
      background: #f9fafb;
      padding: 1.5rem;
      border-radius: 8px;
      margin-top: 1rem;
      border: 1px solid #e5e7eb;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
      .tabs-wrapper {
        flex-direction: column;
      }

      .tabs {
        flex-direction: row;
        overflow-x: auto;
        min-width: 100%;
        max-width: 100%;
        border-right: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        padding-right: 0;
        padding-bottom: 0.5rem;
        gap: 0.5rem;
      }

      .tabs button {
        border-right: none;
        border-bottom: 2px solid transparent;
        white-space: nowrap;
      }

      .tabs button.active {
        border-right: none;
        border-bottom-color: #2563eb;
      }
    }

  </style>
</head>
<body>

  <div class="container">
    <h1>Vertical Tabs Example</h1>

    <div class="tabs-wrapper">
      <!-- Left side: Tab buttons -->
      <div class="tabs" id="myTabs">
        <button class="active" data-tab="general">General</button>
        <button data-tab="appearance">Appearance</button>
        <button data-tab="privacy">Privacy</button>
        <button data-tab="advanced">Advanced</button>
      </div>

      <!-- Right side: Content panels -->
      <div class="tab-content">
        <div class="tab-panel active" id="general">
          <h3>General Settings</h3>
          <p>Configure general application settings and preferences.</p>
          <div class="content-box">
            <p><strong>Language:</strong> English (US)</p>
            <p><strong>Timezone:</strong> UTC-5 (Eastern Time)</p>
            <p><strong>Date Format:</strong> MM/DD/YYYY</p>
          </div>
        </div>

        <div class="tab-panel" id="appearance">
          <h3>Appearance</h3>
          <p>Customize the look and feel of your interface.</p>
          <div class="content-box">
            <p><strong>Theme:</strong> Light Mode</p>
            <p><strong>Font Size:</strong> Medium</p>
            <p><strong>Color Scheme:</strong> Default Blue</p>
          </div>
        </div>

        <div class="tab-panel" id="privacy">
          <h3>Privacy & Data</h3>
          <p>Control your privacy settings and data management.</p>
          <div class="content-box">
            <p><strong>Data Collection:</strong> Minimal</p>
            <p><strong>Cookies:</strong> Essential Only</p>
            <p><strong>Analytics:</strong> Disabled</p>
          </div>
        </div>

        <div class="tab-panel" id="advanced">
          <h3>Advanced Options</h3>
          <p>Access advanced configuration options.</p>
          <div class="content-box">
            <p><strong>Developer Mode:</strong> Disabled</p>
            <p><strong>Debug Logging:</strong> Off</p>
            <p><strong>Experimental Features:</strong> Off</p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script>
    // Simple tabs implementation
    class Tabs {
      constructor(selector) {
        this.container = document.querySelector(selector);
        this.wrapper = this.container.closest('.tabs-wrapper');
        this.buttons = this.container.querySelectorAll('button');
        this.panels = this.wrapper.querySelectorAll('.tab-panel');
        this.activeIndex = 0;

        this.init();
      }

      init() {
        this.buttons.forEach((button, index) => {
          button.addEventListener('click', () => this.activate(index));
        });

        // Keyboard navigation
        this.container.addEventListener('keydown', (e) => {
          let newIndex = this.activeIndex;
          
          if (e.key === 'ArrowDown') {
            e.preventDefault();
            newIndex = (this.activeIndex + 1) % this.buttons.length;
          } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            newIndex = (this.activeIndex - 1 + this.buttons.length) % this.buttons.length;
          } else if (e.key === 'Home') {
            e.preventDefault();
            newIndex = 0;
          } else if (e.key === 'End') {
            e.preventDefault();
            newIndex = this.buttons.length - 1;
          }

          if (newIndex !== this.activeIndex) {
            this.activate(newIndex);
            this.buttons[newIndex].focus();
          }
        });
      }

      activate(index) {
        const button = this.buttons[index];
        const targetId = button.dataset.tab;
        const targetPanel = document.getElementById(targetId);

        // Hide all
        this.buttons.forEach(btn => btn.classList.remove('active'));
        this.panels.forEach(panel => panel.classList.remove('active'));

        // Show selected
        button.classList.add('active');
        targetPanel.classList.add('active');

        this.activeIndex = index;
      }
    }

    // Initialize
    const tabs = new Tabs('#myTabs');
  </script>

</body>
</html>
