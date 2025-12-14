<?php
include_once __DIR__ . '/includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grid Engine - Complete Demo</title>
  <link rel="stylesheet" href="<?php echo asset('grid_engine.css'); ?>">
  <style>
    * { box-sizing: border-box; }
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      margin: 0;
      padding: 20px;
      background: #f5f5f5;
      color: #333;
    }
    h1, h2, h3 { margin-top: 2rem; margin-bottom: 1rem; }
    h1 { font-size: 2rem; border-bottom: 2px solid #007bff; padding-bottom: 0.5rem; }
    h2 { font-size: 1.5rem; color: #007bff; }
    h3 { font-size: 1.1rem; color: #666; }
    .demo-section {
      background: #fff;
      padding: 20px;
      margin-bottom: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .demo-box {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 15px;
      text-align: center;
      border-radius: 4px;
      font-weight: 500;
      min-height: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .demo-box-alt {
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    .demo-box-light {
      background: #e9ecef;
      color: #333;
    }
    .code-label {
      background: #2d3748;
      color: #e2e8f0;
      padding: 4px 8px;
      border-radius: 4px;
      font-family: 'Fira Code', monospace;
      font-size: 0.75rem;
      margin-bottom: 10px;
      display: inline-block;
    }
    .feature-badge {
      background: #28a745;
      color: white;
      padding: 2px 8px;
      border-radius: 12px;
      font-size: 0.7rem;
      margin-left: 8px;
      vertical-align: middle;
    }
    .toc {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 30px;
    }
    .toc ul { columns: 2; }
    .toc a { color: #007bff; text-decoration: none; }
    .toc a:hover { text-decoration: underline; }
    .resize-hint {
      background: #fff3cd;
      color: #856404;
      padding: 10px 15px;
      border-radius: 4px;
      margin-bottom: 20px;
      font-size: 0.9rem;
    }
    pre {
      background: #2d3748;
      color: #e2e8f0;
      padding: 15px;
      border-radius: 6px;
      overflow-x: auto;
      font-size: 0.85rem;
    }
    code {
      font-family: 'Fira Code', 'Consolas', monospace;
    }
  </style>
</head>
<body>

  <h1>Grid Engine - Complete Feature Demo</h1>

  <div class="resize-hint">
    Resize your browser window to see responsive behavior in action!
  </div>

  <!-- Table of Contents -->
  <div class="toc">
    <h3>Table of Contents</h3>
    <ul>
      <li><a href="#basic-grid">Basic 12-Column Grid</a></li>
      <li><a href="#responsive-grid">Responsive Grid</a></li>
      <li><a href="#containers">Container Variants</a></li>
      <li><a href="#offsets">Column Offsets</a></li>
      <li><a href="#ordering">Column Ordering</a></li>
      <li><a href="#alignment">Alignment Utilities</a></li>
      <li><a href="#visibility">Responsive Visibility</a></li>
      <li><a href="#gaps">Gap Utilities</a></li>
      <li><a href="#nested">Nested Grids</a></li>
      <li><a href="#utilities">Common Utilities</a></li>
      <li><a href="#real-world">Real-World Examples</a></li>
    </ul>
  </div>

  <!-- ==================== BASIC GRID ==================== -->
  <section id="basic-grid" class="demo-section">
    <h2>1. Basic 12-Column Grid</h2>
    <p>The grid is divided into 12 equal columns. Use <code>.ge-col-{n}</code> classes.</p>

    <h3>Equal Columns</h3>
    <span class="code-label">.ge-col-4 (x3)</span>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-4"><div class="demo-box">col-4</div></div>
        <div class="ge-col-4"><div class="demo-box">col-4</div></div>
        <div class="ge-col-4"><div class="demo-box">col-4</div></div>
      </div>
    </div>

    <h3>Mixed Column Widths</h3>
    <span class="code-label">.ge-col-2, .ge-col-6, .ge-col-4</span>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-2"><div class="demo-box">2</div></div>
        <div class="ge-col-6"><div class="demo-box">6</div></div>
        <div class="ge-col-4"><div class="demo-box">4</div></div>
      </div>
    </div>

    <h3>All Column Sizes</h3>
    <div class="ge-container">
      <div class="ge-row ge-mb-2">
        <div class="ge-col-12"><div class="demo-box demo-box-light">12</div></div>
      </div>
      <div class="ge-row ge-mb-2">
        <div class="ge-col-6"><div class="demo-box">6</div></div>
        <div class="ge-col-6"><div class="demo-box">6</div></div>
      </div>
      <div class="ge-row ge-mb-2">
        <div class="ge-col-4"><div class="demo-box demo-box-alt">4</div></div>
        <div class="ge-col-4"><div class="demo-box demo-box-alt">4</div></div>
        <div class="ge-col-4"><div class="demo-box demo-box-alt">4</div></div>
      </div>
      <div class="ge-row ge-mb-2">
        <div class="ge-col-3"><div class="demo-box">3</div></div>
        <div class="ge-col-3"><div class="demo-box">3</div></div>
        <div class="ge-col-3"><div class="demo-box">3</div></div>
        <div class="ge-col-3"><div class="demo-box">3</div></div>
      </div>
      <div class="ge-row ge-mb-2">
        <div class="ge-col-2"><div class="demo-box demo-box-alt">2</div></div>
        <div class="ge-col-2"><div class="demo-box demo-box-alt">2</div></div>
        <div class="ge-col-2"><div class="demo-box demo-box-alt">2</div></div>
        <div class="ge-col-2"><div class="demo-box demo-box-alt">2</div></div>
        <div class="ge-col-2"><div class="demo-box demo-box-alt">2</div></div>
        <div class="ge-col-2"><div class="demo-box demo-box-alt">2</div></div>
      </div>
      <div class="ge-row">
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
        <div class="ge-col-1"><div class="demo-box" style="font-size:10px">1</div></div>
      </div>
    </div>
  </section>

  <!-- ==================== RESPONSIVE GRID ==================== -->
  <section id="responsive-grid" class="demo-section">
    <h2>2. Responsive Grid <span class="feature-badge">NEW</span></h2>
    <p>Use breakpoint-specific classes: <code>.ge-col-{breakpoint}-{n}</code></p>

    <h3>Breakpoints</h3>
    <table style="width:100%; margin-bottom:20px; border-collapse:collapse;">
      <tr style="background:#f8f9fa;">
        <th style="padding:8px; text-align:left; border:1px solid #dee2e6;">Class</th>
        <th style="padding:8px; text-align:left; border:1px solid #dee2e6;">Breakpoint</th>
        <th style="padding:8px; text-align:left; border:1px solid #dee2e6;">Screen Width</th>
      </tr>
      <tr><td style="padding:8px; border:1px solid #dee2e6;"><code>.ge-col-xs-*</code></td><td style="padding:8px; border:1px solid #dee2e6;">Extra Small</td><td style="padding:8px; border:1px solid #dee2e6;">&lt; 576px</td></tr>
      <tr><td style="padding:8px; border:1px solid #dee2e6;"><code>.ge-col-sm-*</code></td><td style="padding:8px; border:1px solid #dee2e6;">Small</td><td style="padding:8px; border:1px solid #dee2e6;">&lt; 768px</td></tr>
      <tr><td style="padding:8px; border:1px solid #dee2e6;"><code>.ge-col-md-*</code></td><td style="padding:8px; border:1px solid #dee2e6;">Medium</td><td style="padding:8px; border:1px solid #dee2e6;">&lt; 992px</td></tr>
      <tr><td style="padding:8px; border:1px solid #dee2e6;"><code>.ge-col-lg-*</code></td><td style="padding:8px; border:1px solid #dee2e6;">Large</td><td style="padding:8px; border:1px solid #dee2e6;">&lt; 1200px</td></tr>
      <tr><td style="padding:8px; border:1px solid #dee2e6;"><code>.ge-col-xl-*</code></td><td style="padding:8px; border:1px solid #dee2e6;">Extra Large</td><td style="padding:8px; border:1px solid #dee2e6;">&lt; 1400px</td></tr>
      <tr><td style="padding:8px; border:1px solid #dee2e6;"><code>.ge-col-xxl-*</code></td><td style="padding:8px; border:1px solid #dee2e6;">2X Large</td><td style="padding:8px; border:1px solid #dee2e6;">&lt; 1600px</td></tr>
    </table>

    <h3>Responsive Example</h3>
    <span class="code-label">.ge-col-12 .ge-col-md-6 .ge-col-lg-3</span>
    <p>Full width on mobile, 2 columns on tablet, 4 columns on desktop</p>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-12 ge-col-md-6 ge-col-lg-3"><div class="demo-box">1</div></div>
        <div class="ge-col-12 ge-col-md-6 ge-col-lg-3"><div class="demo-box">2</div></div>
        <div class="ge-col-12 ge-col-md-6 ge-col-lg-3"><div class="demo-box">3</div></div>
        <div class="ge-col-12 ge-col-md-6 ge-col-lg-3"><div class="demo-box">4</div></div>
      </div>
    </div>

    <h3>Mixed Responsive</h3>
    <span class="code-label">Sidebar + Content Layout</span>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-12 ge-col-lg-3"><div class="demo-box demo-box-alt">Sidebar<br>(12 mobile, 3 desktop)</div></div>
        <div class="ge-col-12 ge-col-lg-9"><div class="demo-box">Main Content<br>(12 mobile, 9 desktop)</div></div>
      </div>
    </div>
  </section>

  <!-- ==================== CONTAINERS ==================== -->
  <section id="containers" class="demo-section">
    <h2>3. Container Variants <span class="feature-badge">NEW</span></h2>
    <p>Control the maximum width of your container.</p>

    <h3>.ge-container-sm (max: 540px)</h3>
    <div class="ge-container ge-container-sm" style="background:#e9ecef; padding:10px;">
      <div class="ge-row">
        <div class="ge-col-12"><div class="demo-box">Small Container</div></div>
      </div>
    </div>

    <h3>.ge-container-md (max: 720px)</h3>
    <div class="ge-container ge-container-md" style="background:#e9ecef; padding:10px;">
      <div class="ge-row">
        <div class="ge-col-12"><div class="demo-box">Medium Container</div></div>
      </div>
    </div>

    <h3>.ge-container-lg (max: 960px)</h3>
    <div class="ge-container ge-container-lg" style="background:#e9ecef; padding:10px;">
      <div class="ge-row">
        <div class="ge-col-12"><div class="demo-box demo-box-alt">Large Container</div></div>
      </div>
    </div>

    <h3>.ge-container-fluid (100% width)</h3>
    <div class="ge-container ge-container-fluid" style="background:#e9ecef; padding:10px;">
      <div class="ge-row">
        <div class="ge-col-12"><div class="demo-box">Fluid Container - Full Width</div></div>
      </div>
    </div>
  </section>

  <!-- ==================== OFFSETS ==================== -->
  <section id="offsets" class="demo-section">
    <h2>4. Column Offsets <span class="feature-badge">NEW</span></h2>
    <p>Use <code>.ge-offset-{n}</code> to push columns to the right.</p>

    <h3>Basic Offsets</h3>
    <span class="code-label">.ge-col-4 .ge-offset-4</span>
    <div class="ge-container">
      <div class="ge-row ge-mb-2">
        <div class="ge-col-4 ge-offset-4"><div class="demo-box">Centered (offset-4)</div></div>
      </div>
    </div>

    <span class="code-label">.ge-col-6 .ge-offset-3</span>
    <div class="ge-container">
      <div class="ge-row ge-mb-2">
        <div class="ge-col-6 ge-offset-3"><div class="demo-box demo-box-alt">Centered (offset-3)</div></div>
      </div>
    </div>

    <span class="code-label">.ge-col-3 .ge-offset-9</span>
    <div class="ge-container">
      <div class="ge-row ge-mb-2">
        <div class="ge-col-3 ge-offset-9"><div class="demo-box">Right Aligned</div></div>
      </div>
    </div>

    <h3>Multiple Offsets</h3>
    <div class="ge-container">
      <div class="ge-row ge-mb-2">
        <div class="ge-col-2"><div class="demo-box">2</div></div>
        <div class="ge-col-2 ge-offset-2"><div class="demo-box demo-box-alt">2 + offset-2</div></div>
        <div class="ge-col-2 ge-offset-2"><div class="demo-box">2 + offset-2</div></div>
      </div>
    </div>

    <h3>Responsive Offsets</h3>
    <span class="code-label">.ge-offset-0 .ge-offset-md-3 .ge-offset-lg-4</span>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-6 ge-col-md-6 ge-col-lg-4 ge-offset-0 ge-offset-md-3 ge-offset-lg-4">
          <div class="demo-box">Responsive offset<br>(resize to see)</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== ORDERING ==================== -->
  <section id="ordering" class="demo-section">
    <h2>5. Column Ordering <span class="feature-badge">NEW</span></h2>
    <p>Use <code>.ge-order-{n}</code> to reorder columns visually.</p>

    <h3>Basic Order</h3>
    <span class="code-label">HTML order: 1, 2, 3 | Visual: 3, 1, 2</span>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-4 ge-order-2"><div class="demo-box">First in HTML (order-2)</div></div>
        <div class="ge-col-4 ge-order-3"><div class="demo-box demo-box-alt">Second in HTML (order-3)</div></div>
        <div class="ge-col-4 ge-order-1"><div class="demo-box">Third in HTML (order-1)</div></div>
      </div>
    </div>

    <h3>First & Last</h3>
    <span class="code-label">.ge-order-first and .ge-order-last</span>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-4"><div class="demo-box demo-box-light">Normal</div></div>
        <div class="ge-col-4 ge-order-first"><div class="demo-box">order-first</div></div>
        <div class="ge-col-4 ge-order-last"><div class="demo-box demo-box-alt">order-last</div></div>
      </div>
    </div>

    <h3>Responsive Ordering</h3>
    <span class="code-label">Sidebar moves to top on mobile</span>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-12 ge-col-lg-9 ge-order-2 ge-order-lg-1">
          <div class="demo-box" style="min-height:100px;">Main Content<br>(Shows 2nd on mobile, 1st on desktop)</div>
        </div>
        <div class="ge-col-12 ge-col-lg-3 ge-order-1 ge-order-lg-2">
          <div class="demo-box demo-box-alt">Sidebar<br>(Shows 1st on mobile, 2nd on desktop)</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== ALIGNMENT ==================== -->
  <section id="alignment" class="demo-section">
    <h2>6. Alignment Utilities <span class="feature-badge">NEW</span></h2>

    <h3>Horizontal Alignment (justify-content)</h3>

    <span class="code-label">.ge-justify-start</span>
    <div class="ge-container" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row ge-justify-start">
        <div class="ge-col-3"><div class="demo-box">1</div></div>
        <div class="ge-col-3"><div class="demo-box">2</div></div>
      </div>
    </div>

    <span class="code-label">.ge-justify-center</span>
    <div class="ge-container" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row ge-justify-center">
        <div class="ge-col-3"><div class="demo-box">1</div></div>
        <div class="ge-col-3"><div class="demo-box">2</div></div>
      </div>
    </div>

    <span class="code-label">.ge-justify-end</span>
    <div class="ge-container" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row ge-justify-end">
        <div class="ge-col-3"><div class="demo-box">1</div></div>
        <div class="ge-col-3"><div class="demo-box">2</div></div>
      </div>
    </div>

    <span class="code-label">.ge-justify-between</span>
    <div class="ge-container" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row ge-justify-between">
        <div class="ge-col-3"><div class="demo-box">1</div></div>
        <div class="ge-col-3"><div class="demo-box">2</div></div>
      </div>
    </div>

    <span class="code-label">.ge-justify-around</span>
    <div class="ge-container" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row ge-justify-around">
        <div class="ge-col-3"><div class="demo-box">1</div></div>
        <div class="ge-col-3"><div class="demo-box">2</div></div>
      </div>
    </div>

    <h3>Vertical Alignment (align-items)</h3>

    <span class="code-label">.ge-align-start</span>
    <div class="ge-container" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row ge-align-start" style="min-height:120px;">
        <div class="ge-col-4"><div class="demo-box">Tall<br>Content</div></div>
        <div class="ge-col-4"><div class="demo-box demo-box-alt">Short</div></div>
        <div class="ge-col-4"><div class="demo-box">Medium<br>Box</div></div>
      </div>
    </div>

    <span class="code-label">.ge-align-center</span>
    <div class="ge-container" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row ge-align-center" style="min-height:120px;">
        <div class="ge-col-4"><div class="demo-box">Tall<br>Content</div></div>
        <div class="ge-col-4"><div class="demo-box demo-box-alt">Short</div></div>
        <div class="ge-col-4"><div class="demo-box">Medium<br>Box</div></div>
      </div>
    </div>

    <span class="code-label">.ge-align-end</span>
    <div class="ge-container" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row ge-align-end" style="min-height:120px;">
        <div class="ge-col-4"><div class="demo-box">Tall<br>Content</div></div>
        <div class="ge-col-4"><div class="demo-box demo-box-alt">Short</div></div>
        <div class="ge-col-4"><div class="demo-box">Medium<br>Box</div></div>
      </div>
    </div>

    <h3>Individual Column Alignment (align-self)</h3>
    <span class="code-label">.ge-align-self-start, .ge-align-self-center, .ge-align-self-end</span>
    <div class="ge-container" style="background:#f8f9fa; padding:10px;">
      <div class="ge-row" style="min-height:150px;">
        <div class="ge-col-4 ge-align-self-start"><div class="demo-box">align-self-start</div></div>
        <div class="ge-col-4 ge-align-self-center"><div class="demo-box demo-box-alt">align-self-center</div></div>
        <div class="ge-col-4 ge-align-self-end"><div class="demo-box">align-self-end</div></div>
      </div>
    </div>
  </section>

  <!-- ==================== VISIBILITY ==================== -->
  <section id="visibility" class="demo-section">
    <h2>7. Responsive Visibility <span class="feature-badge">NEW</span></h2>
    <p>Show/hide elements at specific breakpoints.</p>

    <h3>Hidden Classes</h3>
    <p><code>.ge-hidden-{breakpoint}</code> - Hide at breakpoint and below</p>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-4"><div class="demo-box">Always Visible</div></div>
        <div class="ge-col-4 ge-hidden-md"><div class="demo-box demo-box-alt">Hidden on md and below</div></div>
        <div class="ge-col-4 ge-hidden-sm"><div class="demo-box">Hidden on sm and below</div></div>
      </div>
    </div>

    <h3>Visible-Only Classes</h3>
    <p><code>.ge-visible-{breakpoint}</code> - Show only at that breakpoint</p>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-12">
          <div class="demo-box ge-visible-xs" style="background:#ffadad;">Only visible on XS</div>
          <div class="demo-box ge-visible-sm" style="background:#ffc6ff;">Only visible on SM</div>
          <div class="demo-box ge-visible-md" style="background:#ffd6a5;">Only visible on MD</div>
          <div class="demo-box ge-visible-lg" style="background:#bdb2ff;">Only visible on LG</div>
          <div class="demo-box ge-visible-xl" style="background:#a0c4ff;">Only visible on XL</div>
          <div class="demo-box ge-visible-xxl" style="background:#b9fbc0;">Only visible on XXL</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== GAPS ==================== -->
  <section id="gaps" class="demo-section">
    <h2>8. Gap Utilities <span class="feature-badge">NEW</span></h2>
    <p>Control spacing between grid items.</p>

    <h3>.ge-gap-none (0px)</h3>
    <div class="ge-container ge-gap-none" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row">
        <div class="ge-col-4"><div class="demo-box">1</div></div>
        <div class="ge-col-4"><div class="demo-box">2</div></div>
        <div class="ge-col-4"><div class="demo-box">3</div></div>
      </div>
    </div>

    <h3>.ge-gap-sm (8px)</h3>
    <div class="ge-container ge-gap-sm" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row">
        <div class="ge-col-4"><div class="demo-box demo-box-alt">1</div></div>
        <div class="ge-col-4"><div class="demo-box demo-box-alt">2</div></div>
        <div class="ge-col-4"><div class="demo-box demo-box-alt">3</div></div>
      </div>
    </div>

    <h3>.ge-gap-lg (24px)</h3>
    <div class="ge-container ge-gap-lg" style="background:#f8f9fa; padding:10px; margin-bottom:15px;">
      <div class="ge-row">
        <div class="ge-col-4"><div class="demo-box">1</div></div>
        <div class="ge-col-4"><div class="demo-box">2</div></div>
        <div class="ge-col-4"><div class="demo-box">3</div></div>
      </div>
    </div>

    <h3>.ge-gap-xl (32px)</h3>
    <div class="ge-container ge-gap-xl" style="background:#f8f9fa; padding:10px;">
      <div class="ge-row">
        <div class="ge-col-4"><div class="demo-box demo-box-alt">1</div></div>
        <div class="ge-col-4"><div class="demo-box demo-box-alt">2</div></div>
        <div class="ge-col-4"><div class="demo-box demo-box-alt">3</div></div>
      </div>
    </div>
  </section>

  <!-- ==================== NESTED GRIDS ==================== -->
  <section id="nested" class="demo-section">
    <h2>9. Nested Grids</h2>
    <p>Place a <code>.ge-row</code> inside any column to create nested grids.</p>

    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-8">
          <div class="demo-box-light ge-p-2" style="border:2px dashed #007bff;">
            <strong>Parent: col-8</strong>
            <div class="ge-row ge-mt-2">
              <div class="ge-col-6"><div class="demo-box">Nested 6</div></div>
              <div class="ge-col-6"><div class="demo-box demo-box-alt">Nested 6</div></div>
            </div>
            <div class="ge-row ge-mt-2">
              <div class="ge-col-4"><div class="demo-box">4</div></div>
              <div class="ge-col-4"><div class="demo-box demo-box-alt">4</div></div>
              <div class="ge-col-4"><div class="demo-box">4</div></div>
            </div>
          </div>
        </div>
        <div class="ge-col-4">
          <div class="demo-box-light ge-p-2" style="border:2px dashed #dc3545; height:100%;">
            <strong>Parent: col-4</strong>
            <div class="ge-row ge-mt-2">
              <div class="ge-col-12"><div class="demo-box demo-box-alt">Nested 12</div></div>
            </div>
            <div class="ge-row ge-mt-2">
              <div class="ge-col-6"><div class="demo-box">6</div></div>
              <div class="ge-col-6"><div class="demo-box">6</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== UTILITIES ==================== -->
  <section id="utilities" class="demo-section">
    <h2>10. Common Utilities <span class="feature-badge">NEW</span></h2>

    <h3>Spacing (Margin & Padding)</h3>
    <p>Use <code>.ge-m-{0-5}</code> for margin and <code>.ge-p-{0-5}</code> for padding.</p>
    <p>Variants: <code>mt, mb, ml, mr, mx, my</code> (margin) and <code>pt, pb, pl, pr, px, py</code> (padding)</p>

    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-4"><div class="demo-box ge-m-0">m-0</div></div>
        <div class="ge-col-4"><div class="demo-box ge-m-2">m-2</div></div>
        <div class="ge-col-4"><div class="demo-box ge-m-4">m-4</div></div>
      </div>
    </div>

    <h3>Background Colors</h3>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-3"><div class="ge-bg-primary ge-text-white ge-p-3 ge-text-center ge-rounded">primary</div></div>
        <div class="ge-col-3"><div class="ge-bg-success ge-text-white ge-p-3 ge-text-center ge-rounded">success</div></div>
        <div class="ge-col-3"><div class="ge-bg-danger ge-text-white ge-p-3 ge-text-center ge-rounded">danger</div></div>
        <div class="ge-col-3"><div class="ge-bg-warning ge-p-3 ge-text-center ge-rounded">warning</div></div>
      </div>
    </div>

    <h3>Text Colors</h3>
    <div class="ge-container ge-mt-3">
      <div class="ge-row">
        <div class="ge-col-3"><div class="ge-text-primary ge-p-3 ge-text-center"><strong>text-primary</strong></div></div>
        <div class="ge-col-3"><div class="ge-text-success ge-p-3 ge-text-center"><strong>text-success</strong></div></div>
        <div class="ge-col-3"><div class="ge-text-danger ge-p-3 ge-text-center"><strong>text-danger</strong></div></div>
        <div class="ge-col-3"><div class="ge-text-muted ge-p-3 ge-text-center"><strong>text-muted</strong></div></div>
      </div>
    </div>

    <h3>Shadows</h3>
    <div class="ge-container ge-mt-3">
      <div class="ge-row">
        <div class="ge-col-4"><div class="ge-bg-white ge-shadow-sm ge-p-3 ge-text-center ge-rounded">shadow-sm</div></div>
        <div class="ge-col-4"><div class="ge-bg-white ge-shadow ge-p-3 ge-text-center ge-rounded">shadow</div></div>
        <div class="ge-col-4"><div class="ge-bg-white ge-shadow-lg ge-p-3 ge-text-center ge-rounded">shadow-lg</div></div>
      </div>
    </div>

    <h3>Border Radius</h3>
    <div class="ge-container ge-mt-3">
      <div class="ge-row">
        <div class="ge-col-3"><div class="ge-bg-primary ge-text-white ge-p-3 ge-text-center ge-rounded-0">rounded-0</div></div>
        <div class="ge-col-3"><div class="ge-bg-primary ge-text-white ge-p-3 ge-text-center ge-rounded">rounded</div></div>
        <div class="ge-col-3"><div class="ge-bg-primary ge-text-white ge-p-3 ge-text-center ge-rounded-lg">rounded-lg</div></div>
        <div class="ge-col-3"><div class="ge-bg-primary ge-text-white ge-p-3 ge-text-center ge-rounded-circle" style="width:80px;height:80px;margin:auto;">circle</div></div>
      </div>
    </div>
  </section>

  <!-- ==================== REAL WORLD EXAMPLES ==================== -->
  <section id="real-world" class="demo-section">
    <h2>11. Real-World Examples</h2>

    <h3>Card Grid Layout</h3>
    <div class="ge-container">
      <div class="ge-row">
        <div class="ge-col-12 ge-col-sm-6 ge-col-lg-3">
          <div class="ge-bg-white ge-shadow ge-rounded ge-p-3 ge-mb-3">
            <div style="height:100px; background:linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius:4px; margin-bottom:10px;"></div>
            <h4 style="margin:0 0 8px 0;">Card Title</h4>
            <p style="margin:0; color:#666; font-size:0.9rem;">Some quick example text to build on the card.</p>
          </div>
        </div>
        <div class="ge-col-12 ge-col-sm-6 ge-col-lg-3">
          <div class="ge-bg-white ge-shadow ge-rounded ge-p-3 ge-mb-3">
            <div style="height:100px; background:linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border-radius:4px; margin-bottom:10px;"></div>
            <h4 style="margin:0 0 8px 0;">Card Title</h4>
            <p style="margin:0; color:#666; font-size:0.9rem;">Some quick example text to build on the card.</p>
          </div>
        </div>
        <div class="ge-col-12 ge-col-sm-6 ge-col-lg-3">
          <div class="ge-bg-white ge-shadow ge-rounded ge-p-3 ge-mb-3">
            <div style="height:100px; background:linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); border-radius:4px; margin-bottom:10px;"></div>
            <h4 style="margin:0 0 8px 0;">Card Title</h4>
            <p style="margin:0; color:#666; font-size:0.9rem;">Some quick example text to build on the card.</p>
          </div>
        </div>
        <div class="ge-col-12 ge-col-sm-6 ge-col-lg-3">
          <div class="ge-bg-white ge-shadow ge-rounded ge-p-3 ge-mb-3">
            <div style="height:100px; background:linear-gradient(135deg, #fa709a 0%, #fee140 100%); border-radius:4px; margin-bottom:10px;"></div>
            <h4 style="margin:0 0 8px 0;">Card Title</h4>
            <p style="margin:0; color:#666; font-size:0.9rem;">Some quick example text to build on the card.</p>
          </div>
        </div>
      </div>
    </div>

    <h3>Dashboard Layout</h3>
    <div class="ge-container">
      <div class="ge-row">
        <!-- Sidebar -->
        <div class="ge-col-12 ge-col-lg-2 ge-order-2 ge-order-lg-1">
          <div class="ge-bg-dark ge-text-white ge-p-3 ge-rounded" style="min-height:200px;">
            <strong>Sidebar</strong>
            <ul style="padding-left:20px; margin-top:15px;">
              <li>Dashboard</li>
              <li>Analytics</li>
              <li>Reports</li>
              <li>Settings</li>
            </ul>
          </div>
        </div>
        <!-- Main Content -->
        <div class="ge-col-12 ge-col-lg-10 ge-order-1 ge-order-lg-2">
          <div class="ge-row ge-mb-3">
            <div class="ge-col-12 ge-col-md-4">
              <div class="ge-bg-primary ge-text-white ge-p-3 ge-rounded ge-text-center">
                <h3 style="margin:0;">1,234</h3>
                <small>Total Users</small>
              </div>
            </div>
            <div class="ge-col-12 ge-col-md-4">
              <div class="ge-bg-success ge-text-white ge-p-3 ge-rounded ge-text-center">
                <h3 style="margin:0;">$45,678</h3>
                <small>Revenue</small>
              </div>
            </div>
            <div class="ge-col-12 ge-col-md-4">
              <div class="ge-bg-warning ge-p-3 ge-rounded ge-text-center">
                <h3 style="margin:0;">89%</h3>
                <small>Conversion</small>
              </div>
            </div>
          </div>
          <div class="ge-row">
            <div class="ge-col-12 ge-col-md-8">
              <div class="ge-bg-white ge-shadow ge-p-3 ge-rounded" style="min-height:150px;">
                <strong>Chart Area</strong>
                <p class="ge-text-muted">Main analytics chart would go here</p>
              </div>
            </div>
            <div class="ge-col-12 ge-col-md-4">
              <div class="ge-bg-white ge-shadow ge-p-3 ge-rounded" style="min-height:150px;">
                <strong>Quick Stats</strong>
                <p class="ge-text-muted">Additional metrics</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <h3>Holy Grail Layout</h3>
    <div class="ge-container ge-gap-sm">
      <!-- Header -->
      <div class="ge-row">
        <div class="ge-col-12">
          <div class="ge-bg-dark ge-text-white ge-p-3 ge-rounded ge-text-center">
            <strong>Header</strong>
          </div>
        </div>
      </div>
      <!-- Body -->
      <div class="ge-row">
        <div class="ge-col-12 ge-col-md-2 ge-order-2 ge-order-md-1">
          <div class="ge-bg-secondary ge-text-white ge-p-3 ge-rounded" style="min-height:150px;">
            <strong>Left Nav</strong>
          </div>
        </div>
        <div class="ge-col-12 ge-col-md-8 ge-order-1 ge-order-md-2">
          <div class="ge-bg-light ge-p-3 ge-rounded" style="min-height:150px;">
            <strong>Main Content</strong>
            <p>This is the main content area that takes up the majority of the space.</p>
          </div>
        </div>
        <div class="ge-col-12 ge-col-md-2 ge-order-3">
          <div class="ge-bg-info ge-p-3 ge-rounded" style="min-height:150px;">
            <strong>Right Sidebar</strong>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <div class="ge-row">
        <div class="ge-col-12">
          <div class="ge-bg-dark ge-text-white ge-p-3 ge-rounded ge-text-center">
            <strong>Footer</strong>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Debug Mode -->
  <section class="demo-section">
    <h2>Debug Mode</h2>
    <p>Add <code>.ge-debug</code> to container and <code>.ge-color-info</code> or <code>.ge-breakpoint-info</code> for visual debugging.</p>

    <div class="ge-container ge-debug ge-color-info">
      <div class="ge-row">
        <div class="ge-col-3 ge-p-3">Debug col-3</div>
        <div class="ge-col-3 ge-p-3">Debug col-3</div>
        <div class="ge-col-3 ge-p-3">Debug col-3</div>
        <div class="ge-col-3 ge-p-3">Debug col-3</div>
      </div>
    </div>
  </section>

  <footer style="text-align:center; padding:40px 20px; color:#666;">
    <p><strong>Grid Engine</strong> - A Modern 12-Column Responsive Grid System</p>
    <p style="font-size:0.85rem;">Built with CSS Grid &amp; SCSS</p>
  </footer>

  <script type="module" src="<?php echo asset('grid_engine.js'); ?>"></script>
  <script nomodule src="<?php echo asset('grid_engine.js', 'nomodule'); ?>"></script>
  <script type="module">
    import GridEngine from '<?php echo asset('grid_engine.js'); ?>';
    new GridEngine();
  </script>
</body>
</html>
