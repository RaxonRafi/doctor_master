			<!--Copy Rights-->
			<div class="container">
				<div class="d-sm-flex justify-content-center">
					<span class="text-muted text-center d-block d-sm-inline-block">Copyright © <?php echo date('Y') ?> <a href="https://oxyjon.com/" target="_blank">oxyjon</a>. All rights reserved.</span>
				</div>
			</div>
			<!-- /Copy Rights-->
			</div>
			<!-- /Page Content -->
			</div>
			<!-- Back to Top -->
			<a id="back-to-top" href="#" class="back-to-top">
				<span class="ti-angle-up"></span>
			</a>
			<!-- /Back to Top -->
			<!-- Jquery Library-->
			<script src="js/jquery-3.2.1.min.js"></script>
			<!-- Popper Library-->
			<script src="js/popper.min.js"></script>
			<!-- Bootstrap Library-->
			<script src="js/bootstrap.min.js"></script>
			<!-- morris charts -->
			<script src="charts/js/raphael-min.js"></script>
			<script src="charts/js/morris.min.js"></script>
			<script src="js/custom-morris.js"></script>

			<!-- Custom Script-->
			<script src="js/custom.js"></script>
			<!-- select2 -->
			<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
			<!-- ajax cdn -->
			<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

			<script>
				$(document).ready(function() {
					$('#condition_dropdown').select2();
					$('#procedure_dropdown').select2();
					$('#medicine_dropdown').select2();
					$('#investigation_dropdown').select2();
					$('#referral_dropdown').select2();
					$('#diagnosis_dropdown').select2();
					$('#time_dropdown').select2();

				});
			</script>

			<!--city search script -->
			<script>
				$(document).ready(function() {
					$('#searchcity').keyup(function() {
						const input = $(this).val();
						//alert(input);
						if (input != "") {
							$.ajax({
								url: "searchcity.php",
								method: "POST",
								data: {
									input: input
								},
								success: function(data) {
									$('#result').html(data);
									$('#result').css("display", "block");


								}
							});
						} else {
							$('#result').css("display", "none");
						}
					});

					$(document).on('click', 'a', function() {

						$('#searchcity').val($(this).text());
						$('#result').html('');
					})
				});
			</script>

			<!--city search script -->

			<!--Medicine search script -->
			<script>
				$(document).ready(function() {
					$('#searchmedicine').keyup(function() {
						const input = $(this).val();
						//alert(input);
						if (input != "") {
							$.ajax({
								url: "searchmedicine.php",
								method: "POST",
								data: {
									input: input
								},
								success: function(data) {
									$('#result2').html(data);
									$('#result2').css("display", "block");


								}
							});
						} else {
							$('#result2').css("display", "none");
						}
					});

					$(document).on('click', 'a', function() {

						$('#searchmedicine').val($(this).text());
						$('#result2').html('');
					})
				});
			</script>

			<!--Medicine search script -->

			</body>

			</html>