var news;

$(function () {
    console.log(language);
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        url: 'Queries/newsQueries.php',                  //the script to call to get data
        type: 'POST',
        data: ({lang: language, reg: region}),
        dataType: 'json',                //data format
        success: function (data)          //on recieve of reply
        {

            constructNews(data);

        }
    });
});


function constructNews(data) {
    var string ='';
    var box = document.getElementById('newsWrap');

    var news = data['news'];

    for(var i=0; i<news.length; i++){
        string +='<blockquote style="cursor:pointer;" onclick="javascript:window.open("'+news[i].link+'", "_blank");">' +
                 '<div class="newsLeft"><section id="sidebar">' +
                 '<img class="newsImg" src="Images/'+news[i].image+'" alt=""></a> </section> </div>' +
                 '<div class="newsRight">' +
                 '<h4>'+news[i].title+'</h4>'+
                 '<p>'+news[i].description+'</p></div><div style="clear:both;"></div></blockquote>';
    }

    box.innerHTML=string;

}
