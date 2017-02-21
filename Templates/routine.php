

<div style="width: 100%;">
    <?php
    if(!$loggedIn) {
        ?>

        <p>Creating an account will allow you to save your workouts.<br /><br /></p>

        <?php
    }else {
        ?>

        <button  class="button" onclick="saveModal();"" >Save</button>
        <button  class="button" onclick="loadModal();"" >Load Routine</button>
        <a id="save" style="display: none !important;" class="button nyroModal" href="#saveModal"" >Save</a>
        <a id="load" style="display: none !important;" class="button nyroModal" href="#loadModal"" >Load</a>
        <p class="errorBar" style="display: none;"><br /><br /></p> <!----  Not needed?-->

        <?php
    }
    ?>

    <a id="export" class="button" onclick="exportRoutine();" >Export</a>

    <a id="addExercise" class="button special nyroModal" href="#exerciseModal" >Add Exercise</a>
    <a id="increaseCycle" class="button special nyroModal" href="#cycleModal" onclick="cycleModal();">Cycle Count</a>


    <div style="clear: both;"></div>
</div>

<div style="width: 100%;">
    <hr>
</div>


<div  style="width: 100%;">
    <h4 style="display: inline-block;margin: 0;">Routine Name:</h4>&nbsp;
    <input type="text" id="routineName" onchange="nameChange();"/>
    <h4 style="display: inline-block;margin: 0;">Cycles:</h4>&nbsp;&nbsp;<h4 style="display: inline-block;margin: 0;" id="cycles">1</h4>
    <p class="errorBar" style="display: none;"><br /><br /></p>

</div>


<div style="width: 100%;">
    <hr>
</div>

<div id="routineWrap" style="width: 100%;"></div>

<div  style="width: 100%;">
    <a id="clearButton" class="button special nyroModal" href="#clearModal" >Clear</a>
</div>










<!--=================  MODALS =====================-->

    <!------------ Exercise Modal --------------------->
        <div id="exerciseModal" style="display: none;width: 600px;">
            <a class="button nyroModalClose" href="#">Close</a>

            <h4>Select an exercise:</h4>

            <div id="pickRegion">

            </div>
        </div>
    <!------------------------------------------------->

    <!------------ Cycle Number modal ----------------->
        <div id="cycleModal" style="display: none;width: 600px;">

            <div style="margin: 0 auto;">
                <button id="decrease" class="button special" style="display: inline-block;" onclick="decreaseCycle();" >-</button><input id="cycleInput" type="text" style="width: 73px;text-align: center;display: inline-block;" disabled/><button id="increase" class="button special" style="display: inline-block;" onclick="addCycle();">+</button>
            </div>

            <a class="button nyroModalClose" href="#">Close</a>
        </div>
    <!------------------------------------------------->

    <!------------ Routine save modal ----------------->
    <div id="saveModal" style="display: none;width: 600px;">

        <div style="margin: 0 auto;">
                <h4>Are you sure yo want to save this routine?</h4>

                <a id='saveClose' class="button nyroModalClose" href="#">Cancel</a>
                <button style="float: left;" type="submit" class="button special" onclick="routineSave(login_user);">Save</button>

        </div>


    </div>
    <!------------------------------------------------->


<!------------ Routine save modal ----------------->
<div id="saveModal" style="display: none;width: 600px;">

    <div style="margin: 0 auto;">
        <h4>Are you sure yo want to save this routine?</h4>

        s
        <button style="float: left;" type="submit" class="button special" onclick="routineSave(login_user);">Save</button>

    </div>


</div>
<!------------------------------------------------->

<!------------ Routine load modal ----------------->
<div id="loadModal" style="display: none;width: 600px;">

    <div style="margin: 0 auto;">
        <h4>There are currently no saved routines for <?php echo $login_session ?></h4>

        <a id='loadClose' class="button nyroModalClose" href="#">Cancel</a>
    </div>


</div>
<!------------------------------------------------->

<!------------ Clear Routine modal ----------------->
<div id="clearModal" style="display: none;width: 600px;">

    <div style="margin: 0 auto;">
        <h4>Are you sure you would like to clear your current routine?</h4>
        <p>Unsaved changes may be lost.</p>

        <a id='clearClose' class="button nyroModalClose" href="#">Cancel</a>
        <button class="button special" onclick="clearRoutine();">Clear</button>
    </div>


</div>
<!------------------------------------------------->

<!--================================================-->