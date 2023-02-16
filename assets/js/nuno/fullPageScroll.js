$(document).ready(() => {
	if (window.innerWidth >= 992) {

		new fullpage('#fullpage', {
			// OPTIONS HERE
			anchors: ["page1", "page2", "page3"],
			autoScrolling:true,
			scrollHorizontally: false,
			scrollBar: true,
			setKeyboardScrolling: true
		});

		// METHODS
		fullpage_api.setAllowScrolling(true);

		// NUM ON CLICK SCROLL TO SECTION
		$('#num1').click(function() {
			fullpage_api.moveTo("page1");
		});

		$('#num2').click(function() {
			fullpage_api.moveTo("page2");
		});

		$('#num3').click(function() {
			fullpage_api.moveTo("page3");
		});

		// TEXT ON CLICK SCROLL TO SECTION
		$('#svg-text1').click(function() {
			fullpage_api.moveTo("page1");
		});

		$('#svg-text2').click(function() {
			fullpage_api.moveTo("page2");
		});

		$('#svg-text3').click(function() {
			fullpage_api.moveTo("page3");
		});

	}else{
		fullpage_api.destroy('all');
	}
});