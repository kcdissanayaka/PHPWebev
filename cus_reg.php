<?php 
include('cus_reg_header.php');
?>

<script type="text/javascript" src="js/contact.js"></script>

<div class="container">
	
	<br>
	<div id="contact"><button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#contact-modal">Show Contact Form</button></div>
	<div id="contact-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3>Contact Form</h3>
				</div>
				<form id="contactForm" name="contact" role="form">
					<div class="modal-body">				
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea name="message" class="form-control"></textarea>
						</div>					
					</div>
					<div class="modal-footer">					
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-success" id="submit">
					</div>
				</form>
			</div>
		</div>
	</div>			
	
</div>	
<?php include('footer.php');?> 

