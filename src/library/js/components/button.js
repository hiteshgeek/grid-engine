export default function enableButtonRipple(selector = ".ge-btn") {
  document.addEventListener("click", (e) => {
    const button = e.target.closest(selector);
    if (!button) return;

    // Create span for ripple
    const ripple = document.createElement("span");
    ripple.classList.add("ripple-span");

    // Get click position
    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;

    // Apply dynamic style
    ripple.style.width = ripple.style.height = `${size}px`;
    ripple.style.left = `${x}px`;
    ripple.style.top = `${y}px`;

    // Append ripple and remove after animation
    button.appendChild(ripple);
    setTimeout(() => ripple.remove(), 600);
  });
}

export { enableButtonRipple };
