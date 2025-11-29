# Modern Tabs Component

A feature-rich, accessible, and customizable tabs component with multiple styles, animations, and advanced functionality.

---

## 🎨 Features

### Core Features

- ✅ **Multiple Styles**: Underline, Pills, Boxed, Minimal
- ✅ **Vertical & Horizontal**: Supports both orientations
- ✅ **Fully Accessible**: ARIA attributes, keyboard navigation
- ✅ **Smooth Animations**: Fade, slide, or no animation
- ✅ **Event System**: Comprehensive lifecycle hooks
- ✅ **Browser History**: Optional URL-based tab state
- ✅ **Lazy Loading**: Load content on-demand
- ✅ **Responsive**: Mobile-friendly with auto-scroll
- ✅ **Dark Mode**: Built-in dark mode support
- ✅ **Badges & Icons**: Support for visual enhancements

### Advanced Features

- 🎯 Keyboard navigation (Arrow keys, Home, End)
- 🔄 Loading states
- 🚫 Disable/enable tabs dynamically
- 🔗 Browser back/forward support
- 📱 Mobile responsive (horizontal scroll)
- ♿ Full accessibility (WCAG compliant)
- 🎭 Custom animations
- 💾 Memory optimization (destroy on hide)

---

## 📦 Installation

### NPM

```bash
npm install your-tabs-component
```

### Direct Import

```javascript
import Tabs from "./tabs.js";
```

### Include SCSS

```scss
@import "tabs";
```

---

## 🚀 Quick Start

### Basic HTML Structure

```html
<div class="tabs-wrapper">
  <div class="tabs tabs-underline" id="myTabs">
    <button class="active" data-tab="tab1">Tab 1</button>
    <button data-tab="tab2">Tab 2</button>
    <button data-tab="tab3">Tab 3</button>
  </div>

  <div class="tab-content">
    <div class="tab-panel active" id="tab1">Content 1</div>
    <div class="tab-panel" id="tab2">Content 2</div>
    <div class="tab-panel" id="tab3">Content 3</div>
  </div>
</div>
```

### Initialize JavaScript

```javascript
const tabs = new Tabs("#myTabs", {
  animation: true,
  keyboard: true,
  onTabChanged: (data) => {
    console.log("Tab changed:", data);
  },
});
```

---

## 🎨 Tab Styles

### 1. Underline Tabs (Default)

```html
<div class="tabs tabs-underline">
  <button class="active" data-tab="tab1">Tab 1</button>
  <button data-tab="tab2">Tab 2</button>
</div>
```

### 2. Pills Tabs

```html
<div class="tabs tabs-pills">
  <button class="active" data-tab="tab1">Tab 1</button>
  <button data-tab="tab2">Tab 2</button>
</div>
```

### 3. Boxed Tabs

```html
<div class="tabs tabs-boxed">
  <button class="active" data-tab="tab1">Tab 1</button>
  <button data-tab="tab2">Tab 2</button>
</div>
```

### 4. Minimal Tabs

```html
<div class="tabs tabs-minimal">
  <button class="active" data-tab="tab1">Tab 1</button>
  <button data-tab="tab2">Tab 2</button>
</div>
```

---

## 📐 Orientations

### Horizontal (Default)

```html
<div class="tabs-wrapper">
  <div class="tabs tabs-underline">
    <!-- tabs -->
  </div>
  <div class="tab-content">
    <!-- panels -->
  </div>
</div>
```

### Vertical

```html
<div class="tabs-wrapper tabs-vertical">
  <div class="tabs tabs-underline tabs-vertical">
    <!-- tabs -->
  </div>
  <div class="tab-content">
    <!-- panels -->
  </div>
</div>
```

---

## ⚙️ Configuration Options

