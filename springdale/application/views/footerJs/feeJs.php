<!--[if lt IE 9]>
			<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
			<![endif]-->
			<!--[if gte IE 9]><!-->
			
			<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
			<!--<![endif]-->
			<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/blockUI/jquery.blockUI.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/moment/min/moment.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/bootbox/bootbox.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/jquery.appear/jquery.appear.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/velocity/jquery.velocity.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
			<!-- end: MAIN JAVASCRIPTS -->
			<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
			<script src="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/truncate/jquery.truncate.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/summernote/dist/summernote.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/subview.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/subview-examples.js"></script>
			<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
			<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
			<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/ui-modals.js"></script>
			
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/tableExport/tableExport.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jquery.base64.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/tableExport/html2canvas.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jquery.base64.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/libs/sprintf.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/jspdf.js"></script>
			<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/libs/base64.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/table-export.js"></script>
			<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
			<!-- start: CORE JAVASCRIPTS  -->
			<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
			jQuery(document).ready(function() {
				 $("#sonu").hide();
				$("#studid").keyup(function(){
					var teacherid = $("#studid").val();
					//alert(teacherid)checkID,validId;
					$.post("<?php echo site_url("index.php/feeControllers/getFsd") ?>",{teacherid : teacherid}, function(data){
						$("#getFsd").html(data);
						});
					});
				$("#classv").change(function(){
					var classv = $("#classv").val();
					//alert(teacherid);
					if(classv == 'all'){
						$('#sectionId').prop('disabled', 'disabled');
						var fsd = $("#fsd").val();
						var section = "all";
						var classv = "all";
						$.post("<?php echo site_url("index.php/feeControllers/feeReport") ?>",{fsd : fsd,section : section,classv : classv}, function(data){
							$("#rahul").html(data);
						});
					}else{
						$('#sectionId').prop('disabled', false);
						$.post("<?php echo site_url("index.php/teacherController/getSection") ?>",{classv : classv}, function(data){
							$("#sectionId").html(data);
						});
					}
				});
				$("#sectionId").change(function(){
					var fsd = $("#fsd").val();
					var section = $("#sectionId").val();
					var classv = $("#classv").val();
					$.post("<?php echo site_url("index.php/feeControllers/feeReport") ?>",{fsd : fsd,section : section,classv : classv}, function(data){
						$("#rahul").html(data);
					});
				});
				
				Main.init();
				SVExamples.init();
				FormElements.init();
			});
		</script>