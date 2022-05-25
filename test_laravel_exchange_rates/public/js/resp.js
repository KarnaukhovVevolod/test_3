formdate.onsubmit = function (e){
    e.preventDefault();
    var action = document.getElementById('formdate').getAttribute('action');
    var post_data = new FormData(formdate);
    fetch(action,{
        method:'POST',
        body:post_data
    }).then(response=>{
        return response.json();
    }).then(
        response_json => {
            const data = response_json;
            Highcharts.chart('container',{
                title: {
                    text: 'USD to RUB обменный курс в указанном периоде'
                },
                xAxis: {
                    type: 'datetime',
                    title:{
                        text: 'Дата'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Стоимость одного доллара США в рублях'
                    },
                },
                series: [{
                    type: 'spline',
                    name: 'USD to RUB',
                    data: data,
                    yAxis: 0
                }]
            });
        }
    )
}