```javascript
const tabs = new Tabs("#myTabs", {
  // Animation settings
  animation: true, // Enable/disable animations
  animationType: "fade", // 'fade', 'slide', 'none'

  // Navigation
  keyboard: true, // Enable keyboard navigation
  history: false, // Browser history support

  // Content loading
  lazy: false, // Lazy load tab content
  preloadAll: false, // Preload all panels on init
  destroyOnHide: false, // Destroy panel content when hidden

  // Lifecycle hooks
  beforeChange: null, // Before tab change (can cancel)
  onTabShow: null, // When tab is shown
  onTabHide: null, // When tab is hidden
  onTabChanged: null, // After tab change complete
  onTabClick: null, // When tab is clicked
  onInit: null, // After initialization
  onDestroy: null, // Before destruction

  // Misc
  autoDestroy: true, // Auto cleanup on destroy
});
```

---

## 🎯 Events & Callbacks

### beforeChange

Fires before tab changes. Return `false` to cancel.

```javascript
beforeChange: async (data) => {
  // data: { from, to, button, panel }
  const confirmed = await confirmSwitch();
  return confirmed; // Return false to cancel
};
```

### onTabShow

Fires when a tab is shown.

```javascript
onTabShow: (data) => {
  // data: { index, panel, button }
  console.log("Tab shown:", data.index);
};
```

### onTabHide

Fires when a tab is hidden.

```javascript
onTabHide: (data) => {
  // data: { index, panel, button }
  console.log("Tab hidden:", data.index);
};
```

### onTabChanged

Fires after tab change is complete.

```javascript
onTabChanged: (data) => {
  // data: { from, to, panel, button }
  console.log(`Changed from ${data.from} to ${data.to}`);
};
```

### onTabClick

Fires when any tab is clicked.

```javascript
onTabClick: (data) => {
  // data: { button, index, event }
  console.log("Tab clicked:", data.index);
};
```

### Custom DOM Events

Listen to custom events on the wrapper:

```javascript
document.querySelector(".tabs-wrapper").addEventListener("tab:changed", (e) => {
  console.log("Tab changed:", e.detail);
  // detail: { from, to, tabId }
});
```

---

## 🔧 Methods

### show(target)

Programmatically show a tab.

```javascript
tabs.show(2); // By index
tabs.show("tab2"); // By tab ID
```

### getActive()

Get currently active tab information.

```javascript
const active = tabs.getActive();
// Returns: { index, button, panel, id }
```

### disable(target)

Disable a tab.

```javascript
tabs.disable(1); // By index
tabs.disable("tab2"); // By tab ID
```

### enable(target)

Enable a tab.

```javascript
tabs.enable(1);
tabs.enable("tab2");
```

### setLoading(target, loading)

Set loading state on a tab.

```javascript
tabs.setLoading("tab2", true); // Show loading
tabs.setLoading("tab2", false); // Hide loading
```

### refresh()

Refresh tabs (useful after dynamic changes).

```javascript
tabs.refresh();
```

### destroy()

Destroy the tabs instance and cleanup.

```javascript
tabs.destroy();
```

---

## 🎨 Advanced Usage

### Tabs with Badges

```html
<button data-tab="notifications">
  Notifications
  <span class="badge">5</span>
</button>
```

### Tabs with Icons

```html
<button data-tab="settings">
  <svg>...</svg>
  Settings
</button>
```

### Lazy Loading from URL

```html
<div class="tab-panel" id="tab2" data-url="/api/content/tab2">
  <!-- Content loaded on first view -->
</div>
```

```javascript
const tabs = new Tabs("#myTabs", {
  lazy: true,
});
```

### Browser History Integration

```javascript
const tabs = new Tabs("#myTabs", {
  history: true, // URL updates as tabs change
});
// URL will be: ?tab=tab2
```

### Async Validation Before Tab Change

```javascript
const tabs = new Tabs("#myTabs", {
  beforeChange: async (data) => {
    if (data.from === 0 && !formIsValid()) {
      alert("Please complete the form");
      return false; // Cancel tab change
    }
    return true;
  },
});
```

### Memory Optimization

```javascript
const tabs = new Tabs("#myTabs", {
  destroyOnHide: true, // Clear content when tab is hidden
  lazy: true, // Load only when needed
});
```

---

## ⌨️ Keyboard Navigation

When a tab has focus:

- **Arrow Right/Down**: Next tab
- **Arrow Left/Up**: Previous tab
- **Home**: First tab
- **End**: Last tab
- **Tab**: Move focus (standard behavior)

