

<?php

//    Gets string value for the word 'Difficulty' in the required language to store as JS var
    $difficulty = contentSearch($trainingContent, 'ID', 3);
    echo '<script>var difficulty = "' .  $difficulty[0]['content'] . '";</script>';

?>
<!--==================-->


<div class="sort">
<h5>Sort: </h5>
    <select onchange="exerciseSort(this.value, language, localeSupport);">
        <option value="body_part"  ><?php  $mainName = contentSearch($trainingContent, 'ID', 4); echo $mainName[0]['content'] ?></option>
        <option value="relevance" ><?php  $mainName = contentSearch($trainingContent, 'ID', 5); echo $mainName[0]['content'] ?></option>
        <option value="difficulty" ><?php  $mainName = contentSearch($trainingContent, 'ID', 3); echo $mainName[0]['content'] ?></option>
    </select>

</div>

<div class="row" id="exercises">
<!--    <div class="pod">-->
<!--        <div class="box post">-->
<!--            <div class="exersizeImage">-->
<!--                <img src="">-->
<!--            </div>-->
<!---->
<!--            <div class="" >-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="pod">-->
<!--        <div class="box post">-->
<!--            <div class="exersizeImage">-->
<!--                <img src="">-->
<!--            </div>-->
<!---->
<!--            <div class="" >-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="pod">-->
<!--        <div class="box post">-->
<!--            <div class="exersizeImage">-->
<!--                <img src="">-->
<!--            </div>-->
<!---->
<!--            <div class="" >-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="pod">-->
<!--        <div class="box post">-->
<!--            <div class="exersizeImage">-->
<!--                <img src="">-->
<!--            </div>-->
<!---->
<!--            <div class="" >-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="pod">-->
<!--        <div class="box post">-->
<!--            <div class="exersizeImage">-->
<!--                <img src="">-->
<!--            </div>-->
<!---->
<!--            <div class="" >-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>
