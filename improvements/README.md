# GE Grid System Documentation

A powerful, flexible 12-column CSS grid system built with SCSS. Responsive, customizable, and feature-rich.

---

## 📦 Installation

1. Include the SCSS files in your project:

```scss
@use "grid";
```

2. Or compile to CSS and link in your HTML:

```html
<link rel="stylesheet" href="grid.css" />
```

---

## 🎯 Quick Start

### Basic Grid Structure

```html
<div class="ge-container">
  <div class="ge-row">
    <div class="ge-col-6">Half width</div>
    <div class="ge-col-6">Half width</div>
  </div>
</div>
```

---

## 📐 Core Features

### 1. Container Types

#### Fixed Container

Responsive max-width container that adapts to breakpoints:

```html
<div class="ge-container">
  <!-- Content -->
</div>
```

**Max-widths by breakpoint:**

- `xs` - `sm`: 540px
- `md`: 720px
- `lg`: 960px
- `xl`: 1140px
- `xxl`: 1320px

#### Fluid Container

Full-width container:

```html
<div class="ge-container-fluid">
  <!-- Content -->
</div>
```

---

### 2. Breakpoints

| Breakpoint | Size    | Device        |
| ---------- | ------- | ------------- |
| `xs`       | ≤576px  | Mobile        |
| `sm`       | ≤768px  | Small tablet  |
| `md`       | ≤992px  | Tablet        |
| `lg`       | ≤1200px | Small desktop |
| `xl`       | ≤1400px | Desktop       |
| `xxl`      | ≤1600px | Large desktop |

---

### 3. Column Spans

#### Basic Columns

12-column grid system:

```html
<div class="ge-row">
  <div class="ge-col-12">Full width (12/12)</div>
  <div class="ge-col-6">Half width (6/12)</div>
  <div class="ge-col-4">One third (4/12)</div>
  <div class="ge-col-3">One quarter (3/12)</div>
</div>
```

#### Auto-width Columns

Equal-width columns:

```html
<div class="ge-row">
  <div class="ge-col-auto">Auto</div>
  <div class="ge-col-auto">Auto</div>
  <div class="ge-col-auto">Auto</div>
</div>
```

---

### 4. Responsive Columns

Use breakpoint-specific classes to change layout at different screen sizes:

```html
<div class="ge-row">
  <div class="ge-col-12 ge-col-md-6 ge-col-lg-4">
    <!-- 12 cols on mobile, 6 on tablet, 4 on desktop -->
  </div>
</div>
```

**Pattern:** `.ge-col-{breakpoint}-{number}`

**Example combinations:**

```html
<!-- Sidebar layout -->
<div class="ge-row">
  <div class="ge-col-12 ge-col-lg-8">Main content</div>
  <div class="ge-col-12 ge-col-lg-4">Sidebar</div>
</div>

<!-- Card grid -->
<div class="ge-row">
  <div class="ge-col-12 ge-col-sm-6 ge-col-md-4 ge-col-lg-3">Card 1</div>
  <div class="ge-col-12 ge-col-sm-6 ge-col-md-4 ge-col-lg-3">Card 2</div>
  <div class="ge-col-12 ge-col-sm-6 ge-col-md-4 ge-col-lg-3">Card 3</div>
  <div class="ge-col-12 ge-col-sm-6 ge-col-md-4 ge-col-lg-3">Card 4</div>
</div>
```

---

### 5. Column Offsets

Push columns to the right:

```html
<div class="ge-row">
  <div class="ge-col-4 ge-offset-4">Centered (4 cols with 4 offset)</div>
</div>

<div class="ge-row">
  <div class="ge-col-3">Column 1</div>
  <div class="ge-col-3 ge-offset-6">Column 2 (offset by 6)</div>
</div>
```

**Responsive offsets:**

```html
<div class="ge-col-6 ge-offset-3 ge-offset-md-0">
  <!-- Centered on desktop, full width on tablet -->
</div>
```

---

### 6. Column Order

Reorder columns visually:

```html
<div class="ge-row">
  <div class="ge-col-6 ge-order-2">Appears second</div>
  <div class="ge-col-6 ge-order-1">Appears first</div>
</div>
```