---

## ♿ Accessibility

The component automatically adds:

- `role="tablist"` on tab container
- `role="tab"` on buttons
- `role="tabpanel"` on panels
- `aria-selected` on active tab
- `aria-controls` linking tabs to panels
- `aria-labelledby` linking panels to tabs
- `tabindex` management for keyboard navigation
- Focus indicators with `:focus-visible`

---

## 📱 Responsive Behavior

### Mobile Horizontal Scroll

On mobile, horizontal tabs automatically scroll:

```css
@media (max-width: 768px) {
  .tabs {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
}
```

### Vertical to Horizontal on Mobile

Vertical tabs automatically switch to horizontal on mobile screens.

---

## 🌙 Dark Mode

Automatic dark mode support with `prefers-color-scheme`:

```html
<div class="tabs-wrapper" data-theme="dark">
  <!-- Tabs with dark styling -->
</div>
```

Or use Tailwind's dark mode:

```html
<div class="dark">
  <div class="tabs-wrapper">
    <!-- Automatically styled for dark mode -->
  </div>
</div>
```

---

## 🎬 Animation Types

### Fade (Default)

```javascript
const tabs = new Tabs("#myTabs", {
  animationType: "fade",
});
```

### Slide

```javascript
const tabs = new Tabs("#myTabs", {
  animationType: "slide",
});
```

### None

```javascript
const tabs = new Tabs("#myTabs", {
  animation: false,
});
```

---

## 🎨 Customization

### SCSS Variables

```scss
$tab-primary-color: #2563eb;
$tab-hover-bg: rgba(37, 99, 235, 0.08);
$tab-active-bg: rgba(37, 99, 235, 0.12);
$tab-border-radius: 8px;
$tab-transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
```

### Custom Colors

Override in your CSS:

```css
.tabs button.active {
  color: #16a34a; /* Green instead of blue */
}
```

---

## 📋 Complete Example

```html
<div class="tabs-wrapper">
  <div class="tabs tabs-pills" id="dashboardTabs">
    <button class="active" data-tab="overview">
      <svg>...</svg>
      Overview
      <span class="badge">New</span>
    </button>
    <button data-tab="analytics">Analytics</button>
    <button data-tab="settings" disabled>Settings</button>
  </div>

  <div class="tab-content">
    <div class="tab-panel active" id="overview">
      <h3>Dashboard Overview</h3>
      <p>Welcome to your dashboard.</p>
    </div>
    <div class="tab-panel" id="analytics" data-url="/api/analytics">
      <!-- Lazy loaded -->
    </div>
    <div class="tab-panel" id="settings">
      <h3>Settings</h3>
      <p>Configure your preferences.</p>
    </div>
  </div>
</div>

<script type="module">
  import Tabs from "./tabs.js";

  const tabs = new Tabs("#dashboardTabs", {
    animation: true,
    animationType: "fade",
    keyboard: true,
    lazy: true,
    history: true,

    beforeChange: async (data) => {
      if (data.to === 2) {
        return confirm("Navigate to settings?");
      }
      return true;
    },

    onTabShow: (data) => {
      console.log("Showing:", data.index);
    },

    onTabChanged: (data) => {
      console.log(`Changed from ${data.from} to ${data.to}`);
    },
  });

  // Enable settings tab after 2 seconds
  setTimeout(() => {
    tabs.enable("settings");
  }, 2000);
</script>
```

---

## 🐛 Troubleshooting

### Tabs not working?

1. Ensure `data-tab` matches panel `id`
2. Check console for errors
3. Verify HTML structure matches examples

### Animations not smooth?

1. Check `animation` is set to `true`
2. Verify CSS transitions are loaded
3. Test in modern browser (IE11 not supported)

### Keyboard navigation not working?

1. Ensure `keyboard: true` in options
2. Tab must have focus
3. Check browser console for errors

---

## 🌐 Browser Support

- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ❌ IE11 (not supported)

---

## 📄 License

MIT License - Free for personal and commercial use.

---

## 🤝 Contributing

Contributions welcome! Please submit issues and pull requests.

---

**Happy Tabbing! 🎉**
