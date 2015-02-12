
            

          <table  class="table table-striped">
            <thead>
              <tr>
                <th>Item</th>
                <th>Price</th>
                <th style="width:150px">Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              
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
                                   
                                    <p id="qty" style="display:inline-block;"><?= $product['quantity']?></p>
                                   
                                      <a id='qty_remove' data-toggle="modal" href="#delete-confirmation-<?=$product_id?>" class="pull-right">remove</a> 
                                      <a id="update-link" type="button"  href="/carts/edit/<?=$product_id?>"  class="pull-right">update</a>
                                    

                           <?php } ?>
                        
                      </td>
                      <td>$<?= $product['price']*$product['quantity'] ?></td> 
                
                    <?php
                    $total += $product['price']*$product['quantity'];
                    ?>


                           <div class="modal fade" id="delete-confirmation-<?=$product_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                                    <h4 class="modal-title">Do you really want to remove the product?</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form action="/carts/remove" method="post">
                                      <input type="hidden" name="id" value='<?=$product_id?>'>
                                        <button type="submit" class="btn btn-default" >Yes</button>
                                        <button type="submit" class="btn btn-primary" data-dismiss="modal">No</button>
                                      </form>
                                   
                                  </div>
                                </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                            </div>



                    </tr>
               <?php
               } ?>




            </tbody>
          </table>


          <p class="pull-right">
            <label style="display:block;">Total:   $<?=$total?></label>
            
            
          </p>


    




            