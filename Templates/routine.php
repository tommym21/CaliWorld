

<div style="width: 100%;">
    <a id="print" class="button nyroModal" href="#saveModal"" >Save</a>
    <a id="export" class="button" onclick="exportRoutine();" >Export</a>

    <a id="addExercise" class="button special nyroModal" href="#exerciseModal" >Add Exercise</a>
    <a id="increaseCycle" class="button special nyroModal" href="#cycleModal" onclick="cycleModal();">Cycle Count</a>


    <div style="clear: both;"></div>
</div>

<div style="width: 100%;">
    <hr>
</div>


<div  style="width: 100%;">
    <h4 style="display: inline-block;margin: 0;">Cycles:</h4>&nbsp;&nbsp;<h4 style="display: inline-block;margin: 0;" id="cycles">1</h4>
</div>


<div style="width: 100%;">
    <hr>
</div>

<div id="routineWrap" style="width: 100%;">

    <!-- MOCK MARK UP FOR EXERSIZE ITEMS IN COMMENTS BELOW -->
<!--    <div class="exItem" >-->
<!--        <h4>Regular Push Ups</h4>-->
<!--        <h5 >Sets: </h5>-->
<!---->
<!--        <div style="float:right;font-size:44px;color: red;"  onclick="removeExItem(this);">-->
<!--            <i class="icon fa-minus-circle" aria-hidden="true"></i>-->
<!--        </div>-->
<!---->
<!--        <div style="margin: 0 auto;">-->
<!--            <button id="decrease1" class="button special disabled" style="display: inline-block;" onclick="decreaseRep(this.id, 'exercise1' );" >-</button><input id="exercise1" type="text" style="width: 73px;text-align: center;display: inline-block;" value="1" disabled/><button id="increase1" class="button special" style="display: inline-block;" onclick="addRep('decrease1', 'exercise1');">+</button>-->
<!--        </div>-->
<!---->
<!---->
<!--        <div style="clear: both;" >   </div>-->
<!--    </div>-->
<!---->
<!--    <div class="exItem" >-->
<!--        <h4>Regular Push Ups</h4>-->
<!--        <h5 >Sets: </h5>-->
<!---->
<!--        <div style="float:right;font-size:44px;color: red;"  onclick="removeExItem(this);">-->
<!--            <i class="icon fa-minus-circle" aria-hidden="true"></i>-->
<!--        </div>-->
<!---->
<!--        <div style="margin: 0 auto;">-->
<!--            <button id="decrease1" class="button special disabled" style="display: inline-block;" onclick="decreaseRep(this.id, 'exercise1' );" >-</button><input id="exercise1" type="text" style="width: 73px;text-align: center;display: inline-block;" value="1" disabled/><button id="increase1" class="button special" style="display: inline-block;" onclick="addRep('decrease1', 'exercise1');">+</button>-->
<!--        </div>-->
<!---->
<!---->
<!--        <div style="clear: both;" >   </div>-->
<!--    </div>-->


</div>










<!--=================  MODALS =====================-->

    <!------------ Exercise Modal --------------------->
        <div id="exerciseModal" style="display: none;width: 600px;">
            Exersice Picker Modal Div

            <a class="button nyroModalClose" href="#">Close</a>

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
            <form name="saveRoutine" action="Queries/saveRoutine.php" onsubmit="return validateSaveForm()" method="post">
                <label for="routineName">Enter a name for your routine: </label><br /><br />
                <input id="routineName" type="text" style="" /><br /><br />
                <a style="float: left;" class="button nyroModalClose" href="#">Cancel</a>
                <button style="float: left;" type="submit" class="button special">Save</button>
            </form>
        </div>


    </div>
    <!------------------------------------------------->

<!--================================================-->