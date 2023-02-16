/* TRIGGER CLICK WITH IMAGE */
function triggerClick() {
	$("#file").click();
}

/* CHANGE IMAGE */
function dImage(e) {
	if (e.files[0]) {
		var reader = new FileReader();

		reader.onload = (e) => {
			$("#img-logo").attr("src", e.target.result);
		}

		reader.readAsDataURL(e.files[0]);
	}
}