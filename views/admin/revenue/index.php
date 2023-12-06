<?php
require_once('views/admin/header.php'); ?>


<main class="content px-3 py-2 w-100">

	<script>
		window.onload = function() {

			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Thống kê doanh thu",
					fontFamily: "tahoma",
				},
				axisY: {
					title: "Tổng tiền"
				},
				data: [{
					type: "line",
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();

		}
	</script>


	<div id="chartContainer" style="height: 370px;" class="mt-3"></div>
	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</main>
<?php
require_once('views/admin/footer.php'); ?>