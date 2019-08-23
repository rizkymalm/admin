<?php 
    include'apps/config/db.php';
    $pid = $_GET['pid'];
    $query = $mysqli->query("SELECT MONTH(checkout_date_detail) AS mon, SUM(qty_detail) AS total FROM wp_detailcheckout WHERE kdproduct='$pid' GROUP BY mon ORDER BY checkout_date_detail ASC");

?>

    <script type="text/javascript" src="<?php echo $base_url; ?>assets/plugin/fusionchart/fusioncharts.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/plugin/fusionchart/fusioncharts.charts.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/plugin/fusionchart/fusioncharts.theme.fint.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/plugin/fusionchart/fusioncharts-jquery-plugin.js"></script>    
    <script type="text/javascript">
    FusionCharts.ready(function() {
        var btnline = document.getElementById("chartline");
        var btn2d = document.getElementById("chartd");
        $(btnline).click(function(){
            $("#chart-container").updateFusionCharts({
                "type": "line"
            });
        })
        $(btn2d).click(function(){
            $("#chart-container").updateFusionCharts({
                "type": "column2d"
            });
        })        
    var cosmetics = {
        "caption": "Penjualan Barang Pertahun",
        "subCaption": "OUR11",
        "xAxisName": "Month",
        "yAxisName": "Pieces per month",
        // "numberPrefix": "$. ",
        "paletteColors": "#0075c2",
        "bgColor": "#ffffff",
        "borderAlpha": "20",
        "canvasBorderAlpha": "0",
        "usePlotGradientColor": "0",
        "plotBorderAlpha": "10",
        "placevaluesInside": "1",
        "rotatevalues": "1",
        "valueFontColor": "#ffffff",
        "showXAxisLine": "1",
        "xAxisLineColor": "#999999",
        "divlineColor": "#999999",
        "divLineIsDashed": "1",
        "showAlternateHGridColor": "0",
        "subcaptionFontBold": "0",
        "subcaptionFontSize": "14"
    };
    var dataArray = [
    <?php 
        while ($sql=$query->fetch_assoc()) {
            $monthnum = $sql['mon'];
            $convertmonth = DateTime::createFromFormat('!m', $monthnum);
            $monthname = $convertmonth->format('F');

    ?>
    {
        "label": "<?php echo $monthname ?>",
        "value": "<?php echo $sql['total']; ?>"
    },
    <?php } ?>
    ];
    // Using FusionChart"s jQuery method insertFusionCharts() to create FusionCharts.
    
        var widthchart = $('.linechart-fusion').width();    
        $("#chart-container").insertFusionCharts({
            type: "line",
            width: widthchart,
            height: "350",
            dataFormat: "json",
            dataSource: {
                chart: cosmetics,
                data: dataArray
            }
        })
    });
    
    </script>

    <!--  -->



