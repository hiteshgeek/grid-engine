// modal.js - ES6 Module with Helper Methods
import { icons } from "./icons.js";

export default class Modal {
  constructor(element, options = {}) {
    this.element =
      typeof element === "string" ? document.querySelector(element) : element;

    if (!this.element) {
      throw new Error("Modal element not found");
    }

    this.options = {
      backdrop: options.backdrop !== undefined ? options.backdrop : true,
      keyboard: options.keyboard !== undefined ? options.keyboard : true,
      focus: options.focus !== undefined ? options.focus : true,
      centered: options.centered !== undefined ? options.centered : false,
      ...options,
    };

    this.isShown = false;
    this.backdrop = null;
    this.scrollbarWidth = 0;

    // Store lifecycle callbacks
    this.onShowCallback = options.onShow;
    this.onShownCallback = options.onShown;
    this.onHideCallback = options.onHide;
    this.onHiddenCallback = options.onHidden;

    this._init();
  }

  _init() {
    // Find or create dialog elements
    this.dialog = this.element.querySelector(".modal-dialog");
    this.content = this.element.querySelector(".modal-content");

    // Apply centered class if needed
    if (this.options.centered && this.dialog) {
      this.dialog.classList.add("modal-dialog-centered");
    }

    // Bind event listeners
    this._bindEvents();
  }

