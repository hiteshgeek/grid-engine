/**
 * Modern Tabs Component
 * Feature-rich, event-driven tab system with animation support
 */

export default class Tabs {
  constructor(selector, options = {}) {
    this.container = document.querySelector(selector);
    if (!this.container) {
      console.warn(`Tabs: No element found with selector "${selector}"`);
      return;
    }

    // Core elements
    this.wrapper = this.container.closest(".tabs-wrapper");
    this.tabButtons = this.container.querySelectorAll("[data-tab]");
    this.panels = this.wrapper?.querySelectorAll(".tab-panel") || [];

    // State management
    this.activeIndex = this.getInitialActiveIndex();
    this.previousIndex = -1;
    this.isAnimating = false;
    this.history = [];

    // Configuration
    this.settings = {
      animation: options.animation ?? false,
      animationType: options.animationType || "fade", // 'fade', 'slide', 'none'
      keyboard: options.keyboard ?? true,
      history: options.history ?? false,
      autoDestroy: options.autoDestroy ?? true,
      destroyOnHide: options.destroyOnHide ?? false,
      preloadAll: options.preloadAll ?? false,
      lazy: options.lazy ?? false,
      beforeChange: options.beforeChange || null,
      onTabShow: options.onTabShow || null,
      onTabHide: options.onTabHide || null,
      onTabChanged: options.onTabChanged || null,
      onTabClick: options.onTabClick || null,
      onInit: options.onInit || null,
      onDestroy: options.onDestroy || null,
    };

    // Event listeners storage for cleanup
    this.listeners = [];

    this.init();
  }

  /**
   * Initialize the tabs component
   */
  init() {
    if (!this.tabButtons.length || !this.panels.length) {
      console.warn("Tabs: No tab buttons or panels found");
      return;
    }

    // Validate that panels exist for each button
    const missingPanels = [];
    this.tabButtons.forEach((button, index) => {
      const targetId = button.dataset.tab;
      const panel =
        this.wrapper.querySelector(`#${targetId}`) || this.panels[index];
      if (!panel) {
        missingPanels.push(targetId);
      }
    });

    if (missingPanels.length > 0) {
      console.error(
        `Tabs: Missing panels for tabs: ${missingPanels.join(", ")}`
      );
      console.info(
        "Fix: Ensure each button's data-tab matches a panel's ID, or panels are in the same order as buttons"
      );
    }

    this.setupAccessibility();
    this.bindEvents();
    this.setupAnimation();
    this.activateTab(this.activeIndex, false);

    if (this.settings.preloadAll) {
      this.preloadAllPanels();
    }

    // Trigger init callback
    this.trigger("onInit", { instance: this, activeIndex: this.activeIndex });

    return this;
  }

  /**
   * Get initial active tab index from HTML or default to 0
   */
  getInitialActiveIndex() {
    const activeButton = [...this.tabButtons].findIndex((btn) =>
      btn.classList.contains("active")
    );
    return activeButton !== -1 ? activeButton : 0;
  }

  /**
   * Setup ARIA attributes for accessibility
   */
  setupAccessibility() {
    this.container.setAttribute("role", "tablist");

    this.tabButtons.forEach((button, index) => {
      const tabId = button.dataset.tab;
      const panelId = `panel-${tabId}`;

      button.setAttribute("role", "tab");
      button.setAttribute("id", `tab-${tabId}`);
      button.setAttribute("aria-controls", panelId);
      button.setAttribute("tabindex", index === this.activeIndex ? "0" : "-1");
    });

    this.panels.forEach((panel) => {
      const panelId = panel.id;
      panel.setAttribute("role", "tabpanel");
      panel.setAttribute("id", `panel-${panelId}`);
      panel.setAttribute("aria-labelledby", `tab-${panelId}`);
    });
  }

