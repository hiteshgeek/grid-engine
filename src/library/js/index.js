import { GridEngine } from "./GridEngine.js";
import { Tabs } from "./Tabs.js";
import { Modal } from "./components/Modal.js";

export { GridEngine, Tabs };

// Expose GridEngine class directly for IIFE build
if (typeof window !== "undefined") {
  window.GridEngine = GridEngine;
  window.Tabs = Tabs;
  window.Modal = Modal;
}
