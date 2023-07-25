
# Exchange Rate Chart

![screenshot](https://github.com/dvts98/display_graph_fromApi/issues/1#issue-1820288740))

## Table of Contents
- [Overview](#overview)
- [Demo](#demo)
- [Features](#features)
- [Acknowledgments](#acknowledgments)

## Overview

The Exchange Rate Chart  allows users to visualize exchange rate data for a specific currency (INR in this case). It displays the historical exchange rates for a given date range in a user-friendly line chart or bar chart format.Also save relevent data to Database

This project uses Chart.js to create the interactive charts, and it fetches exchange rate data from the Exchangerate API.Also Need Datbase connection for store data

## Demo

![screenshot][(https://github.com/dvts98/display_graph_fromApi/issues/1#issue-1820288740))]


## Features

- Choose between a line chart and a bar chart to visualize exchange rate data.
- Fetch historical exchange rate data for a specified date range from the Exchangerate API.
- The line chart displays the exchange rate trend over time, while the bar chart shows individual exchange rates for each date.
- Store relevent data to database

### Usage

1. Open the `index.html` file in your web browser.
2. The default chart displayed is a line chart showing the exchange rates for INR for the date range from 2020-01-01 to 2020-01-10.
3. Click on the "Line Chart" or "Bar Chart" button to switch between the two chart types.
4. You can modify the API query parameters in the JavaScript code to fetch data for different currencies or date ranges.
5. display_save_data.php file also shows the bar graph of the exchange rates for INR for the date range from 2020-01-01 to 2020-01-10 and save data to mysql database

## Acknowledgments

- [Chart.js](https://www.chartjs.org/) for providing an excellent library for creating interactive charts.
- [Exchangerate API](https://exchangerate.host/) for the exchange rate data.
- Mysql database Connection
