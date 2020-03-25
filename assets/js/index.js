jQuery(document).ready(function($) {
	if($( "#fitts-header #fitts-header-bg" ).offset().top > 15){
		$( "#fitts-header #fitts-header-bg" ).fadeIn(200);
	};
	$('h2').widowFix();
	$('.fitts-first-cap').each(function(){
		var str = $(this).text();
		var wrds = str.split(" ");
		var inner = [];
		for(var i=0; i<wrds.length; i++){
			if(wrds[i].indexOf('\xa0')>0){
				var nwrd = wrds[i].split('\xa0');
				var flnwrd = nwrd[1].charAt(0);
				var spa = document.createElement("span");
				spa.classList.add("fitts-first-cap-l");
				spa.innerHTML = flnwrd;
				nwrd[1] = spa.outerHTML + nwrd[1].slice(1);
				inner.push(nwrd[1]);
			} else {
				var fl = wrds[i].charAt(0);
				var sp = document.createElement("span");
				sp.classList.add("fitts-first-cap-l");
				sp.innerHTML = fl;
				wrds[i] = sp.outerHTML + wrds[i].slice(1);
				inner.push(wrds[i]);
			}
		}
		$(this).html(inner.join(" "));
	});
	$(window).scroll(function() {
		if ($(this).scrollTop() > 15) {
		    $( "#fitts-header #fitts-header-bg" ).fadeIn(200);
		} else {
		    $( "#fitts-header #fitts-header-bg" ).fadeOut(200);
		}
	});

});
