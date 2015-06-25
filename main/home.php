<?php
     $p_application_id = $_GET["p_application_id"];

     $redirect_page="blank.html";
     switch ($p_application_id)
      {
        case 2:
          $redirect_page="../msu_proses/msu_home.php";
          break;
        case 3:
          $redirect_page="../ic_proses/ic_home.php";
          break;
        case 4:
          $redirect_page="../og_proses/og_home.php";
          break;
        case 5:
          $redirect_page="../in_proses/in_home.php";
          break;
        case 6:
          $redirect_page="../007_proses/itkp_home.php";
          break;
      }    

    header("Location: " . $redirect_page);

?>
