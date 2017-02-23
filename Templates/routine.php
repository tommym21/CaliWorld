

<div style="width: 100%;">
    <?php
    if(!$loggedIn) {
        ?>

        <p><?php  $mainName = contentSearch($trainingContent, 'ID', 8); echo $mainName[0]['content'] ?><br /><br /></p>

        <?php
    }else {
        ?>

        <button  class="button" onclick="saveModal();"" ><?php  $mainName = contentSearch($trainingContent, 'ID', 10); echo $mainName[0]['content'] ?></button>
        <button  class="button" onclick="loadModal();"" ><?php  $mainName = contentSearch($trainingContent, 'ID', 11); echo $mainName[0]['content'] ?></button>
        <a id="save" style="display: none !important;" class="button nyroModal" href="#saveModal"" >#</a>
        <a id="load" style="display: none !important;" class="button nyroModal" href="#loadModal"" >#</a>
        <p class="errorBar" style="display: none;"><br /><br /></p> <!----  Not needed?-->

        <?php
    }
    ?>

    <a id="export" class="button" onclick="exportRoutine();" ><?php  $mainName = contentSearch($trainingContent, 'ID', 9); echo $mainName[0]['content'] ?></a>

    <a id="addExercise" class="button special nyroModal" href="#exerciseModal" ><?php  $mainName = contentSearch($trainingContent, 'ID', 12); echo $mainName[0]['content'] ?></a>
    <a id="increaseCycle" class="button special nyroModal" href="#cycleModal" onclick="cycleModal();"><?php  $mainName = contentSearch($trainingContent, 'ID', 13); echo $mainName[0]['content'] ?></a>


    <div style="clear: both;"></div>
</div>

<div style="width: 100%;">
    <hr>
</div>


<div  style="width: 100%;">
    <h4 style="display: inline-block;margin: 0;"><?php  $mainName = contentSearch($trainingContent, 'ID', 14); echo $mainName[0]['content'] ?>:</h4>&nbsp;
    <input type="text" id="routineName" onchange="nameChange();"/>
    <h4 style="display: inline-block;margin: 0;"><?php  $mainName = contentSearch($trainingContent, 'ID', 15); echo $mainName[0]['content'] ?>:</h4>&nbsp;&nbsp;<h4 style="display: inline-block;margin: 0;" id="cycles">1</h4>
    <p class="errorBar" style="display: none;"><br /><br /></p>

</div>


<div style="width: 100%;">
    <hr>
</div>

<div id="routineWrap" style="width: 100%;"></div>

<div  style="width: 100%;">
    <a id="clearButton" class="button special nyroModal" href="#clearModal" ><?php  $mainName = contentSearch($trainingContent, 'ID', 17); echo $mainName[0]['content'] ?></a>
</div>










<!--=================  MODALS =====================-->

    <!------------ Exercise Modal --------------------->
        <div id="exerciseModal" style="display: none;width: 600px;">
            <a class="button nyroModalClose" href="#"><?php  $mainName = contentSearch($trainingContent, 'ID', 19); echo $mainName[0]['content'] ?></a>

            <h4><?php  $mainName = contentSearch($trainingContent, 'ID', 20); echo $mainName[0]['content'] ?>:</h4>

            <div id="pickRegion">

            </div>
        </div>
    <!------------------------------------------------->

    <!------------ Cycle Number modal ----------------->
        <div id="cycleModal" style="display: none;width: 600px;">

            <div style="margin: 0 auto;">
                <button id="decrease" class="button special" style="display: inline-block;" onclick="decreaseCycle();" >-</button><input id="cycleInput" type="text" style="width: 73px;text-align: center;display: inline-block;" disabled/><button id="increase" class="button special" style="display: inline-block;" onclick="addCycle();">+</button>
            </div>

            <a class="button nyroModalClose" href="#"><?php  $mainName = contentSearch($trainingContent, 'ID', 19); echo $mainName[0]['content'] ?></a>
        </div>
    <!------------------------------------------------->

    <!------------ Routine save modal ----------------->
    <div id="saveModal" style="display: none;width: 600px;">

        <div style="margin: 0 auto;">
                <h4><?php  $mainName = contentSearch($trainingContent, 'ID', 24); echo $mainName[0]['content'] ?></h4>

                <a id='saveClose' class="button nyroModalClose" href="#"><?php  $mainName = contentSearch($trainingContent, 'ID', 25); echo $mainName[0]['content'] ?></a>
                <button style="float: left;" type="submit" class="button special" onclick="routineSave(login_user);"><?php  $mainName = contentSearch($trainingContent, 'ID', 10); echo $mainName[0]['content'] ?></button>

        </div>


    </div>
    <!------------------------------------------------->




<!------------ Routine load modal ----------------->
<div id="loadModal" style="display: none;width: 600px;">

    <div style="margin: 0 auto;">
        <h4><?php  $mainName = contentSearch($trainingContent, 'ID', 23); echo $mainName[0]['content'] ?></h4>

        <a id='loadClose' class="button nyroModalClose" href="#"><?php  $mainName = contentSearch($trainingContent, 'ID', 25); echo $mainName[0]['content'] ?></a>
    </div>


</div>
<!------------------------------------------------->

<!------------ Clear Routine modal ----------------->
<div id="clearModal" style="display: none;width: 600px;">

    <div style="margin: 0 auto;">
        <h4><?php  $mainName = contentSearch($trainingContent, 'ID', 21); echo $mainName[0]['content'] ?></h4>
        <p><?php  $mainName = contentSearch($trainingContent, 'ID', 22); echo $mainName[0]['content'] ?></p>

        <a id='clearClose' class="button nyroModalClose" href="#"><?php  $mainName = contentSearch($trainingContent, 'ID', 25); echo $mainName[0]['content'] ?></a>
        <button class="button special" onclick="clearRoutine();"><?php  $mainName = contentSearch($trainingContent, 'ID', 17); echo $mainName[0]['content'] ?></button>
    </div>


</div>
<!------------------------------------------------->

<!--================================================-->