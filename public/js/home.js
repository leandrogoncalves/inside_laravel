var inside = inside || {};

inside.home = {

    init : function () {
        this.chart_home();
    },

    CallToChart:  function (dias, quantidade) {

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
                    text: 'Acumulado nos Ãºltimos 6 meses'
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
    },

    convertDate: function(date) {
        var grafico = date;
        var dias = [];
        var quantidade = [];
        for(var i=0; i <  Object.keys(grafico).length; i++){
            dias.push(grafico[i].data_inclusao);
            quantidade.push(grafico[i].quantidade);
        }
        this.CallToChart(dias, quantidade );
    },

    loadData: function (link, _callBackBefore, _callBackAfter) {
        $.ajax({
            url:link,
            context: document.body,
            beforeSend: _callBackBefore,
            complete: _callBackAfter
        }).done(function(data) {
            inside.home.convertDate(data);
        });;
    },

    chart_home : function () {
        var url = '/total-exames-acumulado/'+$('#id_executivo').text()+'/'+$('#perfil_acesso').text();
        this.loadData(url, function () {}, function () {});
    }
}