import './bootstrap';

function revealOnScroll() {
    const sections = document.querySelectorAll('section');
    const triggerBottom = window.innerHeight * 0.40;

    sections.forEach(section => {
        const sectionTop = section.getBoundingClientRect().top;

        if (sectionTop < triggerBottom) {
            section.classList.add('visible');
        } else {
            section.classList.remove('visible');
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
    const Default = {
        scrollbarTheme: "os-theme-light",
        scrollbarAutoHide: "leave",
        scrollbarClickScroll: true,
    };

    if (sidebarWrapper) {
        OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
                theme: Default.scrollbarTheme,
                autoHide: Default.scrollbarAutoHide,
                clickScroll: Default.scrollbarClickScroll,
            },
        });
    }

    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll();
});