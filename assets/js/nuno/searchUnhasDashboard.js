/* SEARCH BAR */
function searchUnhas() {

	/* VARIABLES */
	var input = document.getElementById("search-unhas");
	var filter = input.value.toUpperCase();
	var tbody = document.getElementById("tbody-unhas");
	var tr = tbody.getElementsByTagName("tr");
	var hidden = 0;

	/* LOOP THROUGH ALL TR */
	for (var i = 0; i < tr.length; i++) {
		var a = tr[i];
		var txtValue = a.textContent || a.innerText;

		if (txtValue.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
			hidden++;
		} else {
			tr[i].style.display = "none";
		}
	}

	/* IF THERE IS NO RESULTS */
	if ($("tr:hidden").length = hidden) {
		$(".no-results").hide();
	}else{
		$(".no-results").show();
	}
}