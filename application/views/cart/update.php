

<?php 

  if ( isset( $product['limit']) ){
    ?>

     <select class="dropdown">
              
            <?php  
              for( $i=1; $i<=$product['limit']; $i++ ) {
             ?>
   
               <option value="<?= $i ?>"><?= $i ?></li>
            <?php 
              }
          ?>
        
      </select>

  <?php 
   
  }
  else {
    ?>
    <?=$product['quantity']?>
    <?php
  }
?>



