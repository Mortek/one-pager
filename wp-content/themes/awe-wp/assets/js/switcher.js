/*-----------------------------------------------------------------------------------
/* Styles Switcher
-----------------------------------------------------------------------------------*/

window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();


jQuery(document).ready(function($) {
	

		$("ul.colors .color1" ).click(function(){
			$("#colors" ).attr("href", "assets/css/colors/default.css" );
			return false;
		});
		
		$("ul.colors .color2" ).click(function(){
			$("#colors" ).attr("href", "assets/css/colors/color-1.css" );
			return false;
		});
		
		$("ul.colors .color3" ).click(function(){
			$("#colors" ).attr("href", "assets/css/colors/color-2.css" );
			return false;
		});

		$("ul.colors .color4" ).click(function(){
			$("#colors" ).attr("href", "assets/css/colors/color-3.css" );
			return false;
		});

		$("ul.colors .color5" ).click(function(){
			$("#colors" ).attr("href", "assets/css/colors/color-4.css" );
			return false;
		});
		
		$("ul.colors .color6" ).click(function(){
			$("#colors" ).attr("href", "assets/css/colors/color-5.css" );
			return false;
		});

		$("ul.colors .color7" ).click(function(){
			$("#colors" ).attr("href", "assets/css/colors/color-6.css" );
			return false;
		});
		$("ul.colors .color8" ).click(function(){
			$("#colors" ).attr("href", "assets/css/colors/color-7.css" );
			return false;
		});

		
		$("#color-style-switcher .bottom a.settings").click(function(e){
			e.preventDefault();
			var div = $("#color-style-switcher");
			if (div.css("left") === "-189px") {
				$("#color-style-switcher").animate({
					left: "0px"
				}); 
			} else {
				$("#color-style-switcher").animate({
					left: "-189px"
				});
			}
		})
		
		$("ul.colors li a").click(function(e){
			e.preventDefault();
			$(this).parent().parent().find("a").removeClass("active");
			$(this).addClass("active");
		})
				
	});