  _bindEvents() {
    // Close button
    const closeButtons = this.element.querySelectorAll(
      '[data-dismiss="modal"]'
    );
    closeButtons.forEach((btn) => {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        this.hide();
      });
    });

    // Backdrop click
    this.element.addEventListener("click", (e) => {
      if (e.target === this.element && this.options.backdrop !== "static") {
        this.hide();
      }
    });

    // Keyboard events
    if (this.options.keyboard) {
      this._keydownHandler = (e) => {
        if (e.key === "Escape" && this.isShown) {
          this.hide();
        }
      };
      document.addEventListener("keydown", this._keydownHandler);
    }
  }

  show() {
    if (this.isShown) return;

    // Trigger show event
    const showEvent = new CustomEvent("show.modal", {
      bubbles: true,
      cancelable: true,
      detail: { relatedTarget: this.element },
    });
    this.element.dispatchEvent(showEvent);

    // Call lifecycle callback
    if (this.onShowCallback) {
      this.onShowCallback();
    }

    if (showEvent.defaultPrevented) return;

    this.isShown = true;

    // Store previously focused element to restore later
    this.previouslyFocusedElement = document.activeElement;

    // Prevent body scroll
    this._handleBodyScroll();

    // Show backdrop
    if (this.options.backdrop) {
      this._showBackdrop();
    }

    // Show modal - remove aria-hidden BEFORE displaying
    this.element.removeAttribute("aria-hidden");
    this.element.setAttribute("aria-modal", "true");
    this.element.setAttribute("role", "dialog");
    this.element.style.display = "block";

    // Force reflow
    this.element.offsetHeight;

    // Add show class for animation
    this.element.classList.add("show");

    // Focus management - do this after display is set
    if (this.options.focus) {
      this._enforceFocus();
    }

    // Trigger shown event after transition
    setTimeout(() => {
      const shownEvent = new CustomEvent("shown.modal", {
        bubbles: true,
        detail: { relatedTarget: this.element },
      });
      this.element.dispatchEvent(shownEvent);

      // Call lifecycle callback
      if (this.onShownCallback) {
        this.onShownCallback();
      }
    }, 300);
  }

  hide() {
    if (!this.isShown) return;

    // Trigger hide event
    const hideEvent = new CustomEvent("hide.modal", {
      bubbles: true,
      cancelable: true,
      detail: { relatedTarget: this.element },
    });
    this.element.dispatchEvent(hideEvent);

    // Call lifecycle callback
    if (this.onHideCallback) {
      this.onHideCallback();
    }

    if (hideEvent.defaultPrevented) return;

    this.isShown = false;

    // Remove focus from modal before hiding
    if (
      document.activeElement &&
      this.element.contains(document.activeElement)
    ) {
      document.activeElement.blur();
    }

    // Remove show class for animation
    this.element.classList.remove("show");

    // Hide backdrop
    if (this.backdrop) {
      this._hideBackdrop();
    }

    // Hide modal after transition
    setTimeout(() => {
      this.element.style.display = "none";
      this.element.setAttribute("aria-hidden", "true");
      this.element.removeAttribute("aria-modal");
      this.element.removeAttribute("role");

      // Restore body scroll
      this._resetBodyScroll();

      // Restore focus to previously focused element
      if (
        this.previouslyFocusedElement &&
        this.previouslyFocusedElement.focus
      ) {
        this.previouslyFocusedElement.focus();
        this.previouslyFocusedElement = null;
      }

      // Trigger hidden event
      const hiddenEvent = new CustomEvent("hidden.modal", {
        bubbles: true,
        detail: { relatedTarget: this.element },
      });
      this.element.dispatchEvent(hiddenEvent);

      // Call lifecycle callback
      if (this.onHiddenCallback) {
        this.onHiddenCallback();
      }
    }, 300);
  }

  toggle() {
    this.isShown ? this.hide() : this.show();
  }

  _showBackdrop() {
    if (!this.backdrop) {
      this.backdrop = document.createElement("div");
      this.backdrop.className = "modal-backdrop fade";
      document.body.appendChild(this.backdrop);

      // Force reflow
      this.backdrop.offsetHeight;
    }

    this.backdrop.classList.add("show");

    // Click handler for backdrop
    if (this.options.backdrop !== "static") {
      this.backdrop.addEventListener("click", () => this.hide());
    }
  }

  _hideBackdrop() {
    if (!this.backdrop) return;

    this.backdrop.classList.remove("show");

    setTimeout(() => {
      if (this.backdrop) {
        this.backdrop.remove();
        this.backdrop = null;
      }
    }, 150);
  }

  _handleBodyScroll() {
    // Calculate scrollbar width
    this.scrollbarWidth =
      window.innerWidth - document.documentElement.clientWidth;

    // Store original body overflow
    this.originalBodyOverflow = document.body.style.overflow;
    this.originalBodyPaddingRight = document.body.style.paddingRight;

    // Prevent scroll and adjust for scrollbar
    document.body.style.overflow = "hidden";
    if (this.scrollbarWidth > 0) {
      document.body.style.paddingRight = `${this.scrollbarWidth}px`;
    }
  }

  _resetBodyScroll() {
    // Restore original body styles
    document.body.style.overflow = this.originalBodyOverflow || "";
    document.body.style.paddingRight = this.originalBodyPaddingRight || "";
  }

  _enforceFocus() {
    // Focus first focusable element or the modal itself
    const focusableElements = this.element.querySelectorAll(
      'button:not([disabled]), [href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"]):not([disabled])'
    );

    if (focusableElements.length > 0) {
      // Use setTimeout to ensure the element is visible before focusing
      setTimeout(() => {
        focusableElements[0].focus();
      }, 50);
    } else {
      // Make modal focusable if no other elements are
      this.element.setAttribute("tabindex", "-1");
      setTimeout(() => {
        this.element.focus();
      }, 50);
    }
  }

  dispose() {
    this.hide();

    // Remove event listeners
    if (this._keydownHandler) {
      document.removeEventListener("keydown", this._keydownHandler);
    }

    // Remove element references
    this.element = null;
    this.dialog = null;
    this.content = null;
    this.backdrop = null;
  }

  // Static method to initialize modals via data attributes
  static initializeDataAPI() {
    document.addEventListener("click", (e) => {
      const trigger = e.target.closest('[data-toggle="modal"]');
      if (!trigger) return;

      e.preventDefault();

      const selector =
        trigger.getAttribute("data-target") || trigger.getAttribute("href");
      const modalElement = document.querySelector(selector);

      if (!modalElement) return;

      // Get or create modal instance
      let modal = modalElement._modalInstance;
      if (!modal) {
        const options = {
          backdrop: trigger.getAttribute("data-backdrop") || true,
          keyboard: trigger.getAttribute("data-keyboard") !== "false",
        };
        modal = new Modal(modalElement, options);
        modalElement._modalInstance = modal;
      }

      modal.show();
    });
  }

  // Helper method to create modal HTML structure
  static _createModalElement(options) {
    const {
      title = "",
      content = "",
      headerClass = "",
      size = "", // sm, lg, xl, fullscreen
      buttons = [],
      centered = false,
    } = options;

    const modal = document.createElement("div");
    modal.className = "modal fade";
    modal.setAttribute("tabindex", "-1");
    modal.setAttribute("aria-hidden", "true");

    // Handle size classes
    let sizeClass = "";
    if (size) {
      if (size === "fullscreen") {
        sizeClass = "modal-fullscreen";
      } else {
        sizeClass = `modal-${size}`;
      }
    }

    const centeredClass = centered ? "modal-dialog-centered" : "";

    modal.innerHTML = `
      <div class="modal-dialog ${sizeClass} ${centeredClass}">
        <div class="modal-content">
          <div class="modal-header ${headerClass}">
            <h5 class="modal-title">${title}</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
              ${icons.cancel}
            </button>
          </div>
          <div class="modal-body">
            ${content}
          </div>
          ${
            buttons.length > 0
              ? `
            <div class="modal-footer">
              ${buttons
                .map((btn) => {
                  const dismissAttr = btn.dismiss ? 'data-dismiss="modal"' : "";
                  const btnClass =
                    btn.className || btn.class || "ge-btn-primary";
                  return `<button type="button" class="ge-btn ${btnClass}" ${dismissAttr}>${
                    btn.label || "OK"
                  }</button>`;
                })
                .join("")}
            </div>
          `
              : ""
          }
        </div>
      </div>
    `;

    document.body.appendChild(modal);

    // Attach button click handlers
    buttons.forEach((btn, index) => {
      if (btn.onClick) {
        const btnElement = modal.querySelectorAll(".modal-footer button")[
          index
        ];
        if (btnElement) {
          btnElement.addEventListener("click", (e) => {
            const modalInstance = modal._modalInstance;
            btn.onClick(e, modalInstance);
          });
        }
      }
    });

    return modal;
  }

  // Static helper: Alert modal
  static alert(options) {
    const {
      title = "Alert",
      message = "",
      type = "info", // info, success, warning, danger
      confirmLabel = "OK",
      confirmClass = "", // Optional custom button class
      onConfirm,
      size = "", // sm, lg, xl, fullscreen
      centered = false,
    } = options;

    const typeHeaderClass = {
      info: "modal-header-info",
      success: "modal-header-success",
      warning: "modal-header-warning",
      danger: "modal-header-danger",
    };

    const modalElement = Modal._createModalElement({
      title,
      content: `<p>${message}</p>`,
      headerClass: typeHeaderClass[type] || "",
      size,
      centered,
      buttons: [
        {
          label: confirmLabel,
          className: confirmClass || `ge-btn-${type}`,
          dismiss: true,
          onClick: () => {
            if (onConfirm) onConfirm();
          },
        },
      ],
    });

    const modal = new Modal(modalElement, options);
    modalElement._modalInstance = modal;

    // Auto-dispose after hidden
    modalElement.addEventListener("hidden.modal", () => {
      modal.dispose();
      modalElement.remove();
    });

    return modal;
  }

  // Static helper: Confirm modal
  static confirm(options) {
    const {
      title = "Confirm",
      message = "",
      type = "primary",
      confirmLabel = "Confirm",
      cancelLabel = "Cancel",
      confirmClass = "", // Optional custom button class
      cancelClass = "", // Optional custom button class
      onConfirm,
      onCancel,
      size = "", // sm, lg, xl, fullscreen
      centered = false,
    } = options;

    const typeHeaderClass = {
      info: "modal-header-info",
      success: "modal-header-success",
      warning: "modal-header-warning",
      danger: "modal-header-danger",
      primary: "modal-header-primary",
    };

    const modalElement = Modal._createModalElement({
      title,
      content: `<p>${message}</p>`,
      headerClass: typeHeaderClass[type] || "",
      size,
      centered,
      buttons: [
        {
          label: cancelLabel,
          className: cancelClass || "ge-btn-sm ge-btn-secondary",
          dismiss: true,
          onClick: () => {
            if (onCancel) onCancel();
          },
        },
        {
          label: confirmLabel,
          className: confirmClass || `ge-btn-sm ge-btn-${type}`,
          dismiss: true,
          onClick: () => {
            if (onConfirm) onConfirm();
          },
        },
      ],
    });

    const modal = new Modal(modalElement, options);
    modalElement._modalInstance = modal;

    // Auto-dispose after hidden
    modalElement.addEventListener("hidden.modal", () => {
      modal.dispose();
      modalElement.remove();
    });

    return modal;
  }

  // Static helper: Prompt modal
  static prompt(options) {
    const {
      title = "Input Required",
      label = "",
      placeholder = "",
      inputType = "text",
      defaultValue = "",
      confirmLabel = "Submit",
      cancelLabel = "Cancel",
      confirmClass = "", // Optional custom button class
      cancelClass = "", // Optional custom button class
      onConfirm,
      onCancel,
      size = "", // sm, lg, xl, fullscreen
      centered = false,
    } = options;

    const inputId = `modal-prompt-${Date.now()}`;

    const modalElement = Modal._createModalElement({
      title,
      content: `
        <div style="margin-bottom: 15px;">
          ${
            label
              ? `<label for="${inputId}" class="form-label">${label}</label>`
              : ""
          }
          <input type="${inputType}" id="${inputId}" class="form-control" placeholder="${placeholder}" value="${defaultValue}">
        </div>
      `,
      size,
      centered,
      buttons: [
        {
          label: cancelLabel,
          className: cancelClass || "ge-btn-secondary",
          dismiss: true,
          onClick: () => {
            if (onCancel) onCancel();
          },
        },
        {
          label: confirmLabel,
          className: confirmClass || "ge-btn-primary",
          dismiss: true,
          onClick: () => {
            const input = modalElement.querySelector(`#${inputId}`);
            if (onConfirm && input) {
              onConfirm(input.value);
            }
          },
        },
      ],
    });

    const modal = new Modal(modalElement, options);
    modalElement._modalInstance = modal;

    // Focus input after modal is shown
    modalElement.addEventListener("shown.modal", () => {
      const input = modalElement.querySelector(`#${inputId}`);
      if (input) input.focus();
    });

    // Auto-dispose after hidden
    modalElement.addEventListener("hidden.modal", () => {
      modal.dispose();
      modalElement.remove();
    });

    return modal;
  }

  // Static helper: Create custom modal
  static create(options) {
    const modalElement = Modal._createModalElement(options);
    const modal = new Modal(modalElement, options);
    modalElement._modalInstance = modal;

    // Auto-dispose after hidden
    modalElement.addEventListener("hidden.modal", () => {
      modal.dispose();
      modalElement.remove();
    });

    return modal;
  }
}

// Auto-initialize on DOM ready
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", () =>
    Modal.initializeDataAPI()
  );
} else {
  Modal.initializeDataAPI();
}

export { Modal };
