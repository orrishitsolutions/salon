<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
   <p class="text-muted mb-1 mb-md-0">Copyright &copy; <?= date("Y", time()); ?> <a href="http://niswarthsewa.com/" target="_blank">Niswarth Sewa</a>.</p>
</footer>
</div>
</div>

<script src="<?=base_url()?>assets-orrish/vendors/core/core.js"></script>
<script src="<?=base_url()?>assets-orrish/vendors/chartjs/Chart.min.js"></script>
<script src="<?=base_url()?>assets-orrish/vendors/jquery.flot/jquery.flot.js"></script>
<script src="<?=base_url()?>assets-orrish/vendors/jquery.flot/jquery.flot.resize.js"></script>
<script src="<?=base_url()?>assets-orrish/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>assets-orrish/vendors/apexcharts/apexcharts.min.js"></script>
<script src="<?=base_url()?>assets-orrish/vendors/feather-icons/feather.min.js"></script>
<script src="<?=base_url()?>assets-orrish/js/admin-js/jquery-confirm.js"></script>
<script src="<?=base_url()?>assets-orrish/js/template.js"></script>
<script src="<?=base_url()?>assets-orrish/js/dashboard-dark.js"></script>
<script src="<?=base_url()?>assets-orrish/js/datepicker.js"></script>



 <script src="<?=base_url()?>assets-orrish/vendors/datatables.net/jquery.dataTables.js"></script>   
<script src="<?=base_url()?>assets-orrish/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>

  
<script src="<?=base_url()?>assets-orrish/js/data-table.js"></script>   
<!-- Plugin js for this page -->


<script src="<?=base_url()?>assets-orrish/vendors/ace-builds/src-min/ace.js"></script>
<script src="<?=base_url()?>assets-orrish/vendors/ace-builds/src-min/theme-chaos.js"></script>
<!-- End plugin js for this page -->	
<!-- Custom js for this page -->
<script src="<?=base_url()?>assets-orrish/js/tinymce.js"></script>
<script src="<?=base_url()?>assets-orrish/js/simplemde.js"></script>
<script src="<?=base_url()?>assets-orrish/js/ace.js"></script>
<script src="<?=base_url()?>assets-orrish/vendors/simplemde/simplemde.min.js"></script>
<!-- <script src="<?=base_url()?>assets-orrish/vendors/tinymce/tinymce.min.js" referrerpolicy="origin"></script> -->


<script src="https://cdn.tiny.cloud/1/a99g5fwjkqb1x84tybwqefbit62mnkoc9w97hvfwz1fxlary/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="<?=base_url()?>assets-orrish/ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>assets-orrish/js/admin-js/custome.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
	tinymce.init({
		selector: 'textarea#content',
		height: 300,
		menubar: false,
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table paste code help wordcount'
		],
		toolbar: 'undo redo | formatselect | ' +
			'bold italic backcolor | alignleft aligncenter ' +
			'alignright alignjustify | bullist numlist outdent indent | ' +
			'removeformat | help',
		content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px; color: #fff; }'
	});

	function convertToSlug(Text, destination) {
		$(destination).val(Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, ''));
	}

	$("#title").keyup(function(){
		convertToSlug($(this).val(), "#slug");
	});
</script>
<style>
	.error {
		color: red;
	}
	.success {
		color: green;
	}
</style>

</body>
</html>

