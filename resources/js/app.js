import './bootstrap';

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
});