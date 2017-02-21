function mapSearch() {

    //Generate the name of the location object required
    var locationString = '';
    var park = document.getElementById('park').checked;
    var training = document.getElementById('trainingequiptment').checked;
    var affiliate = document.getElementById('affiliate').checked;

    if(park) locationString += '_parks';
    if(training) locationString += '_training';
    if(affiliate) locationString += '_affiliate';

    locationString += '_' + language;

    //clear the map
    document.getElementById('gmap').innerHTML ='';

    console.log(locationString);

    //load the new locations
    new Maplace({
        show_markers: true,
        locations: locations[locationString],
        controls_on_map: false,zoom: 1
    }).Load();

}