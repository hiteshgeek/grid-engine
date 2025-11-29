import { GridEngine } from "./GridEngine.js";

export { GridEngine };

// Expose GridEngine class directly for IIFE build
if (typeof window !== "undefined") {
  window.GridEngine = GridEngine;
}