  /**
   * Setup animation classes
   */
  setupAnimation() {
    if (!this.settings.animation) return;

    this.panels.forEach((panel) => {
      if (this.settings.animationType === "fade") {
        panel.classList.add("tab-panel-fade");
      } else if (this.settings.animationType === "slide") {
        panel.classList.add("tab-panel-slide");
      }
    });
  }

  /**
   * Bind all event listeners
   */
  bindEvents() {
    // Click events on tab buttons
    this.tabButtons.forEach((button, index) => {
      const clickHandler = (e) => {
        e.preventDefault();
        if (!button.disabled && !button.classList.contains("loading")) {
          this.trigger("onTabClick", { button, index, event: e });
          this.activateTab(index);
        }
      };
      button.addEventListener("click", clickHandler);
      this.listeners.push({
        element: button,
        event: "click",
        handler: clickHandler,
      });
    });

    // Keyboard navigation
    if (this.settings.keyboard) {
      const keydownHandler = (e) => this.handleKeyboard(e);
      this.container.addEventListener("keydown", keydownHandler);
      this.listeners.push({
        element: this.container,
        event: "keydown",
        handler: keydownHandler,
      });
    }

    // Browser history
    if (this.settings.history) {
      const popstateHandler = () => this.handleHistoryChange();
      window.addEventListener("popstate", popstateHandler);
      this.listeners.push({
        element: window,
        event: "popstate",
        handler: popstateHandler,
      });
    }
  }

  /**
   * Handle keyboard navigation (Arrow keys, Home, End)
   */
  handleKeyboard(e) {
    const { key } = e;
    const isVertical = this.container.classList.contains("tabs-vertical");

    let newIndex = this.activeIndex;
    let shouldHandle = false;

    if (key === "ArrowRight" && !isVertical) {
      e.preventDefault();
      newIndex = this.getNextEnabledTab(this.activeIndex, 1);
      shouldHandle = true;
    } else if (key === "ArrowLeft" && !isVertical) {
      e.preventDefault();
      newIndex = this.getNextEnabledTab(this.activeIndex, -1);
      shouldHandle = true;
    } else if (key === "ArrowDown" && isVertical) {
      e.preventDefault();
      newIndex = this.getNextEnabledTab(this.activeIndex, 1);
      shouldHandle = true;
    } else if (key === "ArrowUp" && isVertical) {
      e.preventDefault();
      newIndex = this.getNextEnabledTab(this.activeIndex, -1);
      shouldHandle = true;
    } else if (key === "Home") {
      e.preventDefault();
      newIndex = this.getNextEnabledTab(-1, 1);
      shouldHandle = true;
    } else if (key === "End") {
      e.preventDefault();
      newIndex = this.getNextEnabledTab(this.tabButtons.length, -1);
      shouldHandle = true;
    }

    if (shouldHandle && newIndex !== this.activeIndex && newIndex !== -1) {
      this.activateTab(newIndex).then(() => {
        this.tabButtons[newIndex].focus();
        this.scrollTabIntoView(this.tabButtons[newIndex]);
      });
    }
  }

  /**
   * Get next enabled tab index (skips disabled tabs)
   */
  getNextEnabledTab(currentIndex, direction) {
    const length = this.tabButtons.length;
    let newIndex = currentIndex;
    let attempts = 0;

    do {
      newIndex = (newIndex + direction + length) % length;
      attempts++;

      if (attempts > length) {
        return -1; // All tabs are disabled
      }
    } while (
      this.tabButtons[newIndex].disabled ||
      this.tabButtons[newIndex].classList.contains("loading")
    );

    return newIndex;
  }

  /**
   * Smoothly scroll tab into view
   */
  scrollTabIntoView(button) {
    if (!button) return;

    const container = this.container;
    const isVertical = container.classList.contains("tabs-vertical");

    // Only scroll if container is scrollable
    if (isVertical) {
      if (container.scrollHeight > container.clientHeight) {
        button.scrollIntoView({
          behavior: "smooth",
          block: "nearest",
          inline: "nearest",
        });
      }
    } else {
      if (container.scrollWidth > container.clientWidth) {
        button.scrollIntoView({
          behavior: "smooth",
          block: "nearest",
          inline: "center",
        });
      }
    }
  }

