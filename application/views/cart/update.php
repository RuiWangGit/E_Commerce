
            

          <table  class="table table-striped">
            <thead>
              <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody >
              
              <?php
              $product_id =null;
              $total = 0;
              foreach($selected_products as $product){
                $product_id = $product['id'];
                ?>
                <tr id ="row_<?=$product_id?>">
                  
                      <td><img style="width:50px; height:50px; "class='carts-img img-responsive' src='<?= $product["main_image"]?>' alt="no image"><?=$product['name']?></td>
                      <td><?=$product['price']?></td>
                      <td>
                          <?php if ( ( $id == $product_id )&& ($this->session->flashdata('error')!=null ) )  {   ?>
                                  <p style="display:block; color:red; font-size: 12px">
                                  <?php echo $this->session->flashdata('error'); ?>
                                  </p>
                                   <form id='saveForm' action="/carts/edit/<?=$product_id?>" method='post'>
                                      <textarea style='width:45px; height:26px;' name='quantity' value=''></textarea>
                                      <input type='hidden' name='submit' value='save'>
                                      <input style=' vertical-align:top; margin-left: 20px; ' type='submit' value='save'>
                                    </form>
                          <?php } else {?>
                                    <p style="display:inline-block;"><?= $product['quantity']?></p>
                                    <a data-toggle="modal" href="#delete-confirmation" class="pull-right">remove</a> 
                                    <a id="update-link" type="button"  href="/carts/edit/<?=$product_id?>" class="pull-right">update</a>
                                  

                           <?php } ?>
                        
                      </td>
                      <td>$<?= $product['price']*$product['quantity'] ?></td> 
                
                    <?php
                    $total += $product['price']*$product['quantity'];
                    ?>
                    </tr>
               <?php
               } ?>




            </tbody>
          </table>


          <p class="pull-right">
            <label style="display:block;">Total:   $<?=$total?></label>
            <a class="btn btn-large btn-info" href="/home" >Continue shopping</a>
          </p>







            