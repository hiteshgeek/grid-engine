if (typeof window !== "undefined") {
  const gri_engine = new GridEngine();

  window.gri_engine = gri_engine;
}

document.addEventListener("DOMContentLoaded", function () {
  const toggle_debug = document.querySelector("#toggle_debug");
  const toggle_extra_info = document.querySelector("#toggle_extra_info");
  const toggle_col_info = document.querySelector("#toggle_col_info");
  const body = document.querySelector("body");

  if (toggle_debug) {
    toggle_debug.addEventListener("click", () => {
      console.log("toggling debug");
      body.classList.toggle("ge-debug");
    });
  }

  if (toggle_extra_info) {
    toggle_extra_info.addEventListener("click", () => {
      console.log("toggle ge-extra-info");
      body.classList.toggle("ge-extra-info");
    });
  }

  if (toggle_col_info) {
    toggle_col_info.addEventListener("click", () => {
      document.querySelectorAll(".col-info").forEach((el) => {
        el.classList.toggle("hidden");
      });
    });
  }
});
