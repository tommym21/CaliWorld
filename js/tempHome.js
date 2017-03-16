//each page should have own file loaded dynamically in to handle AJAX
var pageData;

$(function ()
{
    console.log('lang: ' + language);
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        url: 'Queries/homeQueries.php',                  //the script to call to get data
        type: 'POST',
        data: ({lang: language}),
        dataType: 'json',                //data format
        success: function(data)          //on recieve of reply
        {
            pageData = data;          //pass AJAX data to the page
            getMedia();
            getCalendar();             //tell page to populate with data
            mediaConstruct();

            getStrings();
            calendarConstruct();
            console.log(pageData);

        }
    });
});

var media = [];
var calendar = [];
var strings = [];

function getMedia(){

    for(var i=0;i<pageData['media'].length;i++){
            media.push(pageData['media'][i]);

    }
}

function getCalendar(){

    for(var i=0;i<pageData['calendar'].length;i++){
            calendar.push(pageData['calendar'][i]);
        }
}

function getStrings(){

    for(var i=0;i<pageData['strings'].length;i++){
        strings.push(pageData['strings'][i]);
    }
}

function mediaSort() {

}

function mediaConstruct () {
    var string='';

    for (var i=0;i<media.length;i++){
        string += '<div class="box">' +
                    '<div class="mediaImage "><img src="Images/' + media[i].image + '" ></div>' +
                    '<div class="mediaTitle"><h4>' + media[i].title + '</h4></div>' +
                    '<div class="mediaContent" >' + media[i].description + '</div>' +
                    '<div style="clear:both;"></div>' +
                '</div>';
    }

    $('#mediaWrap').html(string);
}



function calendarSort() {

}

function calendarConstruct () {
    var string='';

    for (var i=0;i<calendar.length;i++){
        string += '<li><div class="box"><div class="mediaImage floatLeft"><div class="box"></div></div><div class="mediaTitle floatLeft"><ul class="alt"><li><h4>'
        + calendar[i].Name + '</h4></li><li>' + strings[0]['content'] +
            ': ' + calendar[i].Location + '<br />' + strings[1]['content'] +
            ': ' + calendar[i].Date + '</li></ul></div><div style="clear: both;"></div></div></li>';
    }

    $('#calendarList').html(string);
}