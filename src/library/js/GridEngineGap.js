// GridEngineGap.js
export class GridEngineGap {
  // Gap size rules based on container width

  constructor(options = {}) {
    this.options = {
      containerSelectors: [".ge-container"],
      autoInit: true,
      ...options,
    };

    this.gap_rules = [
      { max: 150, gap: 2 },
      { max: 250, gap: 3 },
      { max: 350, gap: 4 },
      { max: 500, gap: 6 },
      { max: 700, gap: 8 },
      { max: 900, gap: 12 },
      { max: Infinity, gap: 16 },
    ];

    if (this.options.autoInit) {
      this.init();
    }
  }

  getGap(width) {
    return this.gap_rules.find((rule) => width <= rule.max)?.gap || 16;
  }

  applyGap(container) {
    const width = container.clientWidth;
    const gap = this.getGap(width);

    container.style.setProperty("--ge-gap", `${gap}px`);
    container.style.setProperty("--ge-row-gap", `${gap}px`);
  }

  init() {
    const containers = document.querySelectorAll(
      this.options.containerSelectors.join(",")
    );

    containers.forEach((container) => {
      this.applyGap(container);
      new ResizeObserver(() => this.applyGap(container)).observe(container);
    });
  }

  refresh() {
    document
      .querySelectorAll(this.options.containerSelectors.join(","))
      .forEach((container) => this.applyGap(container));
  }
}
