/*
Divi Icon Expansion Pack by Divi Space, an Aspen Grove Studios company
Licensed under the GNU General Public License v2 (see ../license.txt)

This plugin includes code based on parts of the Divi theme and/or the
Divi Builder by Elegant Themes, licensed GPLv2 (see ../license.txt).
*/

jQuery(document).ready(function($) {
	var fbBody = $('body.et-fb');
	if (fbBody.length) {
		var MO = window.MutationObserver ? window.MutationObserver : window.WebkitMutationObserver;
		if (MO) {
			(new MO(function(events) {
				$.each(events, function(i, event) {
					if (event.target && (event.type != 'characterData' || event.target.parentElement)) {
						var $element = $(event.type == 'characterData' ? event.target.parentElement : event.target);
						if ($element.hasClass('et-pb-icon') && $element.closest('.et_pb_main_blurb_image').length
							&& $element.closest('.et_pb_module.et_pb_blurb')) {
								if ($element.hasClass('agsdi-updating')) {
									$element.removeClass('agsdi-updating');
								} else {
									var iconContent = $element.html();
									if (iconContent.substr(0, 6) == 'agsdi-') {
										$element.attr('data-icon', iconContent)
											.addClass('agsdi-updating')
											.html('');
									} else if ($element.attr('data-icon').substr(0, 6) == 'agsdi-') {
										$element.attr('data-icon', null);
									}
								}
						} else if (event.addedNodes && event.addedNodes.length) {
							$.each(event.addedNodes, function(i, node) {
								$(node).find('.et-pb-icon').each(function() {
									var $iconChild = $(this);
									if ($iconChild.closest('.et_pb_module.et_pb_blurb .et_pb_main_blurb_image').length) {
										var iconContent = $iconChild.html();
										if (iconContent.substr(0, 6) == 'agsdi-') {
											$iconChild.attr('data-icon', iconContent)
												.addClass('agsdi-updating')
												.html('');
										}
									}
								});
								$(node).find('.et-fb-font-icon-list').after(
									// Credit HTML copied from ds-icon-expansion-pack.php
									'<span class="agsdi-picker-credit">With free icons by <a href="https://divi.space/?utm_source=ds-icon-expansion&amp;utm_medium=plugin-credit-link&amp;utm_content=divi-visual-builder" target="_blank">Divi Space</a><span class="agsdi-picker-credit-promo"></span></span>'
								);
							});
						}
					}
				});
			})).observe(fbBody[0], {characterData: true, childList: true, subtree: true});
		}
	}
});