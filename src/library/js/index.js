import { GridEngine } from "./GridEngine.js";
import { Tabs } from "./Tabs.js";

export { GridEngine, Tabs };

// Expose GridEngine class directly for IIFE build
if (typeof window !== "undefined") {
  window.GridEngine = GridEngine;
  window.Tabs = Tabs;
}
