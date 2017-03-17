<div class="container firstContainer">

    <div class="row uniform">
        <div class="trainHead floatLeft 6u 12u(3)">
            <div id="Exersizes" class="box active" onclick="contentToggle(this.id);tabSwitch(this.id);">
                <h3><?php  $mainName = contentSearch($trainingContent, 'ID', 1); echo $mainName[0]['content'] ?></h3>
            </div>
        </div>
        <div  class="trainHead floatLeft 6u 12u(3)">
            <div id="Routine" class="box" onclick="contentToggle(this.id);tabSwitch(this.id);" >
                <h3><?php  $mainName = contentSearch($trainingContent, 'ID', 2); echo $mainName[0]['content'] ?></h3>
            </div>
        </div>
    </div>

</div>


<div class="container">

    <div id="outputExersizes" class="show" style="width: 100%;">

        <?php
        include('Templates/exersizes.php');
        ?>

    </div>

    <div id="outputRoutine" class="hide" style="width: 100%;" >

        <?php
        include('Templates/routine.php');
        ?>

    </div>

</div>

