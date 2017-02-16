var selectData;

$(function ()
{
    console.log('here');
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        url: 'Queries/selectQuery.php',                  //the script to call to get data
        type: 'POST',
        data: ({lang: language}),
        dataType: 'json',                //data format
        success: function(data)          //on recieve of reply
        {
            selectData = data;

            //getExercises();               //tell page to populate with data
            //exerciseConstruct();
            console.log(selectData);
            console.log('here');
        }
    });
});


function selLangChange(lang) {
    var options;

    //Empty the select list
    document.getElementById('regionInit').innerHTML = '';

    //Repopulate the select list with data in the newly selected language
    for(var i=0;i<selectData.selectList.length;i++) {
        if(selectData.selectList[i].Lang == lang) {
            options += '<option style="whitepace:nowrap;" value="' + selectData.selectList[i].Reg_Sub_Tag + '"><span style="display:block;" >' + selectData.selectList[i].Name + '</span></option>'
        }
    }

    document.getElementById('regionInit').innerHTML = options;
}