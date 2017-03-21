


// =================================
// Start Layout template functions:
// =================================

var localeSupport = false;
//Determines whether locale and option arguement for localeCompare method are supported by the client
function localeCompareSupportsLocales() {
    try {
        'foo'.localeCompare('bar', 'i');
    } catch (e) {
        localeSupport = false;
    }
    localeSupport = true;
}

// Retrieves cookies from domain
function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

// Calls both region and language override cookie set functions at once with specified values
function localeInit(reg, lang){

    setRegionOverride(reg, false);
    setLanguageOverride(lang, false);

    window.location.reload();
}



//Sets a region preference cookie for the whole domain with optional reload param

function setRegionOverride(reg, val, reload) {

    if(reload){

        $("#regOvConfirm").click(function() {
            regOverride(reg, reload);
        });

        document.getElementById('newReg').innerHTML=val;

        document.getElementById('regChange').click();
    }
    else {
        var now = new Date();
        var time = now.getTime();
        var expireTime = time + 1000*36000;
        var cookie = "regionOverride=" + reg + ";expires=" + expireTime + ";path=/";
        document.cookie = cookie;
    }


}

function regOverride(reg, reload) {

    var now = new Date();
    var time = now.getTime();
    var expireTime = time + 1000*36000;
    var cookie = "regionOverride=" + reg + ";expires=" + expireTime + ";path=/";
    document.cookie = cookie;

    if(reload) {
        window.location.reload();
    }

}

//Sets a language preference cookie for the whole domain with optional reload param
function setLanguageOverride(lang, val, reload) {

    if(reload){
        $("#langOvConfirm").click(function() {
            langOverride(lang, reload);
        });

        document.getElementById('newLang').innerHTML=val;

        document.getElementById('langChange').click();
    }
    else {
        //Flush any routine state captured from previous language
        localStorage.setItem('routineState', '');

        var now = new Date();
        var time = now.getTime();
        var expireTime = time + 1000*36000;
        var cookie = "languageOverride=" + lang + ";expires=" + expireTime + ";path=/";
        document.cookie = cookie;


    }





}

function langOverride(lang, reload){
    //Flush any routine state captured from previous language
    localStorage.setItem('routineState', '');

    var now = new Date();
    var time = now.getTime();
    var expireTime = time + 1000*36000;
    var cookie = "languageOverride=" + lang + ";expires=" + expireTime + ";path=/";
    document.cookie = cookie;

    if(reload) {
        window.location.reload();
    }

}


//HYPERLINK function with optional new tab
function link(link,tab) {
    if(tab){
        window.open(link, "_blank");
    }
    else {
        window.location.href = link;
    }
}


//SWITCH Variable to store whether the MENU should currently be hidden
var menuTog = true;

//ON SCROLL show and hide hide menu when scroll top is greater than 10
$(window).scroll(function(){
    var sTop = $(this).scrollTop();

    if(sTop > 10){

        $( "#menu" ).css("height", "0");
        $( "#menu" ).css("display", "none");

        menuTog = false;

    }
    else {
        if(!(menuTog)) {
            $( "#menu" ).css("height", "40px");
            $( "#menu" ).css("display", "block");

            menuTog = true;

        }
    }

});


//ON HOVER of header: show menu (if hidden)
$("#header").hover(function(){
    $( "#menu" ).css("height", "40px");
    $( "#menu" ).css("display", "block");
});

//ON LEAVE of header: hide menu if its supposed to be hidden
$("#header").mouseleave(function(){
    if(!(menuTog)){
        $( "#menu" ).css("height", "0");
        $( "#menu" ).css("display", "none");
    }
});




function logTog () {

    document.getElementById('register').style.display = 'none';
    document.getElementById('errorBar').innerHTML = '';
    document.getElementById('errorBar2').innerHTML = '';

    var display = document.getElementById('login').style.display;

    if(display == 'block'){
        document.getElementById('login').style.display = 'none';
    }
    else {
        document.getElementById('login').style.display = 'block';
    }

}

function registerTog () {
    document.getElementById('login').style.display = 'none';
    document.getElementById('errorBar').innerHTML = '';
    document.getElementById('errorBar2').innerHTML = '';

    var display = document.getElementById('register').style.display;

    if(display == 'block'){
        document.getElementById('register').style.display = 'none';
    }
    else {
        document.getElementById('register').style.display = 'block';
    }
}


// =================================
// END Layout template functions:
// =================================



function maskChange(ele, trigg){
    var target = trigg;
    var mask = document.getElementById(ele)
    var string = target.value;

    var counter = new GraphemeSplitter();
    var passCount = counter.countGraphemes(string);

    var stringMask='';
    for(var i=0;i<passCount;i++){
        stringMask += 'a';
    }

    mask.value = stringMask;

}


var dateShortFormat ='';


$(function ()
{

    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        url: 'Queries/dateQuery.php',                  //the script to call to get data
        type: 'POST',
        data: ({region: region}),
        dataType: 'json',                //data format
        success: function(data)          //on recieve of reply
        {
            console.log('Date Short: ');
            console.log(data);
            dateShortFormat = data['dateFormat'][0]['date_short'];

        }
    });
});



function formatDate(format, date){
    console.log('now');

    var result ='';
    var format = format.toLowerCase();
    var component = '';
    var lastFormat = '';


    for(var i=0;i<format.length+1;i++) {

        if (format[i] == 'y' || format[i] =='m' || format[i] =='d'){

            component += format[i];


        }
    else {
            if(component != '') result += printComponent(component, date);
            component = '';
            if(format[i] != undefined) result += format[i];

        }

    }


    return result;
    // prints the localised date string

}


function printComponent(component, date) {

    // LOOKS UP THE NEXT REQUIRES CHARACTER FROM A GIVEN COMPONENT OF A JAVASCRIPT DATE

    var date = new Date(date);


    var ref;


    switch(component[0]) {
        case 'd':
            ref = date.getDate().toString();
            break;
        case 'm':
            ref = (date.getMonth()+1).toString();
            break;
        case'y':
            ref = reverse(date.getFullYear().toString());
            break;
    }


    if(component[0] != 'y'){
        var length = component.length;
        if(ref.length < component.length) {
            ref = '0' + ref;
        }
    }
    else {
        ref = ref.substring(0,component.length);
        ref = reverse(ref);
    }

    return ref;

}

String.prototype.splice = function(idx, rem, str) {
    return this.slice(0, idx) + str + this.slice(idx + Math.abs(rem));
};


function reverse(s){
    return s.split("").reverse().join("");
}

function reverseYear(format, date){

    var year = '';
    var newDate = date;

    for(var i=0;i<format.length;i++) {
        if(format[i] == 'y') year += date[i];
    }

    reverse(year);

    for(var i=0;i<format.length;i++) {
        if(format[i] == 'y') newDate[i] = year[i];
    }

    return newDate;
}



