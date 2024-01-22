// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

const namhientailoinhuan = new Date();
const currentYearloinhuan = namhientailoinhuan.getFullYear();
console.log(currentYearloinhuan);


function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

// Area Chart Example
// Lấy dữ liệu
// Năm hiện tại
var loinhuanquy1_hientai_int = parseInt(loinhuanquy1_hientai.replace(/\./g, ""), 10);
var loinhuanquy2_hientai_int = parseInt(loinhuanquy2_hientai.replace(/\./g, ""), 10);
var loinhuanquy3_hientai_int = parseInt(loinhuanquy3_hientai.replace(/\./g, ""), 10);
var loinhuanquy4_hientai_int = parseInt(loinhuanquy4_hientai.replace(/\./g, ""), 10);

//Năm hiện tại - 1
var loinhuanquy1_hientai1_int = parseInt(loinhuanquy1_hientai1.replace(/\./g, ""), 10);
var loinhuanquy2_hientai1_int = parseInt(loinhuanquy2_hientai1.replace(/\./g, ""), 10);
var loinhuanquy3_hientai1_int = parseInt(loinhuanquy3_hientai1.replace(/\./g, ""), 10);
var loinhuanquy4_hientai1_int = parseInt(loinhuanquy4_hientai1.replace(/\./g, ""), 10);

//Năm hiện tại - 2
var loinhuanquy1_hientai2_int = parseInt(loinhuanquy1_hientai2.replace(/\./g, ""), 10);
var loinhuanquy2_hientai2_int = parseInt(loinhuanquy2_hientai2.replace(/\./g, ""), 10);
var loinhuanquy3_hientai2_int = parseInt(loinhuanquy3_hientai2.replace(/\./g, ""), 10);
var loinhuanquy4_hientai2_int = parseInt(loinhuanquy4_hientai2.replace(/\./g, ""), 10);

var ctx = document.getElementById("myAreaChart2");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Quý 1", "Quý 2", "Quý 3", "Quý 4"],
        datasets: [
            {
                label: "Năm " + currentYearloinhuan,
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [loinhuanquy1_hientai_int, loinhuanquy2_hientai_int, loinhuanquy3_hientai_int, loinhuanquy4_hientai_int],
            },
            {
                label: "Năm " + (currentYearloinhuan-1),
                lineTension: 0.3,
                backgroundColor: "rgba(255, 0, 0, 0)",
                borderColor: "rgba(255, 0, 0, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(255, 0, 0, 1)",
                pointBorderColor: "rgba(255, 0, 0, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(255, 0, 0, 1)",
                pointHoverBorderColor: "rgba(255, 0, 0, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [loinhuanquy1_hientai1_int, loinhuanquy2_hientai1_int, loinhuanquy3_hientai1_int, loinhuanquy4_hientai1_int],
            },
            {
                label: "Năm " + (currentYearloinhuan-2),
                lineTension: 0.3,
                backgroundColor: "rgba(0, 255, 0, 0)",
                borderColor: "rgba(0, 255, 0, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(0, 255, 0, 1)",
                pointBorderColor: "rgba(0, 255, 0, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(0, 255, 0, 1)",
                pointHoverBorderColor: "rgba(0, 255, 0, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [loinhuanquy1_hientai2_int, loinhuanquy2_hientai2_int, loinhuanquy3_hientai2_int, loinhuanquy4_hientai2_int],
            },
        ],
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
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function (value, index, values) {
                        return number_format(value);
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
        },
        legend: {
            display: true,
            
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 20,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function (tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});
