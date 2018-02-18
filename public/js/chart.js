var data;
function init(dias, quantidade) {
    this.CallToChart(dias, quantidade);
}

function CallToChart(dias, quantidade) {
    var canvas = document.getElementById("meuCanvas");
    var myChart = new Chart(canvas, {
        type: 'bar',
        data:{
            labels: dias,
            datasets:[{
                label:'coletas',
                data:quantidade,
                backgroundColor:'rgba(14,72, 100, 0.8)'
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            title: {
                display: true,
                text: 'Acumulado nos últimos 6 meses'
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true
                    }
                }],
                yAxes: [{
                    display: true,
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            },
        }
    })
}

