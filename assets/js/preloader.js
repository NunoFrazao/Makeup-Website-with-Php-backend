window.onload = function() {
    var loader = document.getElementsByClassName("loader-overlay")[0];

    loader.classList.add("hidden");
    setTimeout(function() {
        loader.style.display = "none";
    }, 300);
}
