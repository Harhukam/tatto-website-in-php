<div id="tr-contact" class="tr-contact-section contact-1 section-padding" style="background-image: url('images/<?php echo $feature_cover3; ?>') !important;
   background-color: #fff; height: 100%;">
<div class="container text-center">
<div class="section-title">
<h1><?=$contact_heading;?></h1>
</div>
<address>
<p><?=$contact_companyname;?> <?=$contact_address;?> <br><?=$contact_mobile_heading;?> <?=$contact_mobile_numbers;?><br><?=$contact_email_heading;?> <a href="#"><?=$contact_email_text;?></a></p>
</address>

<form class="contact-form" name="contact-form" method="post" action="#">
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<input type="text" class="form-control" required="required" placeholder="Name" name="name">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<input type="email" class="form-control" required="required" placeholder="Email iD" name="email">
</div> 
</div>
<div class="col-sm-6">
<div class="form-group">
<input type="number" class="form-control" required="required" placeholder="Mobile Number" name="mobile">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<input type="text" class="form-control" required="required" placeholder="Subject" name="subject">
</div>
</div>
<div class="col-sm-12">
<div class="form-group">
<textarea name="message" name="message" id="message" required="required" class="form-control" rows="7" placeholder="Enter your text"></textarea>
</div>             
</div>     
</div>
<div class="form-group">

    
    <input type="submit" class="btn btn-primary btncustom" value=" Submit" name="send" >
<!--<button type="submit" class="btn btn-primary">Submit </button>-->
</div>
</form><!-- /.contact form -->				
</div><!-- /.container -->
</div><!-- /.contact us -->	
</div><!-- tr home -->