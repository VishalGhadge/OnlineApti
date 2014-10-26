<div class="inner-menu nav-collapse ">   
    <div class="inner-wrapper">	  
    </div>
    <div class="inner-menu-content">
    </div>
    <ul class="big-items">
        <li <?php
        if ($Sub_Menu_Select == 1) {
            echo 'class = "active"';
        }
        ?>><a href="my-analysis-campaing.php?Campaign_Id=<?php echo $_GET['Campaign_Id']; ?>"> My Analysis</a></li>
        <li <?php
        if ($Sub_Menu_Select == 2) {
            echo 'class = "active"';
        }
        ?>><a href="campaign_problem_analysis.php?Campaign_Id=<?php echo $_GET['Campaign_Id']; ?>"> Problem's In Area</a></li>
        <li <?php
        if ($Sub_Menu_Select == 3) {
            echo 'class = "active"';
        }
        ?>><a href="Popularity-in-area.php?Campaign_Id=<?php echo $_GET['Campaign_Id']; ?>">Popularity In Area</a></li>
        <li <?php
        if ($Sub_Menu_Select == 4) {
            echo 'class = "active"';
        }
        ?>><a href="devices-in-area.php?Campaign_Id=<?php echo $_GET['Campaign_Id']; ?>">Device Work In Area</a></li>
    </ul> 
</div>  