<?php $this->load->view("header") ?>


	<div id="main-section" class="container">
		<div class="row">

			<div class="col-md-2">
					
			</div>
			
			<div class="col-md-10" style="margin-bottom:50px"> 
				<h3>Items in cart </h3>
				<div id="table-input">			
					<?php require('update.php'); ?>
				</div>
			
				<div class="text-right">
					<a href="/payments" >
						<button class="btn btn-success">Proceed to Pay</button>
					</a>
					<a href="/home">
						<button class="btn btn-success">Continue shopping</button>
					</a>
				</div>


			</div>



		</div>	

				
	</div>
 


<?php $this->load->view("footer") ?>



