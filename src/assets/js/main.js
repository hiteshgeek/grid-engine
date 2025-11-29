if (typeof window !== "undefined") {
  const grid_engine = new GridEngine();
  window.grid_engine = grid_engine;

  Modal.initializeDataAPI();

  const toggle_grid_edit = document.querySelector("#toggle_grid_edit");
  const body = document.querySelector("body");

  if (toggle_grid_edit) {
    toggle_grid_edit.addEventListener("click", () => {
      createGridEditModal();
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
    onConfirm: () => {
      confirmResult.style.display = "block";
      confirmResult.textContent = "✓ Action completed";
    },
  }).show();
}
