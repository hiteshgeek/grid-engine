export default class GridEngine {
  constructor(config) {
    this.config = config;
    console.log("Grid engine loaded");
  }

  generateGridCSS() {
    const cols = this.config.columns.map((c) => c.width).join(" ");
    const gap = this.config.container.gap || "0px";

    return `
      display: grid;
      grid-template-columns: ${cols};
      gap: ${gap};
      max-width: ${this.config.container.maxWidth};
    `;
  }
}

export { GridEngine };
