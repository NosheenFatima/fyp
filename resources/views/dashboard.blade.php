@extends('layouts.masterlayout')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="max-width:100%; margin:0;">
<div class="container-fluid p-0">
    <div class="row vh-100">
        <div class="col-auto col-md-3 col-xl-2 bg-light border-end">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-dark min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0" style="font-size:22px">
                            <i class="fa-home fa fs-4"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            <i class="fa-angle-right fa right-arrow text-end ms-2"></i>
                        </a>
                        
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fa fa-calendar fs-4"></i> <span class="ms-1 d-none d-sm-inline">My Calendar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="calendar.html" class="nav-link px-0 align-middle">
                            <i class="fa fa-calendar-o fs-4"></i> <span class="ms-1 d-none d-sm-inline">Calendar</span>
                        </a>
                    </li> --}}
                    @role('admin')
                    <li class="nav-item">
                        <div class="d-grid gap-2 mt-3 w-100">
                    <div style="width: 100%;height: 100%;color:#da2461;display: flex;flex-direction: column;gap: 30px;">
    <a href='{{ route('show-category-form') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-plus"></i> Add Job Category
    </a>
    <a href='{{ route('all-categories') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-list"></i> View Jobs Categories
    </a>
    <a href='{{ route('show-new-job') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-plus-circle"></i> Add new Job
    </a>
    <a href='{{ route('All-Jobs') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-briefcase"></i> View Jobs
    </a>
    <a href='{{ route('view-user') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-users"></i> View Applicant
    </a>
</div>
                        </div>
                    </li>
                    @endrole
                    @role('Employee')
                    <li class="nav-item mt-3">
                        <div class="d-grid gap-2 w-100">    <div style="width: 100%;height: 100%;color:#da2461;display: flex;flex-direction: column;gap: 30px;">
    <a href='{{ route('show-category-form') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-plus"></i> Add Job Category
    </a>
    <a href='{{ route('all-categories') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-list"></i> View Jobs Categories
    </a>
    <a href='{{ route('show-new-job') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-plus-circle"></i> Add new Job
    </a>
    <a href='{{ route('All-Jobs') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-briefcase"></i> View Jobs
    </a>
   
</div>
                        </div>
                    </li>
                    @endrole
                        @role('jobSeeker')
                    <li class="nav-item mt-3">
                        <div class="d-grid gap-2 w-100">    <div style="width: 100%;height: 100%;color:#da2461;display: flex;flex-direction: column;gap: 30px;">
   
    <a href='{{ route('all-categories') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-list"></i> View Jobs Categories
    </a>

    <a href='{{ route('All-Jobs') }}' class='btn btn-primary btn-sm' style="color:#fff; width:80%;">
        <i class="fas fa-briefcase"></i> View Jobs
    </a>
  
