// SEARCH BAR
function searchUnhas() {

	var input = document.getElementById("search-bar-unhas");
	var filter = input.value.toUpperCase();
	var divImg = document.getElementById("div-img-unhas");
	var p = divImg.getElementsByTagName("p");
	var img= divImg.getElementsByTagName("img");

	for (var i = 0; i < p.length; i++) {
		var a = p[i];
		var txtValue = a.textContent || a.innerText;

		if (txtValue.toUpperCase().indexOf(filter) > -1) {
			img[i].closest("div").style.display = "";
		} else {
			img[i].closest("div").style.display = "none";
		}
	}
}

// VOICE SEARCH
// const button = document.querySelector("#svg-voice");
var button = document.querySelector("#voice-button");
const content = document.querySelector("#search-bar-unhas");

const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
const recognition = new SpeechRecognition();

recognition.onstart = function () {
	/*console.log("Voice is activated, you can talk!");*/
};

recognition.onresult = function(event) {
	const current = event.resultIndex;

	const transcript = event.results[current][0].transcript;
	// content.textContent = transcript;

	readOutLoud(transcript);

};

// BUTTON ON CLICK
function clickSearch() {
	recognition.start();
	content.focus();
}

// SHOW INPUT MESSAGE
function readOutLoud(message) {
	const speech = new SpeechSynthesisUtterance();

	content.value = message;

	if (message.includes("apagar")) {
		content.value = "";
	}
}
