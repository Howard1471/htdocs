//admin-footer javascript

$(document).ready(function(){
    //Document ready for the whole dashboard


    //control handles for all the dash panels
    var newsItemBtn = document.getElementById('newsItemInsertButton');


    //Insert news Item
    $(newsItemBtn).click(function(){
        //get all the items from the form
        var newsTitle = document.getElementById('newsTitle').value;
        var newsAuthor = document.getElementById('newsAuthor').value;
        var newsDate = document.getElementById('newsDate').value;
        var newsText = document.getElementById('newsText').value;
        var emailCheckbox = "false";
        if(document.getElementById('emailCheckbox').checked){
            emailCheckbox = "true";
        }

        var postString = "newsTitle=" + newsTitle
            + "&newsAuthor=" + newsAuthor + "&newsDate=" +
            newsDate + "&newsText=" + newsText + "&emailNote=" + emailCheckbox;
        //alert("outgoing URL:\r\n" + "vm/insertNewsItem.php" + postString);

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "vm/insertNewsItem.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(postString);

        // clear the form input data
        document.getElementById('newsTitle').value = "";
        document.getElementById('newsAuthor').value = "";
        document.getElementById('newsDate').value = "";
        document.getElementById('newsText').value = "";
        document.getElementById('emailCheckbox').checked = false;

    });

});

