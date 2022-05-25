
//function my_func(e){
formdate.onsubmit= function (e){
    e.preventDefault();
    var action = document.getElementById('formdate').getAttribute('action');
    //alert(action);
    //var utcDate = new Date(Date.UTC(2018, 11, 1, 0, 0, 0));
    var utc = Date.UTC(2018, 11, 1, 0, 0, 0);
    alert(utc);
    var post_data = new FormData(formdate);
    alert(document.getElementById('tok').value);
    post_data.append('_token',document.getElementById('tok').value);
    console.log(post_data);
    fetch(action,{
        //method:'GET',
        method:'POST',
        body:post_data
    }).then(response=>{
        return response.json();
    }).then(
        response_json => {
            console.log(response_json);
            //var data = JSON.parse(response_json);
            const data = response_json;
            Highcharts.chart('container',{
                title: {
                    text: 'USD to EUR exchange rate over time'
                },
                xAxis: {
                    type: 'datetime',
                    //type: 'time',
                    //type: 'number',
                    //type: 'date',
                    title:{
                        text: 'My text'
                    }
                },
                yAxis: {
                    //type: 'float',
                    title: {
                        text: 'Exchange rate'
                    },

                    //lineWidth:1
                },
                series: [{
                    //type: 'area',
                    type: 'spline',
                    name: 'USD to EUR',
                    //data: {{ $data }}
                    data: data,
                    yAxis: 0
                }]
            });

        }
    )

}
