
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
            console.log(data);
            loadFacilities(data);
            loadContacts(data);

            loadCompetitions(data);

        }
    });
});





function loadFacilities(data) {
    var string = '<div class="scrollbar">        <div class="handle">        <div class="mousearea"></div>        </div>        </div>       <div class="frame" id="basic">        <ul class="clearfix" id="featured">';

    var facs = data['featuredFacilities'];

    var featured = document.getElementById('featured').children;
    console.log(featured);

    for(var i=0;i<8;i++){
        featured[i].innerHTML= '<h4>' +facs[i].title+ '</h4><p>' +facs[i].description+ '</p>';
    }





}


function loadContacts(data){
    var string = '';
    var facs = data['featuredFacilities'];

    var contacts = document.getElementById('contacts');

    for(var i=0;i<facs.length;i++){
        if(facs[i].reg_sub_tag == region && facs[i].contact != "") {
            string += '<div class="member" onclick="link("' + facs[i].link + '");"><h5>' + facs[i].title + '</h5><p>' + facs[i].contact + '<br></p></div>';
        }
    }

    contacts.innerHTML=string;


}


function loadCompetitions(data){

    var string = '<tbody>';

    var comps = data['competitions'];

    var table = document.getElementById('competitions');

    for(var i=0;i<comps.length;i++){
            string += '<tr >' +
                        '<td><a target="_blank" href=" '+ comps[i].Link +'">'+ comps[i].Name +'</a></td>' +
                        '<td>'+ comps[i].Location +'</td>' +
                        '<td>'+ comps[i].Date +'</td>' +
                        '</tr> ';
    }

    string += '</tbody>';

    table.innerHTML+=string;


}