**Special order classes:**

- `.ge-order-first` - Move to beginning (order: -1)
- `.ge-order-last` - Move to end (order: 999)

**Responsive ordering:**

```html
<div class="ge-col-6 ge-order-2 ge-order-md-1">
  <!-- Order 2 on desktop, Order 1 on tablet -->
</div>
```

---

### 7. Gap Utilities

Control spacing between columns:

#### Gap Sizes

```html
<div class="ge-row ge-gap-sm">Small gaps (8px)</div>
<div class="ge-row ge-gap-md">Medium gaps (16px - default)</div>
<div class="ge-row ge-gap-lg">Large gaps (24px)</div>
<div class="ge-row ge-gap-xl">Extra large gaps (32px)</div>
<div class="ge-row ge-gap-xxl">Huge gaps (48px)</div>
<div class="ge-row ge-gap-none">No gaps</div>
```

#### Separate Row/Column Gaps

```html
<!-- Only horizontal gap -->
<div class="ge-row ge-col-gap-lg">
  <!-- Only vertical gap (between rows in container) -->
  <div class="ge-container ge-row-gap-xl"></div>
</div>
```

---

### 8. Alignment Utilities

#### Horizontal Alignment (Justify)

```html
<div class="ge-row ge-justify-start">Align left</div>
<div class="ge-row ge-justify-center">Align center</div>
<div class="ge-row ge-justify-end">Align right</div>
<div class="ge-row ge-justify-between">Space between</div>
<div class="ge-row ge-justify-around">Space around</div>
<div class="ge-row ge-justify-evenly">Space evenly</div>
```

#### Vertical Alignment (Align Items)

```html
<div class="ge-row ge-align-start">Top</div>
<div class="ge-row ge-align-center">Middle</div>
<div class="ge-row ge-align-end">Bottom</div>
<div class="ge-row ge-align-stretch">Stretch (default)</div>
<div class="ge-row ge-align-baseline">Baseline</div>
```

#### Self Alignment (Individual Columns)

```html
<div class="ge-row">
  <div class="ge-col-4 ge-align-self-start">Top</div>
  <div class="ge-col-4 ge-align-self-center">Middle</div>
  <div class="ge-col-4 ge-align-self-end">Bottom</div>
</div>
```

---

### 9. Height Utilities

Set minimum column heights:

```html
<div class="ge-col-6 ge-col-h-1">Min height: 100px</div>
<div class="ge-col-6 ge-col-h-2">Min height: 200px</div>
<div class="ge-col-6 ge-col-h-5">Min height: 500px</div>
```

Height multiplier: `100px × number` (h-1 through h-10)

---

### 10. Display Utilities

#### Hide at Breakpoints

```html
<div class="ge-col-6 ge-hidden-xs">Hidden on mobile</div>
<div class="ge-col-6 ge-hidden-md">Hidden on tablets</div>
```

#### Show Only at Breakpoints

```html
<div class="ge-visible-xs">Only visible on mobile</div>
<div class="ge-visible-lg">Only visible on large screens</div>
```

---

### 11. Nested Grids

Grids can be nested infinitely:

```html
<div class="ge-row">
  <div class="ge-col-8">
    <!-- Nested grid -->
    <div class="ge-row">
      <div class="ge-col-6">Nested column 1</div>
      <div class="ge-col-6">Nested column 2</div>
    </div>
  </div>
  <div class="ge-col-4">Sidebar</div>
</div>
```

**Note:** Nested grids automatically inherit gap settings and support subgrid on modern browsers.

---

## 🐛 Debug Mode

Visualize your grid structure:

```html
<div class="ge-container ge-debug">
  <!-- Columns will show dashed borders -->
  <!-- Rows will show red borders -->
</div>
```

---

## 🎨 Extra Info Mode

Display breakpoint information with color-coded columns:

```html
<div class="ge-container ge-extra-info">
  <!-- Shows current breakpoint and size range on each column -->
</div>
```

**Breakpoint colors:**

- `xxl`: Light green
- `xl`: Light blue
- `lg`: Light purple
- `md`: Light orange
- `sm`: Light pink
- `xs`: Light red

---

## 📋 Complete Examples

### Example 1: Dashboard Layout

