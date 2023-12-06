<?php
require_once('views/admin/header.php'); ?>


<?php
 

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Thống kê doanh thu"
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


<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>         

<!-- <?php
require_once('views/admin/footer.php'); ?> -->
