<div class="container firstContainer">

    <header class="major">
        <h2><?php  $mainName = contentSearch($streetWorkoutContent, 'id', 2); echo $mainName[0]['content'] ?></h2>
        <p><?php  $mainName = contentSearch($streetWorkoutContent, 'id', 1); echo $mainName[0]['content'] ?></p>
    </header>

</div>

<div class="container">

    <header class="major">
        <h2><?php  $mainName = contentSearch($streetWorkoutContent, 'id', 18); echo $mainName[0]['content'] ?></h2>
    </header>


<!--    ======== Sly (slider) ============-->

    <div  class="scrollWrap">

        <div class="scrollbar">
            <div class="handle">
                <div class="mousearea"></div>
            </div>
        </div>

        <div class="frame" id="basic">
            <ul class="clearfix" id="featured">
                <li class="scroll">
                    <h4>Summary</h4>
                    <h4>Image</h4>
                    <h4>Location</h4>
                </li>
                <li class="scroll">
                    <h4>Summary</h4>
                    <h4>Image</h4>
                    <h4>Location</h4>
                </li>
                <li class="scroll">
                    <h4>Summary</h4>
                    <h4>Image</h4>
                    <h4>Location</h4>
                </li>
                <li class="scroll">
                    <h4>Summary</h4>
                    <h4>Image</h4>
                    <h4>Location</h4>
                </li><li class="scroll">
                    <h4>Summary</h4>
                    <h4>Image</h4>
                    <h4>Location</h4>
                </li><li class="scroll">
                    <h4>Summary</h4>
                    <h4>Image</h4>
                    <h4>Location</h4>
                </li><li class="scroll">
                    <h4>Summary</h4>
                    <h4>Image</h4>
                    <h4>Location</h4>
                </li>

<!--                The last one will never show unless margin is set to 1px - so add in a blank one-->
                <li class="scroll">
                    <h4>Summary</h4>
                    <h4>Image</h4>
                    <h4>Location</h4>
                </li>
            </ul>
        </div>

        <ul class="pages"></ul>

        <div class="controls center">


<!--            <button class="btn backward"><i class="icon icon-chevron-left"></i> move</button>-->

            <div class="btn-group">
                <button class="button special small toStart"><i class="icon fa-angle-double-left" aria-hidden="true"></i> <?php  $content = contentSearch($streetWorkoutContent, 'id', 13); echo $content[0]['content'] ?></button>
                <button class="button special small prevPage"><i class="icon fa-angle-left"></i><i class="fa icon-chevron-left"></i> <?php  $content = contentSearch($streetWorkoutContent, 'id', 14); echo $content[0]['content'] ?></button>
                <button class="button special small prev"><i class="icon icon-chevron-left"></i> <?php  $content = contentSearch($streetWorkoutContent, 'id', 15); echo $content[0]['content'] ?></button>
                <button class="button special small next"><?php  $content = contentSearch($streetWorkoutContent, 'id', 16); echo $content[0]['content'] ?> <i class="icon-chevron-right"></i></button>
                <button class="button special small nextPage"><?php  $content = contentSearch($streetWorkoutContent, 'id', 14); echo $content[0]['content'] ?> <i class=" icon fa-angle-right"></i></button>
                <button class="button special small toEnd"><?php  $content = contentSearch($streetWorkoutContent, 'id', 17); echo $content[0]['content'] ?> <i class="icon fa-angle-double-right" aria-hidden="true"></i></button>
            </div>


        </div>
    </div>

<!--    ================================================    -->

</div>


<div class="container">

    <header class="major">
        <h2><?php  $content = contentSearch($streetWorkoutContent, 'id', 12); echo $content[0]['content'] ?></h2>
    </header>

    <div class="row">
        <div class="6u 12u(2)">

            <div class="box post">
                <div class="image fit">
                    <div class="podHead">
                        <h3><?php  $content = contentSearch($streetWorkoutContent, 'id', 3); echo $content[0]['content'] ?></h3>
                    </div>
                    <img src="Images/article_uk.jpg">
                </div>

                <div id="mediaWrap" class="scroll" style="height:280px;">
                    <table id="competitions" class="alt">
                        <thead>
                        <tr>
                            <th><?php  $content = contentSearch($streetWorkoutContent, 'id', 6); echo $content[0]['content'] ?></th>
                            <th><?php  $content = contentSearch($streetWorkoutContent, 'id', 7); echo $content[0]['content'] ?></th>
                            <th><?php  $content = contentSearch($streetWorkoutContent, 'id', 8); echo $content[0]['content'] ?></th>
                        </tr>
                        </thead>

                    </table>
                </div>

            </div>

        </div>


        <div class="6u 12u(2)">

            <div class="box post">
                <div class="image fit">
                    <div class="podHead">
                        <h3><?php  $content = contentSearch($streetWorkoutContent, 'id', 4); echo $content[0]['content'] ?></h3>
                    </div>
                    <img src="Images/article_uk.jpg">
                </div>


                <div id="mediaWrap" class="scroll" style="height:280px;">


                    <p><?php  $content = contentSearch($streetWorkoutContent, 'id', 9); echo $content[0]['content'] ?></p>
                    <p><button class="button special" onclick="link('http://wswcf.org/member/', true);"><?php  $content = contentSearch($streetWorkoutContent, 'id', 10); echo $content[0]['content'] ?></button><br /><br /><br /><br /> </p>



<!--                    Official competition regulations-->

                    <h4><?php  $content = contentSearch($streetWorkoutContent, 'id', 11); echo $content[0]['content'] ?></h4>

                    <p id="contacts">



                    </p>

                </div>



            </div>

        </div>
    </div>


</div>

<script src="js/locations.js"></script>