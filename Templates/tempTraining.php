<div class="container firstContainer">

    <div class="row uniform">
        <div class="6u 12u(3)">
            <div id="Exersizes" class="box active" onclick="contentToggle(this.id);tabSwitch(this.id);">
                <h3>Exersizes</h3>
            </div>
        </div>
        <div  class="6u 12u(3)">
            <div id="Routine" class="box" onclick="contentToggle(this.id);tabSwitch(this.id);" >
                <h3>Create a Routine</h3>
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

