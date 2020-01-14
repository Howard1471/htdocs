//admin-footer javascript

$(document).ready(function(){
    //Document ready for the whole dashboard


    //control handles for all the dash panels
    var newsItemBtn = document.getElementById('newsItemInsertButton');
    var emailNewsCheckbox = false;
    var memberNewsCheckbox = false;
    var emailArticleCheckbox = false;
    var memberArticleCheckbox = false;

    //Insert news Item
    $(newsItemBtn).click(function(){
        var today = new Date()
        var timeStr = " "+ today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds() + " ";
        //get all the items from the form
        var newsTitle = document.getElementById('newsTitle').value;
        var newsAuthor = document.getElementById('newsAuthor').value;
        var newsDate = document.getElementById('newsDate').value;
        var newsText = document.getElementById('newsText').value;
        if(document.getElementById('emailNewsCheckbox').checked){
            emailNewsCheckbox = "true";
        }
        if(document.getElementById('memberNewsCheckbox').checked){
            memberNewsCheckbox = "true";
        }

        newsDate = reverseDate(newsDate);
        newsDate = newsDate + timeStr;

        var postString = "newsTitle=" + newsTitle
            + "&newsAuthor=" + newsAuthor + "&newsDate=" +
            newsDate + "&newsText=" + newsText + "&emailNote=" + emailNewsCheckbox
        +"&MemberNote" + memberNewsCheckbox;
       //console.log("outgoing URL:" + "vm/insertNewsItem.php ?" + postString);

        var xhttp = new XMLHttpRequest();
        //xhttp.open("POST", "http://snarc.org.uk/admin/vm/insertNewsItem.php", true);
        xhttp.open("POST", "vm/insertNewsItem.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(postString);

        // clear the form input data
        document.getElementById('newsTitle').value = "";
        document.getElementById('newsAuthor').value = "";
        document.getElementById('newsDate').value = "";
        document.getElementById('newsText').value = "";
        document.getElementById('emailNewsCheckbox').checked = false;
        document.getElementById('memberNewsCheckbox').checked = false;

    });

    //Upload a document file
    $(articleInsertButton).click(function(){
        var today = new Date();
        var timeStr = " "+ today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds() + " ";

        //get all the items from the form
        var articleTitle = document.getElementById('articleTitle').value;
        var articleAuthor = document.getElementById('articleAuthor').value;
        var articleDate = document.getElementById('articleDate').value;
        var articleFile = document.getElementById('articleFile').value;

        if(document.getElementById('emailArticleCheckbox').checked){
            emailArticleCheckbox = "true";
        }
        if(document.getElementById('memberArticleCheckbox').checked){
            memberArticleCheckbox = "true";
        }

        articleDate = reverseDate(articleDate);
        articleDate = articleDate + timeStr;

        var postString = "articleTitle=" + articleTitle
            + "&articleAuthor=" + articleAuthor + "&articleDate=" +
            articleDate + "&articleFile=" + articleFile + "&emailNote=" + emailArticleCheckbox
            + "&memberArticleCheckbox=" + memberArticleCheckbox;

        var xhttp = new XMLHttpRequest();
        //xhttp.open("POST", "http://snarc.org.uk/admin/vm/insertArticleItem.php", true);
        xhttp.open("POST", "vm/insertArticleItem.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(postString);


    });

    $( function() {
        $("#articleDate").datepicker({ dateFormat: 'dd/mm/yy' });
    } );
    $( function() {
        $("#newsDate").datepicker({ dateFormat: 'dd/mm/yy' });
    } );
    function reverseDate( oldDate ){
        return oldDate.substring(6,10) + "-" + oldDate.substring(3,5) + "-" + oldDate.substring(0,2);
    }
});

