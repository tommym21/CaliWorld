var news;

$(function () {
    console.log(language);
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        url: 'Queries/newsQueries.php',                  //the script to call to get data
        type: 'POST',
        data: ({lang: language}),
        dataType: 'json',                //data format
        success: function (data)          //on recieve of reply
        {

            news = data;

        }
    });
});

