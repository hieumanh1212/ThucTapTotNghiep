// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

//Lấy dữ liệu cho biểu đồ
var totalsByMonthElement = document.getElementById("totalsByMonth");
var totals = JSON.parse(totalsByMonthElement.getAttribute("data-totals"));

var totalsByMonthElement0 = document.getElementById("totalsByMonth0");
var totals0 = JSON.parse(totalsByMonthElement0.getAttribute("data-totals"));

var totalsByMonthElement1 = document.getElementById("totalsByMonth1");
var totals1 = JSON.parse(totalsByMonthElement1.getAttribute("data-totals"));

var totalsByMonthElement2 = document.getElementById("totalsByMonth2");
var totals2 = JSON.parse(totalsByMonthElement2.getAttribute("data-totals"));

var namhientai = document.getElementById("namhientai");
var namhientai1 = document.getElementById("namhientai1");
var namhientai2 = document.getElementById("namhientai2");
var namdangchon = document.getElementById("namdangchon");

// Lấy năm hiện tại
var now = new Date();
var currentYear = now.getFullYear();
var previousYear1 = currentYear - 1;
var previousYear2 = currentYear - 2;

createChart(totals);

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

function createChart(totalx) {
  // Area Chart Example

  var ctx = document.getElementById("myAreaChart").getContext('2d');


  myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
      datasets: [{
        label: "Doanh thu",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: [totalx[1], totalx[2], totalx[3], totalx[4], totalx[5], totalx[6], totalx[7], totalx[8], totalx[9], totalx[10], totalx[11], totalx[12]],
        // data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
      }],
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
        display: false
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
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
            return datasetLabel + ':' + number_format(tooltipItem.yLabel);
          }
        }
      }
    }
  });
}

function deleteChart() {
  if (myLineChart) {
    myLineChart.destroy();
  }
}



namhientai.addEventListener("click", function (event) {
  // Ngăn chặn hành vi mặc định của liên kết (nếu bạn không muốn chuyển trang)
  event.preventDefault();

  // Gọi hàm JavaScript tại đây, ví dụ:
  namdangchon.textContent = 'Năm ' + currentYear;
  deleteChart() 
  createChart(totals0);
});

namhientai1.addEventListener("click", function (event) {
  // Ngăn chặn hành vi mặc định của liên kết (nếu bạn không muốn chuyển trang)
  event.preventDefault();

  // Gọi hàm JavaScript tại đây, ví dụ:
  namdangchon.textContent = 'Năm ' + previousYear1;
  deleteChart() 
  createChart(totals1);
});

namhientai2.addEventListener("click", function (event) {
  // Ngăn chặn hành vi mặc định của liên kết (nếu bạn không muốn chuyển trang)
  event.preventDefault();

  // Gọi hàm JavaScript tại đây, ví dụ:
  namdangchon.textContent = 'Năm ' + previousYear2;
  deleteChart() 
  createChart(totals2);
});

