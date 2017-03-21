var pageData;

var sets = '';


function contentToggle(id) {
    var string = 'output' + id;
    if(string == 'outputExersizes'){
        $('#outputExersizes').addClass('show');
        $('#outputExersizes').removeClass('hide');

        $('#outputRoutine').addClass('hide');
        $('#outputRoutine').removeClass('show');

        localStorage.setItem("trainingTab", id);
    }
    else {
        $('#outputExersizes').addClass('hide');
        $('#outputExersizes').removeClass('show');

        $('#outputRoutine').addClass('show');
        $('#outputRoutine').removeClass('hide');

        localStorage.setItem("trainingTab", id);

        var routineState = localStorage.getItem('routineState');

        if(routineState != null && routineState != ''){
            popRoutine(routineState);
        }

    }

}



$(function ()
{
    console.log(language);
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        url: 'Queries/trainingQueries.php',                  //the script to call to get data
        type: 'POST',
        data: ({lang: language, user:login_user}),
        dataType: 'json',                //data format
        success: function(data)          //on recieve of reply
        {

            pageData = data;

            getExercises();               //tell page to populate with data
            exerciseConstruct();
            routineConstruct();
            popLoadModal();
            console.log(pageData);
            sets = pageData['sets'][0].content;

            var routineState = localStorage.getItem('routineState');

            if(routineState != null && routineState != ''){
                popRoutine(routineState);
            }
        }
    });



    //Load the correct tab based on locally stored variable
    var tab = localStorage.getItem('trainingTab');

    if(tab != null){
        tabSwitch(tab);
        contentToggle(tab);
    }


});

//Array to store exersize JSON
var exercises = [];

function getExercises(){

    for(var i=0;i<pageData.exercises.length;i++){
        exercises.push(pageData.exercises[i]);
    }
}

function exerciseSort(attr, lang, support) {

    var newList = exercises;
    var newOrder = [];

    if(support){
        newList.sort(function (a, b) {
            return a[attr].localeCompare(b[attr]);
        });
    }
    else {

    }

    exercises = newList;
    exerciseConstruct();
}

function exerciseConstruct () {
    var string='';
    var rest;

    for (var i=0;i<exercises.length;i++){
        rest = (5 - parseInt(exercises[i].difficulty));
        string += '<div class="pod newsPod"><div id="exBox" class="box post scroll" >' +
            '<div class="mediaImage float"><img src="Images/' + exercises[i].image + '" ></div>' +
            '<div class="mediaTitle float"><h4>' + exercises[i].title + '</h4></div>' +
            '<div class="mediaContent" >' + exercises[i].body_part + '<br />' + exercises[i].summary + '</div>' +
            '<br /><div class="rating"><h5>' + difficulty + ':</h5>';

                for(var x = 0;x < exercises[i].difficulty;x++){
                    string += '<span style="color:red">☆</span>';
                }

                for(var y =0;y<rest;y++){
                    string += '<span>☆</span>';
                }

             string += '</div><div style="clear:both;"></div></div></div>';
    }

    $('#exercises').html(string);
}

function routineConstruct () {
    var string = '<ul>';
    var rest;

    for (var i=0;i<exercises.length;i++){
        rest = (5 - parseInt(exercises[i].difficulty));
        string += '<li style="cursor:pointer;" class="exItem" onclick="exBuffer(this)" data-exId="' +exercises[i].id+ '">' + exercises[i].title + '<br />';

        for(var x = 0;x < exercises[i].difficulty;x++){
            string += '<span style="color:red">☆</span>';
        }

        for(var y =0;y<rest;y++){
            string += '<span>☆</span>';
        }

        string += '</li>'

    }

    string += '</ul>';

    $('#pickRegion').html(string);
}



//Style the currently active tab
function tabSwitch(id){
    var exercises = $('#Exersizes');
    var routine = $('#Routine');

    if(id == 'Exersizes') {
        exercises.addClass('active');
        routine.removeClass('active');
    }
    else {
        exercises.removeClass('active');
        routine.addClass('active');

        routineConstruct();
    }
}

//function to pupolate the cycle number input with the current number of cycles.
function cycleModal(){
    var n = parseInt($('#cycles').html());

    if(n == 1) {
        $('#decrease').addClass('disabled');
    }

    $('#cycleInput').val(n);
    console.log('why')
}

