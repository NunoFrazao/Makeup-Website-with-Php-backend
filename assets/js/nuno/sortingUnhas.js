// GLOBAL VARIABLES
var table = document.getElementById("table-unhas");
var th = document.getElementsByClassName("theaders");

// LOOP THROUGH ALL THEAD TH
for(let c=0; c < th.length; c++){
    th[c].addEventListener('click',item(c))
}


function item(c){
    return function(){
        sortTable(c);
    }
}

// FUNCTION SORTING TABLE
function sortTable(c) {
    var table, rows, switching, shouldSwitch;
    table = document.getElementById("table-unhas");
    switching = true;

    while (switching) {
        // START BY SAYING ITS FALSE
        switching = false;
        rows = table.rows;

        // LOOP TROUGH ALL ROWS OF TABLE
        for (var i = 1; i < (rows.length - 1); i++) {
            // START BY SAYING THERE SHOULD BE NO SWITCH
            shouldSwitch = false;

            // COMPARE THE VALUES FROM DIFFERENT ROWS
            var x = rows[i].getElementsByTagName("TD")[c];
            var y = rows[i + 1].getElementsByTagName("TD")[c];

            // CHECK IF THOSE ROWS SHOULD BE SWITCHED
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                // IF IT NEEDS -> BREAKS THE LOOP
                shouldSwitch = true;
                break;
            }
        }

        // MARK A SWITCH WAS DONE
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}