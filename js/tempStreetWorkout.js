
$(function ()
{
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        url: 'Queries/streetWorkoutQueries.php',                  //the script to call to get data
        type: 'POST',
        data: ({lang: language}),
        dataType: 'json',                //data format
        success: function(data)          //on recieve of reply
        {
            loadFacilities(data);

        }
    });
});





function loadFacilities(data) {
    var string = '<div class="scrollbar">        <div class="handle">        <div class="mousearea"></div>        </div>        </div>       <div class="frame" id="basic">        <ul class="clearfix" id="featured">';

    var facs = data['featuredFacilities'];

    var featured = document.getElementById('featured').children;
    console.log(featured);

    for(var i=0;i<facs.length;i++){
        featured[i].innerHTML= '<p>' +facs[i].description+ '</p><h4>' +facs[i].title+ '</h4><h5>loacation</h5>';
    }






}