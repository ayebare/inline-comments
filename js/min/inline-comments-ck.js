!function(t,n,o){var i,e="incom-active";t.init=function(t){a(t),r(),c()};var a=function(t){i=n.extend({selectors:"p",position:"left"},t)},r=function(){0===n("#incom_wrapper").length&&n('<div id="incom_wrapper"></div>').appendTo(n("body"))},c=function(){var t=v(i.selectors);n(t).each(function(o){n(t[o]).each(function(t){var o=n(this);p(t,o),s(o)})})},p=function(t,n){var o=n.prop("tagName").substr(0,1);if(!n.attr("data-incom")){var i=o+t;n.attr("data-incom",i)}},s=function(t){var o=t.offset(),e=n("<a/>",{href:"","class":"incom-bubble-link"}).text("+").wrap('<div class="incom-bubble" />').parent().appendTo("#incom_wrapper");e.css({top:o.top,left:"right"===i.position?o.left+t.outerWidth():o.left-e.outerWidth()}),f(t,e),u(e)},f=function(t,n){t.add(n).hover(function(){n.stop(!0,!0).fadeIn()},function(){n.stop(!0,!0).fadeOut(2e3)})},u=function(t){t.on("click",function(n){n.preventDefault(),d(),t.addClass(e),l(t)})},l=function(t){var o=m(),e=t.offset(),a=n("<div/>",{"class":"incom-comments-wrapper"}).html(JSON.stringify(o)).appendTo("#incom_wrapper");a.css({top:e.top,left:"right"===i.position?e.left+t.outerWidth():e.left-a.outerWidth()}),n("html").click(function(t){0===n(t.target).parents("#incom_wrapper").length&&d(!0)})},m=function(){return n.ajax({}),ajax_script_vars.comments_php},d=function(t){var o=n(".incom-bubble"),i=n(".incom-comments-wrapper");o.hasClass(e)&&(o.removeClass(e),t===!0?i.fadeOut("fast"):i.remove())},v=function(t){var n=t.split(",");return n}}(window.incom=window.incom||{},jQuery);