</div>
                        </div>
                    </li>
                    @endrole
                    <li class="nav-item mt-3">
                        <a href="/" class="nav-link align-middle px-0 text-dark">
                            <i class="fa fa-arrow-left fs-4"></i> <span class="ms-1 d-none d-sm-inline">Go Back To The Page</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col py-3">
            <div class="container-fluid">
                <div class="row">
               @role('admin')
                    <div class="col-md-6">
                        <h3 class="animated fadeInLeft" style="color:#fb246a; font-size:30px;">Admin Dashboard</h3>  
                    </div>
                    @endrole
                     @role('Employee')
                     <div class="col-md-6">
                        <h3 class="animated fadeInLeft" style="color:#fb246a; font-size:30px;">Employee Dashboard</h3>  
                    </div>
                     @endrole
                       @role('jobSeeker')
                     <div class="col-md-6">
                        <h3 class="animated fadeInLeft" style="color:#fb246a; font-size:30px;">Applicant Dashboard</h3>  
                    </div>
                     @endrole
                    <div class="col-md-6 text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="me-3">
                                <h3 class="text-secondary"><i class="fa fa-map-marker"></i> Banyumas</h3>
                                <h1 class="mt-n2 text-secondary">30<sup>o</sup></h1>
                            </div>
                            <div class="wheather">
                                <div class="stormy rainy animated pulse infinite">
                                    <div class="shadow"></div>
                                </div>
                                <div class="sub-wheather">
                                    <div class="thunder"></div>
                                    <div class="rain">
                                        <div class="droplet droplet1"></div>
                                        <div class="droplet droplet2"></div>
                                        <div class="droplet droplet3"></div>
                                        <div class="droplet droplet4"></div>
                                        <div class="droplet droplet5"></div>
                                        <div class="droplet droplet6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card bg-white border-0">
                                    <div class="card-header bg-white border-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="card-title text-start">Visit</h4>
                                            <h4><i class="fa fa-user icons icon text-end"></i></h4>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <h1 style=" font-size: 36px;color: #6c757d;">51181,320</h1>
                                        <p class="text-muted">User active</p>
                                        <hr/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-white border-0">
                                    <div class="card-header bg-white border-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="card-title text-start">Orders</h4>
                                            <h4><i class="fa fa-basket-loaded icons icon text-end"></i></h4>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <h1 style=" font-size: 36px;color: #6c757d;">51181,320</h1>
                                        <p class="text-muted">New Orders</p>
                                        <hr/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card bg-white border-0">
                                    <div class="card-header bg-white border-0">
                                        <h4><i class="fa fa-notebook icons"></i> Agenda</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="bg-light p-3">
                                            <h2>Checking Your Server!</h2>
                                            <p class="text-muted">Daily Check on Server status, mostly looking at servers with alerts/warnings</p>
                                            <b><i class="fa fa-clock icons"></i> Today at 15:00</b>
                                        </div>
                                        <div class="calendar">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <div class="card box-v2">
                                <img src="{{asset('asset-temp/img/bg2.jpg')}}" class="card-img-top" alt="Cover Image">
                                <div class="box-v2-detail text-center mt-n5">
                                    <img src="{{asset('asset-temp/img/avatar.jpg')}}" class="rounded-circle img-thumbnail" alt="User Avatar" width="100" style="margin-left:140px">
                                    <h4 class="card-title mt-2">Akihiko Avaron</h4>
                                </div>
                                <div class="card-body text-center" style="background-color:#fb246a;">
                                    <div class="row">
                                        <div class="col-4">
                                            <h3>2.000</h3>
                                            <p class="text-muted">Post</p>
                                        </div>
                                        <div class="col-4">
                                            <h3>2.232</h3>
                                            <p class="text-muted">share</p>
                                        </div>
                                        <div class="col-4">
                                            <h3>4.320</h3>
                                            <p class="text-muted">photos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

    <script src="{{asset('asset-temp/js/jquery.min.js')}}"></script>
    <script src="{{asset('asset-temp/js/jquery.ui.min.js')}}"></script>
    <script src="{{asset('asset-temp/js/bootstrap.min.js')}}"></script>
   
    
    <!-- plugins -->
    <script src="{{asset('asset-temp/js/plugins/moment.min.js')}}"></script>
    <script src="{{asset('asset-temp/js/plugins/fullcalendar.min.js')}}"></script>
    <script src="{{asset('asset-temp/js/plugins/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('asset-temp/js/plugins/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('asset-temp/js/plugins/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('asset-temp/js/plugins/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('asset-temp/js/plugins/chart.min.js')}}"></script>


    <!-- custom -->
     <script src="{{asset('asset-temp/js/main.js')}}"></script>
     <script type="text/javascript">
      (function(jQuery){

        // start: Chart =============

        Chart.defaults.global.pointHitDetectionRadius = 1;
        Chart.defaults.global.customTooltips = function(tooltip) {

            var tooltipEl = $('#chartjs-tooltip');

            if (!tooltip) {
                tooltipEl.css({
                    opacity: 0
                });
                return;
            }

            tooltipEl.removeClass('above below');
            tooltipEl.addClass(tooltip.yAlign);

            var innerHtml = '';
            if (undefined !== tooltip.labels && tooltip.labels.length) {
                for (var i = tooltip.labels.length - 1; i >= 0; i--) {
                    innerHtml += [
                        '<div class="chartjs-tooltip-section">',
                        '   <span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[i].fill + '"></span>',
                        '   <span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
                        '</div>'
                    ].join('');
                }
                tooltipEl.html(innerHtml);
            }

            tooltipEl.css({
                opacity: 1,
                left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
                top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
                fontFamily: tooltip.fontFamily,
                fontSize: tooltip.fontSize,
                fontStyle: tooltip.fontStyle
            });
        };
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };
        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                fillColor: "rgba(21,186,103,0.4)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(66,69,67,0.3)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                 data: [18,9,5,7,4.5,4,5,4.5,6,5.6,7.5]
            }, {
                label: "My Second dataset",
                fillColor: "rgba(21,113,186,0.5)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [4,7,5,7,4.5,4,5,4.5,6,5.6,7.5]
            }]
        };

        var doughnutData = [
                {
                    value: 300,
                    color:"#129352",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 50,
                    color: "#1AD576",
                    highlight: "#15BA67",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                {
                    value: 40,
                    color: "#0F5E36",
                    highlight: "#15BA67",
                    label: "Peta"
                },
                {
                    value: 120,
                    color: "#15A65D",
                    highlight: "#15BA67",
                    label: "X"
                }

            ];


        var doughnutData2 = [
                {
                    value: 100,
                    color:"#129352",
                    highlight: "#15BA67",
                    label: "Alfa"
                },
                {
                    value: 250,
                    color: "#FF6656",
                    highlight: "#FF6656",
                    label: "Beta"
                },
                {
                    value: 100,
                    color: "#FDB45C",
                    highlight: "#15BA67",
                    label: "Gamma"
                },
                {
                    value: 40,
                    color: "#FD786A",
                    highlight: "#15BA67",
                    label: "Peta"
                },
                {
                    value: 120,
                    color: "#15A65D",
                    highlight: "#15BA67",
                    label: "X"
                }

            ];

        var barChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(21,186,103,0.4)",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(21,186,103,0.2)",
                        highlightStroke: "rgba(21,186,103,0.2)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(21,113,186,0.5)",
                        strokeColor: "rgba(151,187,205,0.8)",
                        highlightFill: "rgba(21,113,186,0.2)",
                        highlightStroke: "rgba(21,113,186,0.2)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };

         window.onload = function(){
                var ctx = $(".doughnut-chart")[0].getContext("2d");
                window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
                    responsive : true,
                    showTooltips: true
                });

                var ctx2 = $(".line-chart")[0].getContext("2d");
                window.myLine = new Chart(ctx2).Line(lineChartData, {
                     responsive: true,
                        showTooltips: true,
                        multiTooltipTemplate: "<%= value %>",
                     maintainAspectRatio: false
                });

                var ctx3 = $(".bar-chart")[0].getContext("2d");
                window.myLine = new Chart(ctx3).Bar(barChartData, {
                     responsive: true,
                        showTooltips: true
                });

                var ctx4 = $(".doughnut-chart2")[0].getContext("2d");
                window.myDoughnut2 = new Chart(ctx4).Doughnut(doughnutData2, {
                    responsive : true,
                    showTooltips: true
                });

            };
        
        //  end:  Chart =============

        

        // start: Maps============

          jQuery('.maps').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#fff',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
        });

        // end: Maps==============

      })(jQuery);
     </script>
  <!-- end: Javascript -->
</x-app-layout>

@endsection