/*
Divi Icon Expansion Pack by Divi Space, an Aspen Grove Studios company
Licensed under the GNU General Public License v2 (see ../license.txt)

This plugin includes code based on parts of the Divi theme and/or the
Divi Builder by Elegant Themes, licensed GPLv2 (see ../license.txt).
*/

(function() {
	function getPromo() {
		return ags_divi_icons_credit_promos[Math.floor(Math.random() * ags_divi_icons_credit_promos.length)];
	}
	setInterval(function() {
		 jQuery('.agsdi-picker-credit-promo:empty:visible').fadeOut(300, function() {
			var $promo = jQuery(this).html(getPromo());
			jQuery('<span>')
				.addClass('agsdi-picker-credit-separator')
				.hide()
				.html(' &bull; ')
				.insertBefore($promo)
				.add($promo)
				.fadeIn(300);
		});
	}, 1000);
	setInterval(function() {
		 jQuery('.agsdi-picker-credit-promo:parent:visible').fadeOut(300, function() {
			var $promo = jQuery(this);
			var oldPromoContentText = $promo.text();
			do {
				var newPromoContent = getPromo();
				var newPromoContentText = jQuery('<div>').html(newPromoContent).text();
			} while (newPromoContentText == oldPromoContentText);
			$promo.html(newPromoContent).fadeIn(300);
		});
	}, 6600);
})();