  /**
   * Activate a specific tab by index
   */
  async activateTab(index, addToHistory = true) {
    if (index < 0 || index >= this.tabButtons.length) return;
    if (index === this.activeIndex || this.isAnimating) return;

    const button = this.tabButtons[index];
    const targetId = button.dataset.tab;

    // Try multiple ways to find the panel
    let targetPanel = this.wrapper.querySelector(`#${targetId}`);

    // If not found by ID, try finding by index position
    if (!targetPanel && this.panels[index]) {
      targetPanel = this.panels[index];
    }

    // If still not found, try data-tab attribute
    if (!targetPanel) {
      targetPanel = this.wrapper.querySelector(
        `[data-tab-panel="${targetId}"]`
      );
    }

    if (!targetPanel) {
      console.warn(
        `Tabs: Panel with id "${targetId}" not found. Make sure panel IDs match button data-tab values.`
      );
      return;
    }

    // beforeChange hook - can prevent tab change
    if (this.settings.beforeChange) {
      const shouldContinue = await this.trigger("beforeChange", {
        from: this.activeIndex,
        to: index,
        button,
        panel: targetPanel,
      });

      if (shouldContinue === false) return;
    }

    this.isAnimating = true;
    this.previousIndex = this.activeIndex;

    // Hide previous tab
    if (this.previousIndex >= 0) {
      const previousPanel = this.panels[this.previousIndex];
      const previousButton = this.tabButtons[this.previousIndex];

      previousButton?.classList.remove("active");
      previousButton?.setAttribute("aria-selected", "false");
      previousButton?.setAttribute("tabindex", "-1");

      this.trigger("onTabHide", {
        index: this.previousIndex,
        panel: previousPanel,
        button: previousButton,
      });

      previousPanel?.classList.remove("active");

      if (this.settings.destroyOnHide && previousPanel) {
        this.destroyPanel(previousPanel);
      }
    }

    // Show new tab
    button.classList.add("active");
    button.setAttribute("aria-selected", "true");
    button.setAttribute("tabindex", "0");

    targetPanel.classList.add("active");

    // Lazy load content if needed
    if (this.settings.lazy && !targetPanel.dataset.loaded) {
      await this.loadPanel(targetPanel);
    }

    this.activeIndex = index;

    // Wait for animation
    if (this.settings.animation) {
      await this.waitForAnimation(targetPanel);
    }

    this.isAnimating = false;

    // Add to browser history
    if (this.settings.history && addToHistory) {
      this.addToHistory(targetId);
    }

    // Trigger callbacks
    this.trigger("onTabShow", {
      index,
      panel: targetPanel,
      button,
    });

    this.trigger("onTabChanged", {
      from: this.previousIndex,
      to: index,
      panel: targetPanel,
      button,
    });

    // Dispatch custom event
    this.dispatchEvent("tab:changed", {
      from: this.previousIndex,
      to: index,
      tabId: targetId,
    });
  }

  /**
   * Wait for animation to complete
   */
  waitForAnimation(panel) {
    return new Promise((resolve) => {
      const duration = this.settings.animationType === "none" ? 0 : 300;
      setTimeout(resolve, duration);
    });
  }

  /**
   * Lazy load panel content
   */
  async loadPanel(panel) {
    const url = panel.dataset.url;
    if (!url) {
      panel.dataset.loaded = "true";
      return;
    }

    try {
      panel.innerHTML = '<div class="tab-loading">Loading...</div>';
      const response = await fetch(url);
      const html = await response.text();
      panel.innerHTML = html;
      panel.dataset.loaded = "true";
    } catch (error) {
      panel.innerHTML = '<div class="tab-error">Failed to load content</div>';
      console.error("Tabs: Failed to load panel content", error);
    }
  }