function addCycle() {
    var n = parseInt($('#cycleInput').val());

    if(n == 1) {
        $('#cycleInput').val(n+1);
        popCycle(n+1)
        $('#decrease').removeClass('disabled');
        return;
    }

    $('#cycleInput').val(n+1);
    popCycle(n+1);
}

function decreaseCycle() {
    var n = parseInt($('#cycleInput').val());

    if(n == 1) {
        return;
    }

    if(n == 2) {
        $('#cycleInput').val(n-1);
        popCycle(n-1);
        $('#decrease').addClass('disabled');
        return;
    }

    $('#cycleInput').val(n-1);
    popCycle(n-1);
}

function popCycle(n){
    $('#cycles').html(n);

    localStorage.setItem('routineState', jsonRoutine(document.getElementById('routineName').value, document.getElementById('cycles').innerHTML, language ));
}


function addRep(button, exercise) {
    exercise = '#'+exercise;
    button = '#'+button;
    var n = parseInt($(exercise).val());

    if(n == 1) {
        $(exercise).val(n+1);
        $(button).removeClass('disabled');
        return;
    }

    $(exercise).val(n+1);

    localStorage.setItem('routineState', jsonRoutine(document.getElementById('routineName').value, document.getElementById('cycles').innerHTML, language ));
}

function decreaseRep(button, exercise) {
    exercise = '#'+exercise;
    button = '#'+button;
    var n = parseInt($(exercise).val());

    if(n == 1) {
        return;
    }

    if(n == 2) {
        $(exercise).val(n-1);
        $(button).addClass('disabled');
        return;
    }

    $(exercise).val(n-1);

    localStorage.setItem('routineState', jsonRoutine(document.getElementById('routineName').value, document.getElementById('cycles').innerHTML, language ));
}


function removeExItem(ele) {
    var item = ele.parentElement.parentElement;

    item.parentNode.removeChild(item);

    localStorage.setItem('routineState', jsonRoutine(document.getElementById('routineName').value, document.getElementById('cycles').innerHTML, language ));
}

function addExItem(id) {
    var exCount = document.getElementById('routineWrap').children.length + 1;
    var item;
    var string = '';
    var rest;


    for(var x = 0;x < exercises.length;x++){
        if(exercises[x].id == id){
            item = exercises[x];
        }
    }


    string += '<div class="exItem" ><div class="floatLeft" style="display: inline-block;"><h4 id="title' +exCount+ '">' +item.title+ '</h4><h5 >'+sets+': </h5><div style="margin: 0 auto;"><button id="decrease' +exCount+ '" class="button special disabled" style="display: inline-block;" onclick="decreaseRep(this.id, \'exercise' +exCount+ '\' );" >-</button><input id="exercise' +exCount+ '" type="text" style="width: 73px;text-align: center;display: inline-block;" value="1" disabled/><button id="increase' +exCount+ '" class="button special" style="display: inline-block;" onclick="addRep(\'decrease' +exCount+ '\', \'exercise' +exCount+ '\');">+</button> </div></div><div class="floatRight" style="font-size:44px;"  ><i onclick="moveExItem(this.parentNode.parentNode, 1);" style="cursor: pointer;" class="icon fa-arrow-up" aria-hidden="true"></i><br/><i onclick="removeExItem(this);" style="color: red;cursor: pointer;" class="icon fa-minus-circle" aria-hidden="true"></i><br /><i onclick="moveExItem(this.parentNode.parentNode, 0);" style="cursor: pointer;" class="icon fa-arrow-down" aria-hidden="true"></i></div> <div style="clear: both;" > </div>  </div>';


    // $('#routineWrap').append(string);
    document.getElementById('routineWrap').innerHTML += string;
    localStorage.setItem('routineState', jsonRoutine(document.getElementById('routineName').value, document.getElementById('cycles').innerHTML, language ));

}

function exBuffer(ele) {
    var exId = ele.getAttribute('data-exId');
    addExItem(exId);
}

