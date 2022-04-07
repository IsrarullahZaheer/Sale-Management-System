<footer class="footer pt-0">

				</footer>
			</div>
		</div>
		<!-- Argon Scripts -->
		<!-- Core -->
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

		<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
		<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/vendor/js-cookie/js.cookie.js"></script>
		<script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
		<script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
		<!-- Optional JS -->
		<script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
		<script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
		<!-- datatables.net -->
		<script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
		<script src="assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
		<script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
		<script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
		<script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
		<script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

		<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
		<!-- Argon JS -->
		<script src="assets/js/dashboard.js?v=1.2.0"></script>

		<!-- My script File -->

		<script src="assets/js/myscript.js"></script>

		<script src="assets/js/shortcut.js"></script>
		<script src="assets/js/myshortcut.js"></script>




<!-- datepicker persion
<script src="assets/date/persian-date.min.js"></script>
<script src="assets/date/persian-datepicker.min.js"></script> -->


		<!-- End of My script File -->
		<script>
			$(document).ready(function () {
			var table = $('#search').DataTable({


	"lengthMenu": [[10, 50, 100,-1], [10, 50, 100,'All']],

    "order": [ 0, 'desc' ],

	dom:'Bfrtip',
	buttons:['print','pageLength']

} );
		table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );


			$('#custom-search').on('keyup', function () {
				table.search(this.value).draw();


			});
		});
</script>
		 <!-- <script>
			// Print button
			$(document).ready(function () {
				$('#samsung').DataTable({
					dom: 'Bfrtip',
					buttons: ['print', 'copy'],
				});
			});
		</script> -->
		<script>
			// custom search box
			// var table = $('#search').DataTable();
			// $('#custom-search').on('keyup', function () {
			// 	table.search(this.value).draw();
			// });

			// var table = $('#search').DataTable();
			// $('#custom-search').on('keyup', function () {
			// 	table.column(2).search(this.value).draw();
			// });
		</script>
<!-- <script>
$(document).ready(function () {
				$('#search').DataTable({
					"lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
				});
			});
</script> -->



<script>
if(window.history.replaceState){
	window.history.replaceState(null,null,window.location.href);
}
</script>

	</body>
</html>
