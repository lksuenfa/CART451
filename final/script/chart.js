const data = {
    labels: [
        'Meat',
        'Dairy',
        'Cereals'
    ],
    datasets: [{
        label: 'My First Dataset',
        data: [300, 50, 100],
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
    }]
};

const config = {
    type: 'pie',
    data: data,
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);


// https://stackoverflow.com/questions/10831758/parsing-php-json-data-in-javascript
$.ajax({
    url: 'getDataforChart.php',
    data: Array,
    dataType: "json",
    success: function (json) {
        console.log(json);

        let array = [];
        for (let i = 0; i < json.length; i++) {

            console.log(json[i].origin + ',' + json[i]["count(*)"]);

        }


        // document.getElementById("demo").innerHTML = json[0].authorLocation;

        // for (let i = 0; i < json.length; i++) {
        //     let country = json[i].origin;
        //     console.log(country);
        // }
    }
});

// https://developers.google.com/chart/interactive/docs/gallery/geochart
// connect to Db
// https://developers.google.com/chart/interactive/docs/php_example
google.charts.load('current', {
    'packages': ['geochart'],
});
// google.charts.setOnLoadCallback(drawRegionsMap);

// function drawRegionsMap() {
//     var data = google.visualization.arrayToDataTable([
//         ['Country', 'Popularity'],
//         ['Germany', 200],
//         ['United States', 300],
//         ['Brazil', 400],
//         ['Canada', 500],
//         ['France', 600],
//         ['RU', 700]
//     ]);

//     var options = {};

//     var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

//     chart.draw(data, options);
// }


// Load the Visualization API and the piechart package.
// google.charts.load('current', { 'packages': ['corechart'] });

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var jsonData = $.ajax({
        url: 'getDataforChart.php',
        dataType: "json",
        async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.
    var data = new google.visualization.DataTable(jsonData);

    // Instantiate and draw our chart, passing in some options.
    // var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    // chart.draw(data, { width: 400, height: 240 });


    var options = {};
    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
    chart.draw(data, options);
}

// https://stackoverflow.com/questions/16896219/how-can-i-convert-json-string-to-google-visualization-datatable