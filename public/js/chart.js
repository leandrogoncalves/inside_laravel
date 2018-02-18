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
                label:'coleta',
                data:quantidade,
                backgroundColor:'rgba(14,72, 100, 0.8)'
            }]
        }
    })
}