```html
<div class="ge-container">
  <div class="ge-row ge-gap-lg">
    <!-- Header -->
    <div class="ge-col-12">Header</div>

    <!-- Main content with sidebar -->
    <div class="ge-col-12 ge-col-lg-9">
      <div class="ge-row ge-gap-md">
        <div class="ge-col-12 ge-col-md-6 ge-col-lg-4">Card 1</div>
        <div class="ge-col-12 ge-col-md-6 ge-col-lg-4">Card 2</div>
        <div class="ge-col-12 ge-col-md-6 ge-col-lg-4">Card 3</div>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="ge-col-12 ge-col-lg-3">Sidebar</div>
  </div>
</div>
```

### Example 2: Photo Gallery

```html
<div class="ge-container">
  <div class="ge-row ge-gap-sm">
    <div class="ge-col-6 ge-col-sm-4 ge-col-md-3 ge-col-lg-2">Photo 1</div>
    <div class="ge-col-6 ge-col-sm-4 ge-col-md-3 ge-col-lg-2">Photo 2</div>
    <div class="ge-col-6 ge-col-sm-4 ge-col-md-3 ge-col-lg-2">Photo 3</div>
    <div class="ge-col-6 ge-col-sm-4 ge-col-md-3 ge-col-lg-2">Photo 4</div>
    <div class="ge-col-6 ge-col-sm-4 ge-col-md-3 ge-col-lg-2">Photo 5</div>
    <div class="ge-col-6 ge-col-sm-4 ge-col-md-3 ge-col-lg-2">Photo 6</div>
  </div>
</div>
```

### Example 3: Centered Content with Offsets

```html
<div class="ge-container">
  <div class="ge-row">
    <div class="ge-col-6 ge-offset-3">Centered content</div>
  </div>

  <div class="ge-row">
    <div class="ge-col-8 ge-offset-2 ge-col-md-10 ge-offset-md-1">
      Centered on desktop, almost full width on tablet
    </div>
  </div>
</div>
```

### Example 4: Reordering on Mobile

```html
<div class="ge-row">
  <!-- Image appears first on desktop, second on mobile -->
  <div class="ge-col-12 ge-col-md-6 ge-order-1 ge-order-md-2">
    <img src="image.jpg" alt="Image" />
  </div>

  <!-- Text appears second on desktop, first on mobile -->
  <div class="ge-col-12 ge-col-md-6 ge-order-2 ge-order-md-1">
    <h2>Headline</h2>
    <p>Description text...</p>
  </div>
</div>
```

---

## ⚙️ Customization

### Modify Variables

Edit `_variables.scss` to customize:

```scss
// Change breakpoints
$breakpoints: (
  xs: 576px,
  sm: 768px,
  // ...
);

// Change container widths
$container-max-widths: (
  sm: 540px,
  md: 720px,
  // ...
);

// Change gap sizes
$gap-sizes: (
  sm: 8px,
  md: 16px,
  // ...
);

// Change grid columns (default: 12)
$grid-columns: 12;

// Change base height unit (default: 100px)
$base-col-height: 100px;
```

---

## 🚀 Best Practices

1. **Mobile-first**: Start with mobile layout, add larger breakpoint classes
2. **Use semantic HTML**: Wrap grid in semantic elements (`<header>`, `<main>`, `<section>`)
3. **Avoid excessive nesting**: Keep grid nesting to 2-3 levels max
4. **Test responsiveness**: Use debug mode to visualize layout at different breakpoints
5. **Consistent gaps**: Use gap utilities for uniform spacing
6. **Accessibility**: Ensure logical order in HTML matches visual order when possible

---

## 📱 Browser Support

- ✅ Modern browsers (Chrome, Firefox, Safari, Edge)
- ✅ CSS Grid support required
- ✅ Subgrid support (optional, gracefully degrades)
- ⚠️ IE11 not supported (no CSS Grid support)

---

## 📄 License

MIT License - Feel free to use in personal and commercial projects.

---

## 🤝 Contributing

Contributions welcome! Please submit issues and pull requests.

---

## 📞 Support

For questions or issues, please open an issue on the repository.

---

**Happy Grid Building! 🎉**
