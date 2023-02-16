<!DOCTYPE html>

<html lang="en">

<head>
	<title>Pureaura</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Pureaura Página">
	<meta name="keywords" content="Estética, Esteticismo, Beleza, Unhas, Maquilhagem, Massagens">
	<meta name="author" content="João Onofre, Nuno Frazão, Pedro Clemente, Rúben Gaspar">
	<link rel="stylesheet" href="../assets/bootstrap-4.4.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/fullPage.js-master/src/fullpage.css">
	<link rel="stylesheet" href="../assets/css/navbar.css">
	<link rel="stylesheet" href="../assets/css/sidenav.css">
</head>

<body>
	<div class="container">


		<table id="myTable" class="table">
			<thead>
				<tr><th>State</th><th>Governor</th> <th>Capital</th></tr>
			</thead>
			<tbody>
				<tr><td >California</td><td>Jerry Brown</td><td>Sacramento</td></tr>
				<tr><td >Texas</td><td>Greg Abbott</td><td>Austin</td></tr>
				<tr><td >New York</td><td>Andrew Cuomo</td><td>Albany</td></tr>
				<tr><td >Illinois</td><td>Bruce Rauner</td><td>Springfield</td></tr>
			</tbody>
		</table>

	</div>



	<!-- SCRIPTS -->
	<script src="../assets/js/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="../assets/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
	<script src="../assets/anime-master/lib/anime.min.js"></script>
	<script src="../assets/fullPage.js-master/src/fullpage.js"></script>
	<script src="../assets/js/sidenav.js"></script>

	<script>
		th = document.getElementsByTagName('th');

		for(let c=0; c < th.length; c++){

			th[c].addEventListener('click',item(c))
		}


		function item(c){

			return function(){
				console.log(c)
				sortTable(c)
			}
		}


		function sortTable(c) {
			var table, rows, switching, i, x, y, shouldSwitch;
			table = document.getElementById("myTable");
			switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[c];
      y = rows[i + 1].getElementsByTagName("TD")[c];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
    }
}
if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
  }
}
}
</script>

</body>
</html>