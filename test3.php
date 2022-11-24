<?php

    $mysqli = mysqli_connect('localhost', 'root', '', 'waluty');

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $data=mysqli_query($mysqli, "SELECT * FROM history GROUP BY date");
       
?>

<!DOCTYPE html>
<html>
 
    <head>
    <meta charset="utf-8">
    <title>ZingSoft Demo</title>
    
    <script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <style></style>
    </head>
 
    <body>
    <div id='myChart'></div>
        <script>

            ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
            var myData=[<?php
                while($info = mysqli_fetch_array($data)){
                    echo "['".$info['date']."', '".$info['EURbuy']."', '".$info['EURsell']."'],";
                    }
                ?>];

            var myConfig = {

            "type": "stock",
        
            "plot": {
                "aspect": "candlestick",
                "tooltip": {
                "visible": false
                },
                "preview": { //To style the preview chart.
                "type": "area", //"area" (default) or "line"
                "line-color": "#33ccff",
                "line-width": 2,
                "line-style": "dotted",
                "background-color": "#ff3300",
                "alpha": 1,
                "alpha-area": 0.1
                },
                "trend-up": {
                "background-color": "#33ccff",
                "border-color": "#33ccff",
                "line-color": "#33ccff"
                },
                "trend-down": {
                "background-color": "#ff3300",
                "border-color": "#ff3300",
                "line-color": "#ff3300"
                }
            },
            "preview": {
        
            },
            "scale-x": {
                "min-value": 1420232400000,
                "step": "day",
                "transform": {
                "type": "date",
                "all": "%M %d"
                },
                "item": {
                "font-size": 10
                },
                "max-items": 9,
                "zooming": true,
                "zoom-to-values": [1422910800000, 1430427600000]
            },
            "scale-y": {
                "values": "28:34:1",
                "format": "$%v",
                "item": {
                "font-size": 10
                },
                "guide": {
                "line-style": "dotted"
                }
            },
            "crosshair-x": {
                "plot-label": {
                "text": "Open: $%open<br>High: $%high<br>Low: $%low<br>Close: $%close",
                "decimals": 2,
                "multiple": true
                },
                "scale-label": {
                "text": "%v",
                "transform": {
                    "type": "date",
                    "all": "%M %d, %Y"
                }
                }
            },
            "crosshair-y": {
                "type": "multiple",
                "scale-label": {
                "visible": false
                }
            },
            "series": [{
                "values": myData
            }]
            };
        
            zingchart.render({
            id: 'myChart',
            data: myConfig,
            height: 400,
            width: "100%"
            });

            <?php
            /* Close the connection */
            $mysqli->close();
            ?>
        </script>
    </body>
</html>