  /**
   * Destroy panel content (for memory optimization)
   */
  destroyPanel(panel) {
    if (panel.dataset.url) {
      panel.innerHTML = "";
      panel.dataset.loaded = "false";
    }
  }

  /**
   * Preload all panels
   */
  preloadAllPanels() {
    this.panels.forEach((panel) => {
      if (this.settings.lazy && !panel.dataset.loaded) {
        this.loadPanel(panel);
      }
    });
  }

  /**
   * Add tab to browser history
   */
  addToHistory(tabId) {
    const url = new URL(window.location);
    url.searchParams.set("tab", tabId);
    window.history.pushState({ tabId }, "", url);
  }

  /**
   * Handle browser back/forward
   */
  handleHistoryChange() {
    const params = new URLSearchParams(window.location.search);
    const tabId = params.get("tab");

    if (tabId) {
      const index = [...this.tabButtons].findIndex(
        (btn) => btn.dataset.tab === tabId
      );
      if (index !== -1) {
        this.activateTab(index, false);
      }
    }
  }

  /**
   * Show a specific tab by ID or index
   */
  show(target) {
    const index =
      typeof target === "number"
        ? target
        : [...this.tabButtons].findIndex((btn) => btn.dataset.tab === target);

    if (index !== -1) {
      this.activateTab(index);
    }
  }

  /**
   * Get current active tab
   */
  getActive() {
    return {
      index: this.activeIndex,
      button: this.tabButtons[this.activeIndex],
      panel: this.panels[this.activeIndex],
      id: this.tabButtons[this.activeIndex]?.dataset.tab,
    };
  }

  /**
   * Disable a tab
   */
  disable(target) {
    const button = this.getButton(target);
    if (button) {
      button.disabled = true;
      button.setAttribute("aria-disabled", "true");
    }
  }

  /**
   * Enable a tab
   */
  enable(target) {
    const button = this.getButton(target);
    if (button) {
      button.disabled = false;
      button.setAttribute("aria-disabled", "false");
    }
  }

  /**
   * Set loading state on a tab
   */
  setLoading(target, loading = true) {
    const button = this.getButton(target);
    if (button) {
      button.classList.toggle("loading", loading);
    }
  }

  /**
   * Get button by index or tab ID
   */
  getButton(target) {
    return typeof target === "number"
      ? this.tabButtons[target]
      : [...this.tabButtons].find((btn) => btn.dataset.tab === target);
  }

  /**
   * Trigger callback with error handling
   */
  async trigger(callbackName, data) {
    const callback = this.settings[callbackName];
    if (typeof callback === "function") {
      try {
        return await callback(data);
      } catch (error) {
        console.error(`Tabs: Error in ${callbackName} callback`, error);
      }
    }
  }

  /**
   * Dispatch custom DOM event
   */
  dispatchEvent(eventName, detail) {
    const event = new CustomEvent(eventName, {
      bubbles: true,
      cancelable: true,
      detail,
    });
    this.wrapper.dispatchEvent(event);
  }

  /**
   * Destroy the tabs instance
   */
  destroy() {
    // Trigger destroy callback
    this.trigger("onDestroy", { instance: this });

    // Remove all event listeners
    this.listeners.forEach(({ element, event, handler }) => {
      element.removeEventListener(event, handler);
    });
    this.listeners = [];

    // Remove ARIA attributes
    this.tabButtons.forEach((button) => {
      button.removeAttribute("role");
      button.removeAttribute("aria-controls");
      button.removeAttribute("aria-selected");
      button.removeAttribute("tabindex");
    });

    this.panels.forEach((panel) => {
      panel.removeAttribute("role");
      panel.removeAttribute("aria-labelledby");
    });

    // Clear references
    this.tabButtons = null;
    this.panels = null;
    this.container = null;
    this.wrapper = null;
  }

  /**
   * Refresh the tabs (useful after dynamic content changes)
   */
  refresh() {
    this.destroy();
    this.init();
  }
}

export { Tabs };
