<?php require_once 'common.php'; ?>
<html>

<head>
    <title>GOOGle Charts Examples</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

    // Load Charts and the corechart package.
    google.charts.load('current', {'packages': ['corechart', 'bar']});

    google.charts.setOnLoadCallback(drawServiceQualityVoteChart);
    google.charts.setOnLoadCallback(drawTeamSatisfyVoteChart);
    google.charts.setOnLoadCallback(drawAccurateDateVoteChart);
    google.charts.setOnLoadCallback(drawOrderAgainVoteChart);
    google.charts.setOnLoadCallback(drawTotalOrdersFromSocialChart);
    google.charts.setOnLoadCallback(drawTotalordersQuestions);

    google.charts.setOnLoadCallback(drawTotalSales);

    // Draw the Column chart for total Sales per Cities
    function drawTotalSales() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'City');
        data.addColumn('number', 'SALES');
        data.addColumn({type: 'string', role: 'style'});
        data.addRows(<?= TotalSales() ?>);

        var options = {
            legend: {position: 'top', maxLines: 1, alignment: 'center'},
            chartArea: {left: 0, top: 5, width: "90%", height: "80%"},
            // This line makes the entire category's tooltip active.
            focusTarget: 'category',
        };

        // Create and draw the visualization.
        new google.visualization.ColumnChart(document.getElementById('TotalSales')).draw(data, options);
    }

    // Draw the Column chart for total orders and Questions per Cities
    function drawTotalordersQuestions() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'City');
        // Use custom HTML content for the domain tooltip.
        // data.addColumn({'type': 'string', 'role': 'tooltip', 'p': {'html': true}});
        data.addColumn('number', 'Questions');
        data.addColumn('number', 'Asks');

        data.addRows(<?= TotalOrdersQuestions() ?>);

        var options = {
            legend: {position: 'top', maxLines: 1, alignment: 'center'},
            chartArea: {left: 50, top: 5, width: "100%", height: "80%"},
            colors: ['#3E94CD', '#8D5EA2'],
            // This line makes the entire category's tooltip active.
            focusTarget: 'category',
            // Use an HTML tooltip.
            //    tooltip: {isHtml: true}
        };

        // Create and draw the visualization.
        new google.visualization.ColumnChart(document.getElementById('TotalordersQuestions')).draw(data, options);
    }

    // Draw Donut Charts For Votes.
    function drawServiceQualityVoteChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Answer');
        data.addColumn('number', 'Total');
        data.addRows(<?= ServiceQualityVote() ?>);

        // Set options for Sarah's pie chart.
        var options = {
            pieHole: 0.4,
            legend: {position: 'top', maxLines: 4, alignment: 'center'},
            chartArea: {left: 0, top: 20, width: "100%", height: "100%"},
            slices: {
                0: {color: '#78B301'},
                1: {color: '#FFCC00'},
                2: {color: '#CD3301'},
            }
        };

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('ServiceQualityVote'));
        chart.draw(data, options);

    }

    function drawTeamSatisfyVoteChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Answer');
        data.addColumn('number', 'Total');
        data.addRows(<?= TeamSatisfyVote() ?>);

        // Set options for Sarah's pie chart.
        var options = {
            pieHole: 0.4,
            legend: {position: 'top', maxLines: 4, alignment: 'center'},
            chartArea: {left: 0, top: 20, width: "100%", height: "100%"},
            slices: {
                0: {color: '#8D5EA2'},
                1: {color: '#E8C3BA'},
            }
        };

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('TeamSatisfyVote'));
        chart.draw(data, options);

    }

    function drawAccurateDateVoteChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Answer');
        data.addColumn('number', 'Total');
        data.addRows(<?= AccurateDateVote() ?>);

        // Set options for Sarah's pie chart.
        var options = {
            legend: {position: 'top', maxLines: 4, alignment: 'center'},
            chartArea: {left: 0, top: 20, width: "100%", height: "100%"},
            pieHole: 0.4,
            slices: {
                0: {color: '#339967'},
                1: {color: '#CD3301'},
            }
        };

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('AccurateDateVote'));
        chart.draw(data, options);

    }

    function drawOrderAgainVoteChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Answer');
        data.addColumn('number', 'Total');
        data.addRows(<?= OrderAgainVote() ?>);

        // Set options for Sarah's pie chart.
        var options = {
            pieHole: 0.4,
            legend: {position: 'top', maxLines: 4, alignment: 'center'},
            chartArea: {left: 0, top: 20, width: "100%", height: "100%"},
            slices: {
                0: {color: '#0066CB'},
                1: {color: '#CD3301'},
            }
        };

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('OrderAgainVote'));
        chart.draw(data, options);

    }

    // Draw the pie chart for total orders from social media
    function drawTotalOrdersFromSocialChart() {
        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Social');
        data.addColumn('number', 'Orders');
        data.addRows(<?= TotalOrdersFromSocial() ?>);
        // Set options for Sarah's pie chart.
        var options = {
            slices: {
                0: {color: '#C45750'},
                1: {color: '#E8C3BA'},
                2: {color: '#3BBA9F'},
                3: {color: '#8D5EA2'},
                4: {color: '#3E94CD'},
            },
            legend: {position: 'top', maxLines: 4, alignment: 'center'},
            chartArea: {left: 0, top: 20, width: "100%", height: "100%"},
        };

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('TotalOrdersFromSocial'));
        chart.draw(data, options);

    }


    $(window).resize(function () {
        drawServiceQualityVoteChart();
        drawTeamSatisfyVoteChart();
        drawAccurateDateVoteChart();
        drawOrderAgainVoteChart();
        drawTotalOrdersFromSocialChart();
        drawTotalordersQuestions();
    });
</script>

<div class="container">
    <div class="row">
        <div class="jumbotron">
            <h1>Sales Per City</h1>
        </div>

        <div class="row">
            <div class="col-sm-12 col-6">
                <div id="TotalSales"></div>
            </div>

        </div>
    </div>

    <hr>
    <div class="row">
        <div class="jumbotron">
            <h1>Questions and ASKS per City</h1>
        </div>

        <div class="row">
            <div class="col-sm-12 col-6">
                <div id="TotalordersQuestions"></div>
            </div>

        </div>
    </div>

    <div class="row">
        <!--Begin::Portlet-->
        <div class="jumbotron">
            <h1> Donuts VOTES</h1>
        </div>
        <div class="row">
            <div class="col-sm-3 col-6">
                <h3 class="center-block">Service Quality Vote</h3>
                <div id="ServiceQualityVote"></div>
            </div>
            <div class="col-sm-3 col-6">
                <h3 class="center">TeamSatisfyVote</h3>
                <div id="TeamSatisfyVote"></div>

            </div>
            <div class="col-sm-3 col-6">
                <h3 class="center-block">Accurate Date Vote</h3>
                <div id="AccurateDateVote"></div>

            </div>
            <div class="col-sm-3 col-6">
                <h3 class="center-block">Order Again Vote</h3>
                <div id="OrderAgainVote"></div>
            </div>
        </div>
    </div>
    <hr>
    <!--End::Donuts-->
    <div class="row">
        <!--Begin::Portlet-->


        <div class="row">
            <div class="jumbotron">
                <h1> Pie Social Media Visitors</h1>
            </div>
            <div class="col-12">
                <div id="TotalOrdersFromSocial"></div>
            </div>
        </div>
        <div class="footer row">

        </div>
    </div>

    <!--End::Pie-->
</div>

</body>
</html>