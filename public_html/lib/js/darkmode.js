/* Handles darkmode save states (Needs refactoring)*/
$(document).ready(function() {
    var sel = $.cookie("save-darkmode"); // get the cookie
    sel = sel == "true";
    $('.toggle-darkmode').toggleClass("activate-darkmode", sel).on('click', function(e) {
        $('body').toggleClass("dm-bg");
        $('.darkmode-header').toggleClass("dm-header");
        $('.darkmode-menubar').toggleClass("dm-menubar");
        $('.darkmode-block').toggleClass("dm-block");
        $('.darkmode-panel').toggleClass("dm-panel");
        $('.darkmode-panel-2').toggleClass("dm-panel-ovr");
        $('.darkmode-txt').toggleClass("dm-txt");
        $('.darkmode-ad').toggleClass("dm-ad");
        $('.darkmode-highlight').toggleClass("dm-highlight");
        $('.darkmode-menubar-l1').toggleClass("dm-menubar-l1");
        $('.darkmode-menubar-l2').toggleClass("dm-menubar-l2");
        $('.darkmode-navsidebar-title').toggleClass("dm-navsidebar-title");
        $('.darkmode-navsidebar-anim').toggleClass("dm-navsidebar-anim");
        $('.darkmode-navsidebar-txt').toggleClass("dm-navsidebar-txt");
        $('.darkmode-buttons').toggleClass("dm-buttons");
        $(".markdown-body").toggleClass("dm-txt");
        $(".markdown-body h2").toggleClass("dm-txt");
        $("#featured-con-block h2").toggleClass("dm-txt");
        $("#featured-con-block p").toggleClass("dm-txt");
		$("#footer-con-container").toggleClass("dm-footer");

        $(".compat-con-container").toggleClass("dm-block");
        $(".compat-con-container p").toggleClass("dm-txt");
        $(".compat-con-container a").toggleClass("dm-txt");
        $(".compat-con-container i").toggleClass("dm-txt");
        $(".compat-con-container tr:nth-child(2n+1)").toggleClass("dm-block");
        $(".compat-con-container th").toggleClass("dm-block");
		$(".compat-con-container tr").toggleClass("dm-compat-highlight");
        $(".compat-hist-container").toggleClass("dm-block");
        $(".compat-hist-container p").toggleClass("dm-txt");
        $(".compat-hist-container a").toggleClass("dm-txt");
        $(".compat-hist-container i").toggleClass("dm-txt");
        $(".compat-hist-container tr:nth-child(2n+1)").toggleClass("dm-block");
        $(".compat-hist-container th").toggleClass("dm-block dm-txt");
        $(".compat-library-table").toggleClass("dm-block");
        $(".divTableHeading").toggleClass("dm-block");
        $(".divTableHeading").toggleClass("dm-txt");
        $(".compat-tx1-criteria").toggleClass("dm-block");
        $(".compat-tx1-criteria").toggleClass("dm-txt");
        $(".compat-status-text").toggleClass("dm-txt");
        $(".compat-search-character").toggleClass("dm-block-search");

        $("#compat-con-pages").toggleClass("dm-block dm-txt");
        $("#compat-author").toggleClass("dm-compat-author");
        $(".nav-links").toggleClass("dm-blog-body dm-txt");
        $(".hentry").toggleClass("dm-blog-body dm-txt");
        $(".entry-header").toggleClass("dm-blog-header");
        $(".entry-footer").toggleClass("dm-blog-footer");
        $(".entry-content h2").toggleClass("dm-blog-h2");
        $(".site-description").toggleClass("dm-blog-sidebar");
        $(".widget-title").toggleClass("dm-blog-sidebar");
        $(".page-header").toggleClass("dm-blog-body");
        $(".page-content").toggleClass("dm-blog-body dm-txt");
		
		$(".debug-main").toggleClass("dm-block");
    });
    $(".toggle-darkmode").on("click", function() {
        var $this = $(this);
        sel = !sel;
        $this.toggleClass("activate-darkmode", sel);
        $.cookie("save-darkmode", sel, {
            expires: 365,
            path: '/'
        });
    });
});
$(document).ready(function() {
    if ($('.toggle-darkmode').hasClass('activate-darkmode')) {
        $('body').addClass("dm-bg");
        $('.darkmode-header').addClass("dm-header");
        $('.darkmode-menubar').addClass("dm-menubar");
        $('.darkmode-block').addClass("dm-block");
        $('.darkmode-panel').addClass("dm-panel");
        $('.darkmode-panel-2').addClass("dm-panel-ovr");
        $('.darkmode-txt').addClass("dm-txt");
        $('.darkmode-ad').addClass("dm-ad");
        $('.darkmode-highlight').addClass("dm-highlight");
        $('.darkmode-menubar-l1').addClass("dm-menubar-l1");
        $('.darkmode-menubar-l2').addClass("dm-menubar-l2");
        $('.darkmode-navsidebar-title').addClass("dm-navsidebar-title");
        $('.darkmode-navsidebar-anim').addClass("dm-navsidebar-anim");
        $('.darkmode-navsidebar-txt').addClass("dm-navsidebar-txt");
        $('.darkmode-buttons').addClass("dm-buttons");
        $(".markdown-body").addClass("dm-txt");
        $(".markdown-body h2").addClass("dm-txt");
        $("#featured-con-block h2").addClass("dm-txt");
        $("#featured-con-block p").addClass("dm-txt");

        $(".compat-con-container").addClass("dm-block");
        $(".compat-con-container p").addClass("dm-txt");
        $(".compat-con-container a").addClass("dm-txt");
        $(".compat-con-container i").addClass("dm-txt");
        $(".compat-con-container tr:nth-child(2n+1)").addClass("dm-block");
        $(".compat-con-container th").addClass("dm-block");
		$(".compat-con-container tr").addClass("dm-compat-highlight");
        $(".compat-hist-container").addClass("dm-block");
        $(".compat-hist-container p").addClass("dm-txt");
        $(".compat-hist-container a").addClass("dm-txt");
        $(".compat-hist-container i").addClass("dm-txt");
        $(".compat-hist-container tr:nth-child(2n+1)").addClass("dm-block");
        $(".compat-hist-container th").addClass("dm-block dm-txt");
        $(".compat-library-table").addClass("dm-block");
        $(".divTableHeading").addClass("dm-block");
        $(".divTableHeading").addClass("dm-txt");
        $(".compat-tx1-criteria").addClass("dm-block");
        $(".compat-tx1-criteria").addClass("dm-txt");
        $(".compat-status-text").addClass("dm-txt");
        $(".compat-search-character").addClass("dm-block-search");
		$("#footer-con-container").addClass("dm-footer");

        $("#compat-con-pages").addClass("dm-block dm-txt");
        $("#compat-author").addClass("dm-compat-author");
        $(".nav-links").addClass("dm-blog-body dm-txt");
        $(".hentry").addClass("dm-blog-body dm-txt");
        $(".entry-header").addClass("dm-blog-header");
        $(".entry-footer").addClass("dm-blog-footer");
        $(".entry-content h2").addClass("dm-blog-h2");
        $(".site-description").addClass("dm-blog-sidebar");
        $(".widget-title").addClass("dm-blog-sidebar");
        $(".page-header").addClass("dm-blog-body");
        $(".page-content").addClass("dm-blog-body dm-txt");
		
		$(".debug-main ul").addClass("dm-block");
    } else {
        $('body').removeClass("dm-bg");
        $('.darkmode-header').removeClass("dm-header");
        $('.darkmode-menubar').removeClass("dm-menubar");
        $('.darkmode-block').removeClass("dm-block");
        $('.darkmode-panel').removeClass("dm-panel");
        $('.darkmode-panel-2').removeClass("dm-panel-ovr");
        $('.darkmode-txt').removeClass("dm-txt");
        $('.darkmode-ad').removeClass("dm-ad");
        $('.darkmode-highlight').removeClass("dm-highlight");
        $('.darkmode-menubar-l1').removeClass("dm-menubar-l1");
        $('.darkmode-menubar-l2').removeClass("dm-menubar-l2");
        $('.darkmode-navsidebar-title').removeClass("dm-navsidebar-title");
        $('.darkmode-navsidebar-anim').removeClass("dm-navsidebar-anim");
        $('.darkmode-navsidebar-txt').removeClass("dm-navsidebar-txt");
        $('.darkmode-buttons').removeClass("dm-buttons");
        $(".markdown-body").removeClass("dm-txt");
        $(".markdown-body h2").removeClass("dm-txt");
        $("#featured-con-block h2").removeClass("dm-txt");
        $("#featured-con-block p").removeClass("dm-txt");
		$("#footer-con-container").removeClass("dm-footer");

        $(".compat-con-container").removeClass("dm-block");
        $(".compat-con-container p").removeClass("dm-txt");
        $(".compat-con-container a").removeClass("dm-txt");
        $(".compat-con-container i").removeClass("dm-txt");
        $(".compat-con-container tr:nth-child(2n+1)").removeClass("dm-block");
        $(".compat-con-container th").removeClass("dm-block");
		$(".compat-con-container tr").removeClass("dm-compat-highlight");
        $(".compat-hist-container").removeClass("dm-block");
        $(".compat-hist-container p").removeClass("dm-txt");
        $(".compat-hist-container a").removeClass("dm-txt");
        $(".compat-hist-container i").removeClass("dm-txt");
        $(".compat-hist-container tr:nth-child(2n+1)").removeClass("dm-block");
        $(".compat-hist-container th").removeClass("dm-block dm-txt");
        $(".compat-library-table").removeClass("dm-block");
        $(".divTableHeading").removeClass("dm-block");
        $(".divTableHeading").removeClass("dm-txt");
        $(".compat-tx1-criteria").removeClass("dm-block");
        $(".compat-tx1-criteria").removeClass("dm-txt");
        $(".compat-status-text").removeClass("dm-txt");
        $(".compat-search-character").removeClass("dm-block-search");

        $("#compat-con-pages").removeClass("dm-block dm-txt");
        $("#compat-author").removeClass("dm-compat-author");
        $(".nav-links").removeClass("dm-blog-body dm-txt");
        $(".hentry").removeClass("dm-blog-body dm-txt");
        $(".entry-header").removeClass("dm-blog-header");
        $(".entry-footer").removeClass("dm-blog-footer");
        $(".entry-content h2").removeClass("dm-blog-h2");
        $(".site-description").removeClass("dm-blog-sidebar");
        $(".widget-title").removeClass("dm-blog-sidebar");
        $(".page-header").removeClass("dm-blog-body");
        $(".page-content").removeClass("dm-blog-body dm-txt");
		
		$(".debug-main").removeClass("dm-block");
    }
});