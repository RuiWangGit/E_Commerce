
    <?php
              $product_id =null;
              $total = 0;
              foreach($selected_products as $product){
                $product_id = $product['id'];
                ?>
                <tr>
                  
                      <td><?=$product['name']?></td>
                      <td><?=$product['price']?></td>
                      <td>
                        
                        <p id="update-qty" style="display:inline-block">
                          <?= $product['quantity']?>
                        </p>

                        <p style="display:inline-block" class="pull-right">
                          <a data-toggle="modal" href="#delete-confirmation" class="pull-right">remove</a> 
                          <a id="update-link" data-toggle="modal" href="/carts/update/<?=$product_id?>" class="pull-right">update</a>                     
                        </p>


                      </td>
                      <td>$<?= $product['price']*$product['quantity'] ?></td> 
                </tr>
                  <?php
                  $total += $product['price']*$product['quantity'];
              }
    ?>




