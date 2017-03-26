

var parks = [];
var training = [];
var affiliates = [];
var parks_training;
var parks_affiliates;
var training_affiliates;
var parks_training_affiliates;

var locations;


$(function ()
{
    console.log(language);
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        url: 'Queries/locationQueries.php',                  //the script to call to get data
        type: 'POST',
        data: ({lang: language}),
        dataType: 'json',                //data format
        success: function(data)          //on recieve of reply
        {

            locationConstruct(data);
        }
    });
});

function locationConstruct(data){
    var locs = data['locations'];
    var content = data['locationContent'];

    for(var i =0;i<locs.length;i++){

        var id = locs[i].ID;
        var contentIndex;

        for(var x=0;x<content.length;x++){
            if(content[x].ID == id){
                contentIndex = x;
            }
        }


        if(locs[i].type == 'park'){
            parks.push({
                lat: locs[i].lat,
                lon: locs[i].lon,
                title: content[contentIndex].title,
                html: '<h4>' + content[contentIndex].title + '</h4><br /><p>' +content[contentIndex].description+ '</p>',
                zoom: 8,
                icon: 'http://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_green.png'
            });
        }

        if(locs[i].type == 'training'){
            training.push({
                lat: locs[i].lat,
                lon: locs[i].lon,
                title: content[contentIndex].title,
                html: '<h4>' + content[contentIndex].title + '</h4><br /><p>' +content[contentIndex].description+ '</p>',
                zoom: 8,
                icon: 'http://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_purple.png'
            });

        }

        if(locs[i].type == 'affiliate'){
            affiliates.push({
                lat: locs[i].lat,
                lon: locs[i].lon,
                title: content[contentIndex].title,
                html: '<h4>' + content[contentIndex].title + '</h4><br /><p>' +content[contentIndex].description+ '</p>',
                zoom: 8,
                icon: 'http://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_black.png'
            });
        }
    }

    parks_training = parks.concat(training);
    parks_affiliates = parks.concat(affiliates);
    training_affiliates = training.concat(affiliates);
    parks_training_affiliates = parks.concat(training).concat(affiliates);

    locations = {"_parks" : parks,
        "_training" : training,
        "_affiliate": affiliates,
        "_parks_training": parks_training,
        "_parks_affiliate": parks_affiliates,
        "_training_affiliate": training_affiliates,
        "_parks_training_affiliate": parks_training_affiliates
    };


        new Maplace({
            show_markers: true,
            locations: parks,
            controls_on_map: false,zoom: 1
        }).Load();


}



