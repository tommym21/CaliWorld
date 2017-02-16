<!-- Banner -->
<div class="bannerWrap">
    <section id="banner">
        <div class="inner wrap">
            <p>
                <?php  $banner = contentSearch($layoutContent, 'ID', 4); echo $banner[0]['content'] ?>
            </p>
            <ul class="actions">
                <li><a href="#one" class="button big scrolly"> <?php  $learn = contentSearch($layoutContent, 'ID', 5); echo $learn[0]['content'] ?></a></li>
            </ul>
        </div>
    </section>
</div>
<!--Banner End-->


<a href="#one" name="one" id="one"></a>

<div class="container firstContainer">

    <?php
    echo 'Lang: ' . $lang .'<br />';
    echo 'Region: ' . $region
    ?>

    <p>
        Calisthenics and Calisthenics World promote strength, endurance, flexibility, and coordination and augment the body’s general well-being by placing controllable, regular demands upon the cardiovascular system. The exercises can function as physique builders or serve as warm-ups for more-strenuous sports or exertions.
    </p>

    <p>
        Related disciplies.....
    </p>

</div>

<section id="three" >
    <div class="container">
        <header class="major">
            <h2>Keep Up-to-Date<h2>
        </header>

        <div class="row">
            <div class="pod">
                <div class="box post">
                    <div class="image fit">
                        <div class="podHead">
                            <h3>Media</h3>
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
                            <h3>Trending</h3>
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
                            <h3>Calender</h3>
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
