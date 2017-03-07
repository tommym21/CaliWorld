<div class="container firstContainer">

    <header class="major">
        <p><?php  $mainName = contentSearch($trainingMapContent, 'ID', 5); echo $mainName[0]['content'] ?></p>
    </header>

    <div class="row">
        <h4><?php  $mainName = contentSearch($trainingMapContent, 'ID', 1); echo $mainName[0]['content'] ?></h4>

        <form style="padding-top: 10px">

            <div class="pod">
                <input type="checkbox" id="park" name="park" checked onchange="mapSearch();">
                <label for="park"><?php  $mainName = contentSearch($trainingMapContent, 'ID', 2); echo $mainName[0]['content'] ?></label>

                <div style="clear: both;padding-bottom: 45px;"></div>
            </div>

            <div class="pod">
                <input type="checkbox" id="trainingequiptment" name="trainingequiptment" onchange="mapSearch();" >
                <label for="trainingequiptment"><?php  $mainName = contentSearch($trainingMapContent, 'ID', 3); echo $mainName[0]['content'] ?></label>

                <div style="clear: both;padding-bottom: 45px;"></div>
            </div>

            <div class="pod">
                <input type="checkbox" id="affiliate" name="affiliate" onchange="mapSearch();" >
                <label for="affiliate"><?php  $mainName = contentSearch($trainingMapContent, 'ID', 4); echo $mainName[0]['content'] ?></label>

                <div style="clear: both;padding-bottom: 45px;"></div>
            </div>

        </form>

    </div>

</div>

<div class="container">



    <div id="gmap" style="with:300px;height:250px;"></div>

</div>

<script src="js/locations.js"></script>
<script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyDh6moMbUVUvoe2BZ3DMOCF2xjJ7OPG4Pc&language=<?php echo $lang ?>"></script>
<script src="Maplace/maplace.min.js"></script>

