<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(Session::has('status'))
    <div class="bg-green-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ Session::pull('status') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          </span>
      </div>  
    @endif
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200">
                    <div class="bg-indigo-700 px-4 py-5 border-b rounded-t sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-white">
                          Dashboard
                        </h3>
                      </div>
                      
                     
                      <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <canvas height="100px" style="padding: 20px" id="postChart"></canvas>
                        <div id="chart-container"></div>
                        <canvas id="barChart"></canvas>
                   </div>
                   <script src="https://code.highcharts.com/highcharts.js"></script>
                   <script>
                    var datas = <?php echo json_encode($datas) ?>;
                    Highcharts.chart('chart-container',{
                      title:{
                        text: 'User Growth'
                      },
                      subtitle:{
                        text: 'Based on joined date'
                      },
                      xAxis:{
                        categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
                      },
                      yAxis:{
                        title:{
                          text:'Number of Users'
                        }
                      },
                      legend:{
                        layout:'vertical',
                        align:'right',
                        verticalAlign:'middle'
                      },
                      plotOptions:{
                        series:{
                          allowPointSelect:true
                        }
                      },
                      series:[{
                        name:"User",
                        data: datas
                      }],
                      responsive:{
                        rules: [
                          {
                            condition:{
                              maxWidth:500
                            },
                            chartOptions:{
                              legend:{
                                layout:'horizontal',
                                align:'center',
                                verticalAlign:'bottom'
                              }
                            }
                          }
                        ]
                      }
                    })
                  </script>
                  <script>
                    $(function(){
                    var values = <?php echo json_encode($datas); ?>;
                    var barCanvas = $("#barChart");
                    var barChart = new Chart(barCanvas,{
                      type:'bar',
                      data:{
                        labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                        datasets: [
                          {
                            label:"User Growth",
                            data: values,
                            backgroundColor: ['red','blue','green','yellow','black','grey','indigo','purple','orange','aqua','cyan','brown']
                          }
                        ]
                      },
                      options:{
                        scales:{
                          yAxes:[{
                            ticks:{
                              beginAtZero:true
                            }
                          }]
                        }
                      }
                    })
                    });
                    </script>
                    
                    <script>
                      
                    $(function(){
                    var values = <?php echo json_encode($postlist); ?>;
                    var postCanvas = $("#postChart");
                    var postChart = new Chart(postCanvas,{
                      type:'bar',
                      data:{
                        labels: <?php echo json_encode($userlist); ?>,
                        datasets: [
                          {
                            label:"Post per User",
                            data: values,
                            }
                        ]
                      },
                      options:{
                        scales:{
                          yAxes:[{
                            ticks:{
                              beginAtZero:true
                            }
                          }]
                        }
                      }
                    })
                    });
                    </script>
            </div>
        </div>
    </div>
</x-app-layout>

