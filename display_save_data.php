<!DOCTYPE html>
<html>
<head>
    <title>Exchange Rate Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="exchangeRateChart" width="400" height="200"></canvas>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Fetch data from the API  using Fetch API
            fetch('https://api.exchangerate.host/timeseries?start_date=2020-01-01&end_date=2020-01-10&symbols=INR')
                .then(response => response.json())
                .then(data => {
                    // Extract the dates and rates from response data
                    var responseData = data;
                    var dates = Object.keys(responseData.rates);
                    var rates = Object.values(responseData.rates).map(function (rate) {
                        return rate.INR;
                    });

                    //  bar chart using Chart.js
                    var ctx = document.getElementById('exchangeRateChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: dates,
                            datasets: [{
                                label: 'Exchange Rate (INR)',
                                data: rates,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                                barPercentage: 0.6,
                                categoryPercentage: 0.6
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    ticks: {
                                        maxRotation: 0,
                                        minRotation: 0,
                                        autoSkip: true,
                                        maxTicksLimit: 10
                                    }
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    </script>
</body>
</html>
<?php
//DATA SAVING TO mysql-DATABASE///////
$apiUrl = 'https://api.exchangerate.host/timeseries?start_date=2020-01-01&end_date=2020-01-10&symbols=INR';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo "Error: " . curl_error($ch);
} else {
    $data = json_decode($response, true);

    // Close the cURL session
    curl_close($ch);
    // Save the entire JSON data to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "repo";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the JSON data for insertion
    $jsonData = $conn->real_escape_string(json_encode($data));

    // Insert the JSON data into the database
    $sql = "INSERT INTO exchange_rates_json_data (data) VALUES ('$jsonData')";

    if ($conn->query($sql) === true) {
        echo " Data inserted successfully<br>";
    } else {
        echo "Error inserting JSON data: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>