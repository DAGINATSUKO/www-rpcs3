var dark_classes = [
	{"base": "body", "toggle": "dm-bg"},
	// Core website
	{"base": ".darkmode-icon", "toggle": "dm-icon"},
	{"base": ".darkmode-gradient", "toggle": "dm-gradient"},
	{"base": ".darkmode-invert", "toggle": "dm-invert"},
	{"base": ".darkmode-header", "toggle": "dm-header"},
	{"base": ".darkmode-discord", "toggle": "dm-discord"},
	{"base": ".darkmode-github", "toggle": "dm-github"},
	{"base": ".darkmode-patreon", "toggle": "dm-patreon"},
	{"base": ".darkmode-feature", "toggle": "dm-bg"},
	{"base": ".darkmode-slimbar", "toggle": "dm-bg-2"},
	{"base": ".darkmode-search-border", "toggle": "dm-search-border"},
	{"base": ".darkmode-search-bg", "toggle": "dm-search-bg"},
	{"base": ".darkmode-arrow-left", "toggle": "dm-arrow-left"},
	{"base": ".darkmode-arrow-right", "toggle": "dm-arrow-right"},
	{"base": ".darkmode-context", "toggle": "dm-default"},
	{"base": ".darkmode-contribute", "toggle": "dm-default"},
	{"base": ".darkmode-panel", "toggle": "dm-panel"},
	{"base": ".user-tx1-backdrop", "toggle": "dm-user-tx1-backdrop"},
	{"base": ".reqs-head", "toggle": "dm-reqs-head"},
	{"base": ".reqs-left", "toggle": "dm-reqs-left"},
	{"base": ".reqs-right", "toggle": "dm-reqs-right"},
	{"base": ".darkmode-txt", "toggle": "dm-txt"},
	{"base": ".darkmode-txt2", "toggle": "landing-con-container-invert"},
	{"base": ".support-con-outer", "toggle": "dm-support-outer"},
	{"base": ".support-btn-button", "toggle": "dm-support-btn"},
	{"base": ".settings-menu-con-outer", "toggle": "dm-support-outer"},
	{"base": ".settings-menu-btn-button", "toggle": "dm-support-btn"},
	{"base": ".darkmode-navsidebar-title", "toggle": "dm-navsidebar-title"},
	{"base": ".darkmode-navsidebar-anim", "toggle": "dm-default"},
	{"base": ".darkmode-navsidebar-txt", "toggle": "dm-navsidebar-txt"},
	{"base": ".site-title a", "toggle": "dm-navsidebar-txt"},
	{"base": ".markdown", "toggle": "dm-txt"},
	{"base": ".markdown h2", "toggle": "dm-txt dm-udl"},
	{"base": ".container-con-block h2", "toggle": "dm-txt"},
	{"base": ".container-con-block p", "toggle": "dm-txt"},
	{"base": ".markdown li", "toggle": "dm-txt"},
	{"base": ".user-con-specsheet", "toggle": "dm-user-con-specsheet"},
	{"base": ".darkmode-footer-logo", "toggle": "dm-footer-logo"},
	{"base": ".spec-con-divider", "toggle": "dm-divider"},
	{"base": ".darkmode-specbox", "toggle": "dm-specbox"},
	{"base": ".socialbox-con-button", "toggle": "dm-socialbox-con-button"},
	{"base": ".darkmode-menu", "toggle": "dm-menu"},
	{"base": ".menu-ico-logo", "toggle": "dm-menu-ico-logo"},
	{"base": ".downloadable-con-inner-a", "toggle": "dm-bg-2"},
	{"base": ".device-con-inner-a", "toggle": "dm-bg-2"},
	{"base": ".gamepad-con-container", "toggle": "dm-bg-2"},
	{"base": ".gamepad-con-item", "toggle": "dm-txt"},
	{"base": ".version-con-container", "toggle": "dm-bg-2"},
	{"base": ".handheld-img-overlay", "toggle": "dm-overlay"},
	{"base": ".github-img-overlay", "toggle": "dm-overlay"},
	{"base": ".patreon-img-overlay", "toggle": "dm-overlay"},
	// Compatibility
	{"base": ".compat-text", "toggle": "dm-txt"},
	{"base": ".compat-menu a", "toggle": "dm-compat-menu"},
	{"base": ".compat-tx1-criteria", "toggle": "dm-compat-criteria"},
	{"base": ".compat-hdr-left", "toggle": "dm-compat-header-left"},
	{"base": ".compat-hdr-left a", "toggle": "dm-compat-header-left"},
	{"base": ".compat-types", "toggle": "dm-compat-header-left"},
	{"base": ".compat-types a", "toggle": "dm-compat-header-left"},
	{"base": ".compat-status-text", "toggle": "dm-compat-status-text"},
	{"base": ".compat-con-searchbox", "toggle": "dm-compat-searchbox"},
	{"base": ".compat-search-character", "toggle": "dm-default-search"},
	{"base": ".txt-compat-status", "toggle": "dm-compat-status"},
	{"base": ".compat-con-pages", "toggle": "dm-compat-con-pages"},
	{"base": ".compat-con-pages a", "toggle": "dm-compat-con-pages-a"},
	{"base": ".compat-footer", "toggle": "dm-compat-footer"},
	{"base": ".compat-author", "toggle": "dm-compat-author"},
	{"base": ".compat-icon-media", "toggle": "dm-compat-media"},
	{"base": ".highlightedText", "toggle": "dm-highlightedText"},
	{"base": ".compat-table-inside", "toggle": "dm-default"},
	{"base": ".compat-table-header", "toggle": "dm-txt"},
	{"base": ".compat-table-row", "toggle": "dm-txt"},
	{"base": ".debug-main", "toggle": "dm-default"},
	{"base": ".debug-left", "toggle": "dm-default"},
	{"base": ".debug-main input", "toggle": "dm-txt"},

	{"base": ".compat-searchbox-div", "toggle": "dm-compat-searchbox-div"},
	{"base": ".compat-search-inner a", "toggle": "dm-compat-search-inner"},
	{"base": ".searchbox input", "toggle": "dm-searchbox input"},
	{"base": ".compat-search-outer", "toggle": "dm-compat-search-outer"},
	
	// RPCN
	{"base": ".rpcn-infopane-con-inner-a", "toggle": "dm-bg-2"},
	{"base": ".rpcn-playerbase-con-container", "toggle": "dm-bg-2"},
	{"base": ".rpcn-playerbase-con-banner", "toggle": "dm-rpcn-gradient"},

	// Blog
	{"base": ".nav-links", "toggle": "dm-default dm-txt"},
	{"base": ".entry-content", "toggle": "dm-txt"},
	{"base": ".entry-title a", "toggle": "dm-txt"},
	{"base": ".entry-title", "toggle": "dm-txt"},
	{"base": ".entry-footer", "toggle": "dm-blog-footer"},
	{"base": ".entry-content h2", "toggle": "dm-blog-h2"},
	{"base": ".entry-content ul li", "toggle": "dm-txt"},
	{"base": ".site-description", "toggle": "dm-blog-sidebar"},
	{"base": ".widget-title", "toggle": "dm-blog-sidebar"},
	{"base": ".page-header", "toggle": "dm-default"},
	{"base": ".page-content", "toggle": "dm-default dm-txt"}
];
// Website dark mode setting states
$(document).ready(function() {
    // Check if user already has a theme preference cookie
    var savedThemeCookie = Cookies.get("save-darkmode");
    
    // If no cookie exists, check system preference
    if (savedThemeCookie === undefined) {
        // Check if system is in dark mode
        var systemDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        // Set initial state based on system preference
        sel = systemDarkMode;
        if (systemDarkMode) {
            Cookies.set("save-darkmode", true, {
                expires: 365,
                path: '/'
            });
        }
    } else {
        // Use existing cookie value if it exists
        sel = savedThemeCookie == "true";
    }

    // Set initial UI state
    $('.toggle-darkmode').toggleClass("activate-darkmode", sel);

    // Handle click events
    $('.toggle-darkmode').on('click', function() {
        dark_classes.forEach(function(item) {
            $(item.base).toggleClass(item.toggle);
        });
        var $this = $(this);
        sel = !sel;
        $this.toggleClass("activate-darkmode", sel);
        Cookies.set("save-darkmode", sel, {
            expires: 365,
            path: '/'
        });
    });

    // Apply theme classes based on current state
    dark_classes.forEach(function(item) {
        if ($('.toggle-darkmode').hasClass('activate-darkmode')) {
            $(item.base).addClass(item.toggle);
        } else {
            $(item.base).removeClass(item.toggle);
        }
    });
});
