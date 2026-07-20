// Mobile navigation toggle
document.addEventListener('click', (e) => {
    const toggle = e.target.closest('[data-nav-toggle]');
    if (toggle) {
        const menu = document.querySelector('[data-nav-menu]');
        if (menu) menu.classList.toggle('hidden');
        return;
    }
    // Close menu when a link inside it is clicked
    const link = e.target.closest('[data-nav-menu] a');
    if (link) {
        document.querySelector('[data-nav-menu]')?.classList.add('hidden');
    }
});
