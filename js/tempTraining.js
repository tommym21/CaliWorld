
function contentToggle(id) {
    var string = 'output' + id;
    if(string == 'outputExersizes'){
        $('#outputExersizes').addClass('show');
        $('#outputExersizes').removeClass('hide');

        $('#outputRoutine').addClass('hide');
        $('#outputRoutine').removeClass('show');
    }
    else {
        $('#outputExersizes').addClass('hide');
        $('#outputExersizes').removeClass('show');

        $('#outputRoutine').addClass('show');
        $('#outputRoutine').removeClass('hide');

    }

}

var pageData;

$(function ()
{
    console.log(language);
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        url: 'Queries/trainingQueries.php',                  //the script to call to get data
        type: 'POST',
        data: ({lang: language}),
        dataType: 'json',                //data format
        success: function(data)          //on recieve of reply
        {
            console.log(data.array1);
            console.log(data.array2);
            pageData = data;

            getExercises();               //tell page to populate with data
            exerciseConstruct();
            console.log(pageData);

        }
    });
});

//Array to store exersize JSON
var exercises = [];

function getExercises(){

    for(var i=0;i<pageData.exercises.length;i++){
        exercises.push(pageData.exercises[i]);
    }
}

function exerciseSort() {

}

function exerciseConstruct () {
    var string='';
    var rest;

    for (var i=0;i<exercises.length;i++){
        rest = (5 - parseInt(exercises[i].difficulty));
        string += '<div class="pod"><div class="box post" >' +
            '<div class="mediaImage float"><img src="Images/' + exercises[i].image + '" ></div>' +
            '<div class="mediaTitle float"><h4>' + exercises[i].title + '</h4></div>' +
            '<div class="mediaContent" >' + exercises[i].body_part + '<br />' + exercises[i].summary + '</div>' +
            '<br /><div class="rating"><h5>Difficulty:</h5>';

                for(var x = 0;x < exercises[i].difficulty;x++){
                    string += '<span style="color:red">☆</span>';
                }

                for(var y =0;y<rest;y++){
                    string += '<span>☆</span>';
                }

             string += '</div><div style="clear:both;"></div></div>';
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
}


function removeExItem(ele) {
    var item = ele.parentElement;

    item.parentNode.removeChild(item);
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


    string += '<div class="exItem" ><h4 id="title' +exCount+ '">' +item.title+ '</h4><h5 >Sets: </h5><div style="float:right;font-size:44px;color: red;"  onclick="removeExItem(this);"><i class="icon fa-minus-circle" aria-hidden="true"></i></div><div style="margin: 0 auto;"><button id="decrease' +exCount+ '" class="button special disabled" style="display: inline-block;" onclick="decreaseRep(this.id, \'exercise' +exCount+ '\' );" >-</button><input id="exercise' +exCount+ '" type="text" style="width: 73px;text-align: center;display: inline-block;" value="1" disabled/><button id="increase' +exCount+ '" class="button special" style="display: inline-block;" onclick="addRep(\'decrease' +exCount+ '\', \'exercise' +exCount+ '\');">+</button> </div> <div style="clear: both;" >   </div>';


    $('#routineWrap').append(string);



}

function exBuffer(ele) {
    var exId = ele.getAttribute('data-exId');
    addExItem(exId);
}

function jsonRoutine (name, sets) {
    var exCount = document.getElementById('routineWrap').children.length;

    var JSON = '{ "Name" : "' +name+ '", "Sets" : "' +sets+ '", "Routine" : [';

    for(var i=1;i<(exCount+1);i++){
        JSON += '{ "Exercise" : "' +$('#title' + i).html()+ '" , "Sets" : "' +$('#exercise' + i).val()+ '"}, ';
    }

    JSON += '] }';


    console.log(JSON);
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
    jsonRoutine('test', 2);
}
