@extends('layouts.dep')
@section('page-content')
<div class="container bg-slate-100">
    <!--welcome  -->
    <div class="flex items-center">
        <div class="flex-1">
            <h2>Welcome {{ Auth::user()->name }}!</h2>
            <div class="bread-crumb">
                <div>Admin</div>
                <div>/</div>
                <div>Home</div>
            </div>
        </div>
        <div class="text-slate-500">{{ today()->format('d/m/Y') }}</div>
    </div>

    <!-- pallets -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
        <a href="{{route('dep.applications.index')}}" class="pallet-box">
            <div class="flex-1">
                <div class="title">Total Applications</div>
                <div class="h2">{{ $session->applications()->count()}}</div>
            </div>
            <div class="ico bg-green-100">
                <i class="bi bi-file-earmark-arrow-up text-green-600"></i>
            </div>
        </a>
        <a href="{{route('dep.underprocess.index')}}" class="pallet-box">
            <div class="flex-1 ">
                <div class="title">Under Process</div>
                <div class="h2">{{ $session->applications()->underprocess()->count()}}</div>
            </div>
            <div class="ico bg-blue-100">
                <i class="bi bi-file-earmark-code text-blue-600"></i>
            </div>
        </a>
        <a href="{{route('dep.objections.index')}}" class="pallet-box">
            <div class="flex-1">
                <div class="title">Objection Raised</div>
                <div class="h2">{{ $session->applications()->objectioned()->count() }}</div>
            </div>
            <div class="ico bg-orange-100">
                <i class="bi bi-file-earmark-x text-orange-400"></i>
            </div>
        </a>

        <a href="{{route('dep.fee.index')}}" class="pallet-box">
            <div class="flex-1">
                <div class="title">Confirmed / Paid</div>
                <div class="h2"> {{ $session->applications()->feepaid()->count()}}</div>
            </div>
            <div class="ico bg-teal-100">
                <i class="bi bi-file-earmark-check text-teal-600"></i>
            </div>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 mt-8 gap-6 ">
        <!-- middle panel  -->
        <div class="md:col-span-2 relative">
            <a href="{{route('dep.todayactivity.index')}}" class="absolute top-2 right-2">
                <i class="bi-arrows-angle-expand"></i>
            </a>
            <!-- todays progress  -->
            <div class="p-4 bg-red-50">
                <h2>Today's Activity </h2>
                <div class="divider mt-2 border-orange-200"></div>
                <div class="grid grid-cols-2 mt-4">
                    <div>
                        <h3>Applications</h3>
                        <p>{{$session->applications()->today()->count()}}</p>
                    </div>
                    <div>
                        <h3>Fee Collection</h3>
                        <p>{{$session->applications()->today()->sum('fee')}}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 mt-4">
                <!-- <h2 class="text-center">Summary</h2> -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <canvas id="chart1" height="200"></canvas>
                    </div>
                    <div>
                        <canvas id="chart2" height="200"></canvas>
                    </div>
                    <div>
                        <canvas id="chart3" height="200"></canvas>
                    </div>

                </div>

            </div>

        </div>
        <!-- middle panel end -->
        <!-- right side bar starts -->
        <div class="">
            <div class="bg-sky-100 p-4">
                <div class="flex items-center justify-between mt-2 text-sm">
                    <div class="flex items-center space-x-2">
                        <i class="bi-file-earmark-check text-lg"></i>
                        <h3>Confirmed Applications</h3>
                    </div>
                    <h3>{{$session->applications()->feepaid()->count()}}</h3>
                </div>
                <div class="divider mt-4 border-sky-200"></div>
                <div class="flex items-center justify-between mt-2 text-sm">
                    <div class="flex items-center">
                        <i class="bi-heart-pulse w-8"></i>
                        <a href="{{route('dep.groups.show',1)}}" class="link">Pre Medical</a>
                    </div>
                    <div>{{$session->applications()->medical()->feepaid()->count()}}</div>
                </div>
                <div class="flex items-center justify-between mt-2 text-sm">
                    <div class="flex items-center">
                        <i class="bi-tools w-8"></i>
                        <a href="{{route('dep.groups.show',2)}}" class="link">Pre Engineering</a>
                    </div>
                    <div>{{$session->applications()->engg()->feepaid()->count()}}</div>
                </div>
                <div class="flex items-center justify-between mt-2 text-sm">
                    <div class="flex items-center">
                        <i class="bi-laptop w-8"></i>
                        <a href="{{route('dep.groups.show',3)}}" class="link">ICS</a>
                    </div>
                    <div>{{$session->applications()->ics()->feepaid()->count()}}</div>
                </div>
                <div class="flex items-center justify-between mt-2 text-sm">
                    <div class="flex items-center">
                        <i class="bi-emoji-smile w-8"></i>
                        <a href="{{route('dep.groups.show',4)}}" class="link">Arts</a>
                    </div>
                    <div>{{$session->applications()->arts()->feepaid()->count()}}</div>
                </div>


            </div>

            <div class="mt-4 bg-white p-4">
                <h2>Profile</h2>
                <div class="flex flex-col">
                    <div class="flex text-sm mt-4">
                        <div class="w-8"><i class="bi-person"></i></div>
                        <div>{{ Auth::user()->name }}</div>
                    </div>
                    <div class="flex text-sm mt-2">
                        <div class="w-8"><i class="bi-envelope-at"></i></div>
                        <div>{{ Auth::user()->email }}</div>
                    </div>
                    <div class="flex text-sm mt-2">
                        <div class="w-8"><i class="bi-phone"></i></div>
                        <div>{{ Auth::user()->phone }}</div>
                    </div>
                    <div class="divider border-blue-200 mt-4"></div>
                    <div class="flex text-sm mt-4">
                        <div class="w-8"><i class="bi-key"></i></div>
                        <a href="{{url('dep/change/password')}}" class="link">Change Password</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    var groups = @json($groups);
    var groupWiseCount = @json($groupWiseCount);
    var days = @json($days);
    var dayWiseCount = @json($dayWiseCount);
    var feeWiseCount = @json($feeWiseCount);
    var objectionWiseCount = @json($objectionWiseCount);
    var percentLabels = @json($percentLabels);
    var percentWiseCount = @json($percentWiseCount);

    // plugin registration
    Chart.register(ChartDataLabels);

    // doughnut chart
    const data1 = {
        labels: groups,
        datasets: [{
            label: 'Applications',
            data: groupWiseCount,
            backgroundColor: [
                'rgba(255, 0, 0, 0.4)',
                'rgba(0, 162, 235, 0.6)',
                'rgba(0, 200, 86, 0.4)',
                'rgba(0, 0, 200, 0.4)'
            ],
            cutout: '70%',
            // borderRadius: 10,
            hoverBorderColor: 'black',
            hoverBorderWidth: 1,
        }]
    };

    const config1 = {
        type: 'doughnut',
        data: data1,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    anchor: 'center',
                    align: 'center',
                    formatter: Math.round,
                    font: {
                        // weight: 'bold',
                        size: 10
                    },
                    // offset: 0,
                },

                legend: {
                    display: true,
                    position: 'right',
                    align: 'start',
                    // rtl: true,
                    labels: {
                        usePointStyle: true,
                        color: 'black',
                        font: {
                            weight: 'bold',
                            size: 10,
                        },
                        padding: 10,
                    },

                },
                title: {
                    display: true,
                    text: 'Group Wise',
                    color: 'black',
                    position: 'bottom',
                    align: 'center',
                    font: {
                        weight: 'bold'
                    },
                    padding: 8,
                    fullSize: true,

                },
                tooltip: {
                    enabled: false,
                },

            },

        },

    };

    const data2 = {
        labels: days,
        datasets: [{
                // first data set 
                label: "Applications",
                data: dayWiseCount,
                lineTension: 0.2,
                fill: false,
                // borderWidth: 1,
                borderColor: 'rgba(0, 162, 235, 0.6)',
                backgroundColor: 'rgba(0, 162, 235, 0.2)',
            },
            // {
            //     label: "Fee",
            //     data: feeWiseCount,
            //     lineTension: 0.2,
            //     fill: false,
            //     // borderWidth: 1,
            //     borderColor: 'rgba(255, 99, 132, 0.6)',
            //     backgroundColor: 'rgba(255, 99, 132, 0.2)',
            // },
            {
                // 3rd data set
                label: "Objection",
                data: objectionWiseCount,
                lineTension: 0.2,
                fill: false,
                // borderWidth: 1,
                borderColor: 'rgba(255, 0, 50, 0.6)',
                backgroundColor: 'rgba(255, 0, 50, 0.2)',
            },

        ]
    };


    const config2 = {
        type: 'bar',
        data: data2,
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: {
                        display: true
                    }
                }
            },
            plugins: {
                datalabels: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Date Wise',
                    color: 'black',
                    position: 'bottom',
                    align: 'center',
                    font: {
                        weight: 'bold'
                    },
                    padding: 8,
                    fullSize: true,

                },
                legend: {
                    display: true,
                }
            },
            indexAxis: 'x',
            borderWidth: 1,
            maintainAspectRatio: false,

        },
    };


    // chart 3

    const data3 = {
        labels: percentLabels,
        datasets: [{
            label: 'Applications',
            data: percentWiseCount,
            lineTension: 0.2,
            fill: false,
            // borderWidth: 1,
            borderColor: 'rgba(0, 100, 255, 0.6)',
            backgroundColor: 'rgba(0, 100, 255, 0.2)',
        }]
    };


    const config3 = {
        type: 'bar',
        data: data3,
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: {
                        display: true
                    }
                }
            },

            indexAxis: 'x',
            borderWidth: 1,
            labels: {
                display: false,
            },
            plugins: {
                datalabels: {
                    display: false,
                    // anchor: 'center',
                    // align: 'center',
                    // formatter: Math.round,
                    // font: {
                    //     // weight: 'bold',
                    //     size: 10
                    // },
                    // offset: 0,
                },
                title: {
                    display: true,
                    text: 'Percentage Wise',
                    color: 'black',
                    position: 'bottom',
                    align: 'center',
                    font: {
                        weight: 'bold'
                    },
                    padding: 8,
                    fullSize: true,
                },
                legend: {
                    display: false,
                }
            },

            maintainAspectRatio: false,

        },
    };

    const chart1 = new Chart(document.getElementById('chart1'), config1);
    const chart2 = new Chart(document.getElementById('chart2'), config2);
    const chart3 = new Chart(document.getElementById('chart3'), config3);
</script>
@endsection