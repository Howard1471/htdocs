
window.onscroll = function() {myFunction()};

var header = document.getElementById("stickyheader");
var sticky = header.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}

function screenWidth() {
    var x = "Total Width: " + screen.width + "px";
    document.getElementById("demo").innerHTML = x;
}

$(document).ready(function(){

    var screenWidth = screen.width;

    $.ajax({ url: 'screensessionsetting.php?screenW='+ screenWidth });


});