function jsonRoutine (name, sets, lang) {
    var exCount = document.getElementById('routineWrap').children.length;

    var JSON = '{ "Name" : "' +name+ '", "Sets" : "' +sets+ '", "Routine" : [';

    for(var i=1;i<(exCount+1);i++){
        var ID;

        for(var x = 0;x < exercises.length;x++){
            if(exercises[x].title == $('#title' + i).html()){
                ID = exercises[x].id;
            }
        }


        JSON += '{"exID" : "' + ID + '", "Exercise" : "' +$('#title' + i).html()+ '" , "Sets" : "' +$('#exercise' + i).val()+ '"}';
        if(i != exCount){
            JSON += ', ';
        }
    }

    JSON += '] }';


    return JSON;
}

function routineTableConstruct(JSON){
    //CONSTRUCT AND RETURN TABLE HERE
}

function loadModal () {

    var link = document.getElementById('load');
    link.click();

}

function saveModal () {
    var link = document.getElementById('save');

    var name = document.getElementById('routineName').value;

    if(name != ''){
        link.click();
    }
    else{
        document.getElementById('noName').click();

    }
}

function routineSave(login) {

    //userName, cycles and routine name
    var userName = login;
    var cycles = document.getElementById('cycles').innerHTML;
    var name = document.getElementById('routineName').value;

    //Generate the routine JSON
    var JSON = jsonRoutine(name, cycles, language);

    console.log(login + ''+  name + ''+ cycles);

    //POST the data using AJAX
    $.ajax({
        url: 'Queries/saveRoutine.php',                  //the script to call to get data
        type: 'POST',
        data: ({user: userName, name: name, routineJSON: JSON}),
        dataType: 'json',                //data format
        success: function(data)          //on recieve of reply
        {
            console.log(data)

            // close save dialog box
            document.getElementById('saveClose').click();

            //Display the appropriate message
            var create;
            var update;

            for(var i=0;i<pageData['saveMessage'].length;i++){
                if(pageData['saveMessage'][i].ID == '6'){
                    create = pageData['saveMessage'][i].content;
                }
                if(pageData['saveMessage'][i].ID == '7'){
                    update = pageData['saveMessage'][i].content;
                }

            }

            if(data['message'] == 'create'){
                console.log('create');
                topBar(create);
            }

            if(data['message'] == 'update'){
                topBar(update);
                console.log('update');
            }


        }
    });




}

function topBar(message) {
    var skel = document.getElementById('popWrap');

    $("<div />", { 'class': 'topBar', text: message }).hide().prependTo(skel)
        .slideDown('fast').delay(2000).slideUp(function() { $(this).remove(); });
}


function validateSaveForm() {
    var saveName = document.forms["saveRoutine"]["routineName"].value;
    var graphemeCount = splitter.countGraphemes(saveName);
    console.log(graphemeCount);

    if (graphemeCount < 1) {
        alert("Name must be filled out");
        return false;
    }

}

