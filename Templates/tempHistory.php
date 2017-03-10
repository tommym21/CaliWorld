


<div class="container firstContainer">
    <div class="row 150%">
        <div class="4u 12u$(2)">

            <!-- Sidebar -->
            <section id="sidebar">
                <section>
                    <a style="width: 100%;" class="image"><img style="width: 100%;" src="Images/<?php  $content = contentSearch($historyRegContent, 'id', '2'); echo $content[0]['content'] ?>" alt=""></a>

                </section>
                <hr>
                <section>
                    <h4><?php  $content = contentSearch($historyRegContent, 'id', '3'); echo $content[0]['content'] ?></h4>
                    <p><?php  $content = contentSearch($historyRegContent, 'id', '1'); echo $content[0]['content'] ?></p>
                </section>


            </section>

        </div>
        <div class="8u 12u$(2) important(2)">

            <!-- Content -->
            <section id="content">
                <section>
                    <h4><?php  $content = contentSearch($historyContent, 'id', '1'); echo $content[0]['content'] ?></h4>
                    <p style="margin-bottom: 20px;"><?php  $content = contentSearch($historyContent, 'id', '2'); echo $content[0]['content'] ?></p>
                </section>
                <hr>
                <section>
                    <img style="width: 100%;    max-height: 350px;"  src="Images/<?php  $content = contentSearch($historyContent, 'id', '3'); echo $content[0]['content'] ?>" alt="">
                </section>
                </section>

        </div>
    </div>
</div>

<div class="container">

    <?php
    echo 'Lang: ' . $lang .'<br />';
    echo 'Region: ' . $region
    ?>

</div>