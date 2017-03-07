


<div class="container firstContainer">
    <div class="row 150%">
        <div class="4u 12u$(2)">

            <!-- Sidebar -->
            <section id="sidebar">
                <section>
                    <h4><?php  $content = contentSearch($historyRegContent, 'id', '3'); echo $content[0]['content'] ?></h4>
                    <p><?php  $content = contentSearch($historyRegContent, 'id', '1'); echo $content[0]['content'] ?></p>
                </section>
                <hr>
                <section>
                    <a class="image"><img src="Images/<?php  $content = contentSearch($historyRegContent, 'id', '2'); echo $content[0]['content'] ?>" alt=""></a>

                </section>
            </section>

        </div>
        <div class="8u 12u$(2) important(2)">

            <!-- Content -->
            <section id="content">
                <a href="#" class="image"><img src="Images/<?php  $content = contentSearch($historyContent, 'id', '3'); echo $content[0]['content'] ?>" alt=""></a>
                <h4><?php  $content = contentSearch($historyContent, 'id', '1'); echo $content[0]['content'] ?></h4>
                <p><?php  $content = contentSearch($historyContent, 'id', '2'); echo $content[0]['content'] ?></p>
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