function exportRoutine() {
    var cycles = document.getElementById('cycles').innerHTML;
    var name = document.getElementById('routineName').value;

    if(name != ''){
        var JSON = jsonRoutine(name, cycles, language);

        var win = window.open("", "Title", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=780, height=200, top="+(screen.height-400)+", left="+(screen.width-840));
        win.document.body.innerHTML = JSON;
    }
    else{
        alert('Please enter a name for the routine!');
    }

}

function popLoadModal(){

    //Populate load modal with saved routine names if the exist
    if(pageData['savedRoutines'].length > 0){
        //empty the load modal dialog of current message
        document.getElementById('loadModal').innerHTML = '';

        //populate the modal with the list
        var string = '';
        for(var i=0;i<pageData['savedRoutines'].length;i++){
            string += '<p><input class="loadRadio" type="radio" name="loadRadio" value="' + pageData['savedRoutines'][i].routineName + '" ><label style="display:inline-block;" for="' + pageData['savedRoutines'][i].routineName + '" >' + pageData['savedRoutines'][i].routineName + '</label><br /></p>';
        }

        string += '<div style="margin-top: 10px;"><button id="loadSel" class="button special floatLeft yes" onclick ="loadRoutine();">' +loadText+ '</button><a style="margin-bottom: -22px;" id="loadClose" class="button nyroModalClose floatRight no" href="#">' + closeText + '</a></div>';

        document.getElementById('loadModal').innerHTML = string;
    }

}

// FUNCTION TO POPULATE GET THE ROUTINE JSON OF THE SELECTED ROUTINE
function loadRoutine() {
    var radios = document.getElementsByName('loadRadio');
    var routineName;
    var routineJSON;

    for(var i=0;i<radios.length;i++){
        if(radios[i].checked){
            routineName = radios[i].value;
        }
    }

    for(var i=0;i<pageData['savedRoutines'].length;i++){
        if(pageData['savedRoutines'][i].routineName === routineName){
            routineJSON = pageData['savedRoutines'][i].routineJSON;
        }
    }

    document.getElementsByClassName('nyroModalBg')[0].click()
    popRoutine(routineJSON);
}

// FUNCTION TO POPULATE THE ROUTINE INTERFACE WITH A ROUTINE BASED OF JSON format
function popRoutine(json){

    console.log(pageData);
    var setContent = pageData['sets'][0].content;
    console.log(json);
    var routine = JSON.parse(json);
    console.log(routine);
    var html = '';
    var sets;

    var exCount = 1;

    document.getElementById('routineName').value = routine.Name;
    document.getElementById('cycles').innerHTML = routine.Sets;

    for(var i=0;i<routine.Routine.length;i++){
        var name;

        for(var x = 0;x < exercises.length;x++){
            if(exercises[x].id == routine.Routine[i].exID){
                name = exercises[x].title;
                sets = routine.Routine[i].Sets;
            }
        }

        html += '<div class="exItem" ><div class="floatLeft" style="display: inline-block;"><h4 id="title' +exCount+ '">' + name + '</h4><h5 >'+setContent+': ' +sets+ '</h5><div style="margin: 0 auto;"><button id="decrease' +exCount+ '" class="button special disabled" style="display: inline-block;" onclick="decreaseRep(this.id, \'exercise' +exCount+ '\' );" >-</button><input id="exercise' +exCount+ '" type="text" style="width: 73px;text-align: center;display: inline-block;" value="' + routine.Routine[i].Sets + '" disabled/><button id="increase' +exCount+ '" class="button special" style="display: inline-block;" onclick="addRep(\'decrease' +exCount+ '\', \'exercise' +exCount+ '\');">+</button> </div></div><div class="floatRight" style="font-size:44px;"  ><i onclick="moveExItem(this.parentNode.parentNode, 1);" style="cursor: pointer;" class="icon fa-arrow-up" aria-hidden="true"></i><br/><i onclick="removeExItem(this);" style="color: red;cursor: pointer;" class="icon fa-minus-circle" aria-hidden="true"></i><br /><i onclick="moveExItem(this.parentNode.parentNode, 0);" style="cursor: pointer;" class="icon fa-arrow-down" aria-hidden="true"></i></div> <div style="clear: both;" > </div>  </div>'
        exCount += 1;
    }

    document.getElementById('routineWrap').innerHTML = html;
    localStorage.setItem('routineState', jsonRoutine(document.getElementById('routineName').value, document.getElementById('cycles').innerHTML, language ));

}



function moveExItem(node, n) {
    var sets = node.getElementsByTagName('input')[0].value;

    console.log(sets);
    var region = node.parentElement;
    var item = node;
    var html = item.innerHTML;
    var length = region.children.length;

    var newNode = document.createElement("div");
    newNode.className = 'exItem';
    newNode.innerHTML = html;


    var index = 0;

    while( (node = node.previousSibling) != null ) {
        index++;
    }

    console.log(index);


    if(n == 1){
        if(index > 0) {
            item.parentElement.removeChild(item);
            region.insertBefore(newNode, region.children[index-1]);
            newNode.getElementsByTagName('input')[0].value = sets;
        }

    }
    else {
        if(index < length-1) {
            item.parentElement.removeChild(item);
            region.insertBefore(newNode, region.children[index+1]);
            newNode.getElementsByTagName('input')[0].value = sets;
        }
    }

    //Save state in local storage
    localStorage.setItem('routineState', jsonRoutine(document.getElementById('routineName').value, document.getElementById('cycles').innerHTML, language ));

}


function clearRoutine() {
    document.getElementById('routineWrap').innerHTML = '';
    document.getElementById('routineName').value = '';
    document.getElementById('cycles').innerHTML = '1';

    document.getElementById('clearClose').click();

    localStorage.setItem('routineState', '');
}

function nameChange() {
    localStorage.setItem('routineState', jsonRoutine(document.getElementById('routineName').value, document.getElementById('cycles').innerHTML, language ));
}



$( document ).ready(function() {




});
