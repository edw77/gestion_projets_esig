<?php
  if(isset($_SESSION['message'] )  ) {
    if($_SESSION['state'] == "Success" ){
        echo '<div class="alert alert-success" role="alert">';
    }
    else{
        echo '<div role="alert" class="alert alert-danger">';
    }
    echo $_SESSION['message'];

    echo '</div>';
    if(isset($_SESSION['state2'])){
      if($_SESSION['state2'] == 1){
        unset($_SESSION['message']);
      }
      else if($_SESSION['state2'] == 0){
        $_SESSION['state2'] = 1;
      }
    }
    else{
      $_SESSION['state2'] = 0;
    }

  }
?>
