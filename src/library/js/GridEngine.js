import { GridEngineGap } from "./GridEngineGap.js";
import { enableButtonRipple } from "./components/button.js";

export default class GridEngine {
  constructor(options = {}) {
    this.options = {
      enableGapEngine: true,
      ...options,
    };

    enableButtonRipple();

    // Initialize gap engine
    if (this.options.enableGapEngine) {
      this.gapEngine = new GridEngineGap({
        containerSelectors: [".ge-container", ".ge-wrapper"],
        autoInit: true,
      });
    }
  }

  // Manual method to refresh layout (if DOM changes)
  refresh() {
    if (this.gapEngine) {
      this.gapEngine.refresh();
    }
  }
}

export { GridEngine };
