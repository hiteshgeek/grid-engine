if (typeof window !== "undefined") {
  const grid_engine = new GridEngine();
  window.grid_engine = grid_engine;

  Modal.initializeDataAPI();

  const toggle_grid_edit = document.querySelector("#toggle_grid_edit");
  const ge_container = document.querySelector(".ge-container");
  const add_layout = document.querySelector("#add_layout");

  const preview_actions = document.createElement("div");
  preview_actions.classList.add("grid-preview-actions");

  const edit_button = document.createElement("button");
  edit_button.classList.add("ge-btn", "ge-btn-sm", "ge-btn-warning");
  edit_button.textContent = "Edit";

  const delete_button = document.createElement("button");
  delete_button.classList.add("ge-btn", "ge-btn-sm", "ge-btn-danger");
  delete_button.textContent = "Delete";

  preview_actions.appendChild(edit_button);
  preview_actions.appendChild(delete_button);

  if (add_layout) {
    add_layout.addEventListener("click", () => {
      createGridEditModal();
    });
  }
  if (toggle_grid_edit) {
    toggle_grid_edit.addEventListener("click", () => {
      ge_container.classList.toggle("ge-editable");

      if (ge_container.classList.contains("ge-editable")) {
        toggle_grid_edit.textContent = "View Mode";
        toggle_grid_edit.classList.remove("ge-btn-primary");
        toggle_grid_edit.classList.add("ge-btn-warning");
        add_layout.classList.remove("hidden");
      } else {
        toggle_grid_edit.textContent = "Edit Mode";
        toggle_grid_edit.classList.remove("ge-btn-warning");
        toggle_grid_edit.classList.add("ge-btn-primary");
        add_layout.classList.add("hidden");
      }
      // Add preview actions to each grid item
      const grid_items = ge_container.querySelectorAll(
        ".ge-row>.ge-col, .ge-row>[class*='ge-col-'], .ge-row>[class^='ge-col-']"
      );
      grid_items.forEach((item) => {
        if (ge_container.classList.contains("ge-editable")) {
          // Add actions if not already present
          if (!item.querySelector(".grid-preview-actions")) {
            const actions_clone = preview_actions.cloneNode(true);
            item.appendChild(actions_clone);
          }
        } else {
          // Remove actions
          const actions = item.querySelector(".grid-preview-actions");
          if (actions) {
            actions.remove();
          }
        }
      });
    });
  }

  // Example: Listen to events
  // document.getElementById("basicModal").addEventListener("shown.modal", (e) => {
  //   console.log("Modal shown!", e.detail);
  // });

  // document.getElementById("basicModal").addEventListener("show.modal", (e) => {
  //   console.log("Modal showing!", e.detail);
  // });

  // document
  //   .getElementById("basicModal")
  //   .addEventListener("hidden.modal", (e) => {
  //     console.log("Modal hidden!", e.detail);
  //   });

  // document.getElementById("basicModal").addEventListener("hide.modal", (e) => {
  //   console.log("Modal hiding!", e.detail);
  // });
  // new Tabs('[data-tab-group="example1"]', {
  //   onTabChange: (id, index) => {
  //     console.log(`Switched to: ${id} (Index: ${index})`);
  //   },
  // });

  // // Tabs instance 2 (vertical)
  // new Tabs('[data-tab-group="example2"]');

  const tabs1 = new Tabs("#grid_tabs", {
    // onTabChanged: (data) => console.log("Tab changed:", data),
  });
  // const tabs2 = new Tabs("#tabs2");
  // const tabs3 = new Tabs("#tabs3");
  // const tabs4 = new Tabs("#tabs4");
  // const tabs5 = new Tabs("#tabs5");
}

document.addEventListener("DOMContentLoaded", function () {
  const toggle_debug = document.querySelector("#toggle_debug");
  const toggle_color_info = document.querySelector("#toggle_color_info");
  const toggle_breakpoint_info = document.querySelector(
    "#toggle_breakpoint_info"
  );
  const toggle_col_info = document.querySelector("#toggle_col_info");
  const body = document.querySelector("body");

  if (toggle_debug) {
    toggle_debug.addEventListener("click", () => {
      console.log("toggling debug");
      body.classList.toggle("ge-debug");
    });
  }

  if (toggle_color_info) {
    toggle_color_info.addEventListener("click", () => {
      console.log("toggle ge-color-info");
      body.classList.toggle("ge-color-info");
    });
  }

  if (toggle_breakpoint_info) {
    toggle_breakpoint_info.addEventListener("click", () => {
      console.log("toggle ge-breakpoint-info");
      body.classList.toggle("ge-breakpoint-info");
    });
  }

  if (toggle_col_info) {
    toggle_col_info.addEventListener("click", () => {
      console.log("toggle ge-column-info");
      body.classList.toggle("ge-column-info");
    });
  }
});

function createGridEditModal() {
  Modal.confirm({
    title: "Create new layout",
    message: "This will make changes to your account.",
    type: "primary",
    confirmLabel: "Save",
    cancelLabel: "Close",
    size: "lg",
    onConfirm: () => {
      confirmResult.style.display = "block";
      confirmResult.textContent = "✓ Action completed";
    },
  }).show();
}
