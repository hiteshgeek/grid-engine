# Custom Modal System - Usage Guide

## File Structure

```
your-project/
├── scss/
│   └── _modal.scss          # Modal styles
├── js/
│   └── modal.js             # Modal JavaScript class
└── index.html               # Your HTML file
```

## Installation

### 1. SCSS Setup

Import the modal styles in your main SCSS file:

```scss
// main.scss
@import "modal";
```

Make sure your CSS variables are defined before importing the modal styles.

### 2. JavaScript Setup

#### Option A: ES6 Module (Recommended)

```javascript
// main.js
import Modal from "./modal.js";

// Auto-initialization is already included
// Or manually initialize:
const myModal = new Modal("#myModal");
myModal.show();
```

#### Option B: Script Tag

```html
<script type="module" src="js/modal.js"></script>
```

## HTML Structure

### Basic Modal

```html
<div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal Title</h5>
        <button
          type="button"
          class="btn-close"
          data-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <p>Modal content goes here...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
```

### Trigger Button

```html
<!-- Using data attributes -->
<button data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Using JavaScript -->
<button id="openModal">Open Modal</button>
<script type="module">
  import Modal from "./modal.js";

  document.getElementById("openModal").addEventListener("click", () => {
    const modal = new Modal("#myModal");
    modal.show();
  });
</script>
```

## Contextual Header Classes

Apply these classes to `.modal-header` for colored headers:

- `modal-header-primary` - Blue header
- `modal-header-secondary` - Gray header
- `modal-header-success` - Green header
- `modal-header-danger` - Red header
- `modal-header-warning` - Yellow header (with dark text)
- `modal-header-info` - Cyan header
- `modal-header-light` - Light gray header (with dark text)
- `modal-header-dark` - Dark header

```html
<div class="modal-header modal-header-success">
  <h5 class="modal-title">Success!</h5>
  <button type="button" class="btn-close" data-dismiss="modal"></button>
</div>
```

## Modal Sizes

Add size classes to `.modal-dialog`:

```html
<!-- Small Modal -->
<div class="modal-dialog modal-sm">...</div>

<!-- Default Modal (500px) -->
<div class="modal-dialog">...</div>

<!-- Large Modal -->
<div class="modal-dialog modal-lg">...</div>

<!-- Extra Large Modal -->
<div class="modal-dialog modal-xl">...</div>

<!-- Fullscreen Modal -->
<div class="modal-dialog modal-fullscreen">...</div>
```

## Modal Variations

### Centered Modal

```html
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">...</div>
</div>
```

### Scrollable Modal

```html
<div class="modal-dialog modal-dialog-scrollable">
  <div class="modal-content">...</div>
</div>
```

## JavaScript API

### Initialization

```javascript
import Modal from "./modal.js";

// With selector
const modal = new Modal("#myModal");

// With element
const modalElement = document.querySelector("#myModal");
const modal = new Modal(modalElement);

// With options
const modal = new Modal("#myModal", {
  backdrop: true, // true, false, or 'static'
  keyboard: true, // Close on ESC key
  focus: true, // Focus modal on show
});
```

### Methods

```javascript
// Show modal
modal.show();

// Hide modal
modal.hide();

// Toggle modal
modal.toggle();

// Destroy modal instance
modal.dispose();
```

### Events

Listen to modal events:

```javascript
const modalElement = document.getElementById("myModal");

// Before modal shows (cancelable)
modalElement.addEventListener("show.modal", (e) => {
  console.log("About to show modal");
  // e.preventDefault(); // Prevent modal from showing
});

// After modal is shown
modalElement.addEventListener("shown.modal", (e) => {
  console.log("Modal is now visible");
});

// Before modal hides (cancelable)
modalElement.addEventListener("hide.modal", (e) => {
  console.log("About to hide modal");
});

// After modal is hidden
modalElement.addEventListener("hidden.modal", (e) => {
  console.log("Modal is now hidden");
});
```

## Data Attributes

### Trigger Elements

```html
<!-- Basic trigger -->
<button data-toggle="modal" data-target="#myModal">Open</button>

<!-- With options -->
<button
  data-toggle="modal"
  data-target="#myModal"
  data-backdrop="static"
  data-keyboard="false"
>
  Open Modal
</button>
```

### Close Elements

```html
<!-- Inside modal -->
<button data-dismiss="modal">Close</button>
```

## Options

| Option     | Type              | Default | Description                                      |
| ---------- | ----------------- | ------- | ------------------------------------------------ |
| `backdrop` | boolean\|'static' | `true`  | Include backdrop. `'static'` = no close on click |
| `keyboard` | boolean           | `true`  | Close modal on ESC key                           |
| `focus`    | boolean           | `true`  | Focus modal on show                              |

## Examples

### Confirmation Dialog

```html
<div class="modal fade" id="confirmModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header modal-header-danger">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Cancel
        </button>
        <button type="button" class="btn btn-danger" id="confirmDelete">
          Delete
        </button>
      </div>
    </div>
  </div>
</div>

<script type="module">
  import Modal from "./modal.js";

  document.getElementById("confirmDelete").addEventListener("click", () => {
    // Perform delete action
    console.log("Item deleted");

    // Close modal
    const modal = new Modal("#confirmModal");
    modal.hide();
  });
</script>
```

### Form Modal

```html
<div class="modal fade" id="formModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-primary">
        <h5 class="modal-title">Add New Item</h5>
        <button type="button" class="btn-close" data-dismiss="modal"></button>
      </div>
      <form id="itemForm">
        <div class="modal-body">
          <input type="text" name="name" placeholder="Item name" required />
          <textarea name="description" placeholder="Description"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
```

## Browser Support

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- iOS Safari (latest)
- Chrome Android (latest)

## Accessibility

The modal includes proper ARIA attributes:

- `role="dialog"`
- `aria-hidden="true/false"`
- `aria-label` for close button
- Focus management
- Keyboard navigation (ESC to close)

## Notes

- The modal automatically prevents body scroll when open
- Multiple modals can exist, but only one should be open at a time
- The backdrop click-to-close can be disabled with `backdrop: 'static'`
- All animations use CSS transitions for smooth performance
