//# sourceURL=custom.js
(function($) {

	// prettyPhoto
	jQuery(document).ready(function(){
		jQuery('a[data-gal]').each(function() {
			jQuery(this).attr('rel', jQuery(this).data('gal'));
		});  	
		jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'light_square',slideshow:false,overlay_gallery: false,social_tools:false,deeplinking:false});
	});

	function Sommaire(container){
		this.container = container; // Container dans lequel se trouve notre texte
		this.uls = [document.createElement('ul')]; // On stock les <ul> dans lequel on va placer nos <li>
		this.buildStructure();
	};

	// Permet de construire la structure de notre sommaire
	Sommaire.prototype.buildStructure = function(){
		// On récupère tous les titres du contenu
		var titles = this.container.querySelectorAll('h1, h2, h3, h4, h5');
		var lastLvl = 0
		for(var i = 0; i < titles.length; i++){
			var title = titles[i];
			var lvl = parseInt(title.tagName.replace('H', '')); // Niveau du titre, 1:h1 2:h2....
			// Ooops on a sauté plus d'un niveau
			if(lvl - lastLvl > 1){
				throw "Erreur dans la structure des titres, Saut d'un h" + lastLvl + " vers h" + lvl;
			}
			var lastLvl = lvl;
			// On crée le <li> qui va contenir notre titre
			var li = document.createElement('li');
			var a = document.createElement('a');
			a.setAttribute('href', '#');
			a.textContent = title.textContent;
			li.appendChild(a);
			// On a un <ul> parent ?
			if(!this.uls[lvl - 1]){
				var ul = document.createElement('ul');
				this.uls[lvl - 1] = ul;
				this.uls[lvl - 2].lastChild.appendChild(ul);
			}
			this.uls[lvl] = null; // Ce niveau n'a pas de <ul> enfant
			this.uls[lvl - 1].appendChild(li); // On place notre <li> dans le <ul> parent
			this.bindScroll(a, title); // On ajoute l'event sur le lien
		}
	};

	// Au clic sur le a on scroll vers le titre
	Sommaire.prototype.bindScroll = function(a, title) {
		a.addEventListener('click', function(e){
			e.preventDefault();
			document.body.scrollTop = title.offsetTop;
		});
	}

	// Ajoute le sommaire à l'élément passé en paramètre
	Sommaire.prototype.appendTo = function(element){
		element.appendChild(this.uls[0]);
	};

	// From http://www.grafikart.fr/
	var s = new Sommaire(document.querySelector('#div_content'));
	s.appendTo(document.querySelector('#div_summary'));

	$(document).ready(function () {

		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('.scrollup').fadeIn();
			} else {
				$('.scrollup').fadeOut();
			}
		});

		$('.scrollup').click(function () {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});

	});
		
})(jQuery);