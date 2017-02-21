<div class="container firstContainer">
    <div class="row">
        <h4>Search Map</h4>

        <form style="padding-top: 10px">

            <div class="pod">
                <input type="checkbox" id="park" name="park" checked onchange="mapSearch();">
                <label for="park">Park</label>

                <div style="clear: both;padding-bottom: 45px;"></div>
            </div>

            <div class="pod">
                <input type="checkbox" id="trainingequiptment" name="trainingequiptment" onchange="mapSearch();" >
                <label for="trainingequiptment">Training Equiptment</label>

                <div style="clear: both;padding-bottom: 45px;"></div>
            </div>

            <div class="pod">
                <input type="checkbox" id="affiliate" name="affiliate" onchange="mapSearch();" >
                <label for="affiliate">WSWF Affiliate</label>

                <div style="clear: both;padding-bottom: 45px;"></div>
            </div>

        </form>

    </div>

</div>

<div class="container">



    <div id="gmap" style="with:300px;height:250px;"></div>

</div>

<script src="js/locations.js"></script>
<script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyDh6moMbUVUvoe2BZ3DMOCF2xjJ7OPG4Pc&language=en"></script>
<script src="Maplace/maplace.min.js"></script>
<script type="text/javascript">
    $(function() {
        new Maplace({
            show_markers: true,
            locations: parks_<?php echo $lang ?>,
            controls_on_map: false
        }).Load();
    });
</script>

