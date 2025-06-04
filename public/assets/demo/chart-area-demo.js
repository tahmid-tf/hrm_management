// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Metropolis"),
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + "").replace(",", "").replace(" ", "");
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
        dec = typeof dec_point === "undefined" ? "." : dec_point,
        s = "",
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return "" + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || "").length < prec) {
        s[1] = s[1] || "";
        s[1] += new Array(prec - s[1].length + 1).join("0");
    }
    return s.join(dec);
}

// Area Chart Example

// --------------------------------------------- Payroll Breakdown ---------------------------------------------


fetch(payrollUrl)
    .then(response => response.json())
    .then(result => {
        const monthlyData = Array(12).fill(0);
        result.data.forEach(item => {
            const [year, month] = item.month.split("-");
            const monthIndex = parseInt(month, 10) - 1;
            monthlyData[monthIndex] = parseFloat(item.total_net_salary);
        });

        var ctx = document.getElementById("myAreaChart");
        var myBarChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
                ],
                datasets: [{
                    label: "Salaries",
                    backgroundColor: "#0061f2",
                    hoverBackgroundColor: "rgba(0, 97, 242, 0.8)",
                    borderColor: "rgba(0, 97, 242, 1)",
                    data: monthlyData
                }]
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            padding: 10,
                            callback: function (value) {
                                return "" + number_format(value)+"/-";
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: "#6e707e",
                    titleFontSize: 14,
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    mode: "index",
                    intersect: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function (tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || "";
                            return datasetLabel +" "+number_format(tooltipItem.yLabel)+"/-";
                        }
                    }
                }
            }
        });
    })
    .catch(error => console.error("Error fetching salary data:", error));

// Helper function
function number_format(number) {
    return number.toLocaleString()+"/-";
}
