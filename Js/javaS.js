(function($){

    $(window).load(function(){

        $("section").mCustomScrollbar({

        	theme:'rounded-dots-dark',
        	scrollInertia:1000,
        	mouseWheel: {scrollAmount: 150},
        	keyboard: {scrollAmount: 15}

        });
        
    });

})(jQuery);

/*window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		
		if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {

		    document.getElementById("head").style.height = "6.75%";

		    document.getElementById("right").style.marginTop = "1.1%";
		    document.getElementById("right").style.marginRight = "-52%";

		    document.getElementById("left").style.marginTop = "1.1%";
		    document.getElementById("left").style.marginRight = "43.5%";

		    document.getElementById("logo").style.marginLeft = "49%";
		    document.getElementById("logo").style.width = "3.5%";
			document.getElementById("logo").style.height = "7%";

		    document.getElementById("gilou").style.display = "none";

		  } else {

			document.getElementById("head").style.height = "5vw";

			document.getElementById("right").style.marginTop = "2%";
			document.getElementById("right").style.marginRight = "-38%";

		    document.getElementById("left").style.marginTop = "2%";
		    document.getElementById("left").style.marginRight = "0%";

			document.getElementById("logo").style.marginLeft = "0%";
			document.getElementById("logo").style.width = "5vw";
			document.getElementById("logo").style.height = "5vw";

			document.getElementById("gilou").style.display = "block";

		}

	}

	var heightOutput = document.querySelector('#height');
	var widthOutput = document.querySelector('#width');

	function resize() { 

		heightOutput.textContent = window.innerHeight;
		widthOutput.textContent = window.innerWidth;

	}*/