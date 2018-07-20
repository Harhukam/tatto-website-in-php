<!-- Logout Notification Box -->
<div id="logout">
<div class="logout-message">
<img style="height: 120px; width: 120px;" class="img-circle img-logout" src="img/<?php echo $row[adminPic]; ?>" alt="">
<h3>
<i class="fa fa-sign-out text-green"></i> Ready to go?
</h3>
<p>Select "Logout" below if you are ready<br> to end your current session.</p>
<ul class="list-inline">
<li>
<a href="logout.php" class="btn btn-green">
<strong>Logout</strong>
</a>
</li>
<li>
<button class="logout_close btn btn-green">Cancel</button>
</li>
</ul>
</div>
</div>
<!-- /#logout -->
<!-- Logout Notification jQuery -->



<script src="js/plugins/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
<script src="js/plugins/popupoverlay/defaults.js"></script>
<script src="js/plugins/popupoverlay/logout.js"></script>
<script src="js/plugins/hisrc/hisrc.js"></script>
<script src="js/flex.js"></script>
<script src="js/plugins/popupoverlay/logout.js"></script>
<script src="js/demo/wysiwyg-demo.js"></script>
<script src="js/plugins/bootstrap-tokenfield/bootstrap-tokenfield.min.js"></script>
<script src="js/plugins/bootstrap-tokenfield/scrollspy.js"></script>
<script src="js/plugins/bootstrap-tokenfield/affix.js"></script>
<script src="js/plugins/bootstrap-tokenfield/typeahead.min.js"></script>
<script src="js/plugins/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="js/demo/advanced-form-demo.js"></script>
<div id="fb-root"></div>

<script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function(e) {
$('#blah').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
$("#imgInp").change(function() {
readURL(this);
});


</script>

</div><!-- end MAIN PAGE CONTENT -->  <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!--  footer end -->
</body>
</html>