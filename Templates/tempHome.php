<!-- Banner -->
<div class="bannerWrap">
    <section  id="banner">
        <div class="inner wrap">
            <p>
                <?php  $content = contentSearch($homeContent, 'id', '5'); echo $content[0]['content'] ?>
            </p>
            <ul class="actions">
                <li><a href="#one" class="button big scrolly"> <?php  $learn = contentSearch($homeContent, 'id', '6'); echo $learn[0]['content'] ?></a></li>
            </ul>
        </div>
    </section>
</div>
<!--Banner End-->


<a href="#one" name="one" id="one"></a>





<section id="three" >
    <div class="container firstContainer">
        <header class="major">
            <h2><?php  $content = contentSearch($homeContent, 'id', '1'); echo $content[0]['content'] ?><h2>
        </header>

        <div class="row">
            <div class="pod">
                <div class="box post">
                    <div class="image fit">
                        <div class="podHead">
                            <h3><?php  $content = contentSearch($homeContent, 'id', '2'); echo $content[0]['content'] ?></h3>
                        </div>
                        <img src="Images/article_uk.jpg">
                    </div>

                    <div id="mediaWrap" style="height:280px;" class="scroll">

<!--                        <div class="box">-->
<!--                            <div class="mediaImage float">-->
<!--                                <img src="Images/article_uk.jpg">-->
<!--                            </div>-->
<!--                            <div class="mediaTitle float">-->
<!--                                <h4>Title</h4>-->
<!---->
<!--                            </div>-->
<!---->
<!--                            <div class="mediaContent">-->
<!--                                Phasellus malesuada sagittis viverra. Donec volutpat feugiat turpis ut accumsan. Sed magna orci, luctus vitae congue sit amet, tempus id arcu. Curabitur interdum odio ut mi malesuada luctus. Fusce eu velit id tortor sollicitudin lobortis. Mauris lobortis eu mauris et ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris auctor nisi eleifend erat rutrum, et hendrerit ipsum pulvinar.-->
<!--                            </div>-->
<!---->
<!---->
<!---->
<!--                            <div style="clear: both;"></div>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div class="box">-->
<!--                            <div class="mediaImage float">-->
<!--                                <img src="Images/article_uk.jpg">-->
<!--                            </div>-->
<!--                            <div class="mediaTitle float">-->
<!--                                <h4>Title</h4>-->
<!---->
<!--                            </div>-->
<!---->
<!--                            <div class="mediaContent">-->
<!--                                Phasellus malesuada sagittis viverra. Donec volutpat feugiat turpis ut accumsan. Sed magna orci, luctus vitae congue sit amet, tempus id arcu. Curabitur interdum odio ut mi malesuada luctus. Fusce eu velit id tortor sollicitudin lobortis. Mauris lobortis eu mauris et ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris auctor nisi eleifend erat rutrum, et hendrerit ipsum pulvinar.-->
<!--                            </div>-->
<!---->
<!---->
<!---->
<!--                            <div style="clear: both;"></div>-->
<!--                        </div>-->

                    </div>

                </div>
            </div>
            <div class="pod">
                <div class="box post">
                    <div class="image fit">
                        <div class="podHead">
                            <h3><?php  $content = contentSearch($homeContent, 'id', '3'); echo $content[0]['content'] ?></h3>
                        </div>
                        <img src="Images/article_uk.jpg">
                    </div>

                    <div style="height:280px;overflow: hidden;" >
                        <!--                    Include the twitter search for the current language-->
                        <?php
                        include("Media/tweet_" . $lang . ".php");
                        ?>
                    </div>



                </div>
            </div>
            <div class="pod">

                <div class="box post">
                    <div class="image fit">
                        <div class="podHead">
                            <h3><?php  $content = contentSearch($homeContent, 'id', '4'); echo $content[0]['content'] ?></h3>
                        </div>
                        <img src="Images/article_uk.jpg">
                    </div>


                    <div style="height: 280px" class="scroll" >

                        <ul id="calendarList" class="alt">
                            <li>
                                <div class="box">
                                    <div class="mediaImage float">
                                        <div class="box">

                                        </div>
                                    </div>
                                    <div class="mediaTitle float">
                                        <ul class="alt">
                                            <li><h4>Competition Title</h4></li>
                                            <li>Location: here<br />Date: dd/mm/yy</li>
                                        </ul>


                                    </div>




                                    <div style="clear: both;"></div>
                                </div>
                            </li>


                            <li>
                                <div class="box">
                                    <div class="mediaImage float">
                                        <div class="box">

                                        </div>
                                    </div>
                                    <div class="mediaTitle float">
                                        <ul class="alt">
                                            <li><h4>Meet Title</h4></li>
                                            <li>Location: here<br />Date: dd/mm/yy</li>
                                        </ul>


                                    </div>




                                    <div style="clear: both;"></div>
                                </div>
                            </li>

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

