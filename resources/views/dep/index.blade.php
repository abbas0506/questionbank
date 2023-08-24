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
                <h2>Summary</h2>
                <div class="grid grid-cols-2 space-x-8">
                    <div>
                        <canvas id="app_count_chart" height="200"></canvas>
                    </div>
                    <div>
                        <canvas id="fee_paid_chart" height="200"></canvas>
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
    var labels = @json($labels);
    var apps = @json($apps);
    var fee = @json($fee);

    const dataset1 = {
        label: "No of Applications",
        data: apps,
        lineTension: 0.2,
        fill: false,
        // borderWidth: 1,
        borderColor: '#DE5FF9',
        backgroundColor: '#F5D9FB',
    }

    const dataset2 = {
        label: "Fee Paid",
        data: fee,
        lineTension: 0.2,
        fill: false,
        // borderWidth: 1,
        borderColor: 'rgba(255, 99, 132, 0.8)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
    }
    // const dataset2 = {
    //     label: "Courses",
    //     data: courses,
    //     lineTension: 0.2,
    //     fill: false,
    //     borderColor: 'rgba(255, 99, 132, 0.8)',
    //     backgroundColor: 'rgba(255, 99, 132, 0.2)',
    // }
    // const dataset3 = {
    //     label: "Teachers",
    //     data: teachers,
    //     lineTension: 0.2,
    //     fill: false,
    //     borderColor: 'rgba(213, 176, 59, 0.8)',
    //     backgroundColor: 'rgba(213, 176, 59, 0.2)',
    // }
    // const dataset4 = {
    //     label: "Sections",
    //     data: sections,
    //     lineTension: 0.2,
    //     fill: false,
    //     borderColor: 'rgba(54, 162, 235, 0.8)',
    //     backgroundColor: 'rgba(54, 162, 235, 0.2)',
    // }
    // const dataset5 = {
    //     label: "Students",
    //     data: students,
    //     lineTension: 0.2,
    //     fill: false,
    //     borderColor: 'rgba(58, 199, 176, 0.8)',
    //     backgroundColor: 'rgba(58, 199, 176, 0.2)',
    // }

    var chartDataset = {
        labels: labels,
        datasets: [dataset1]
    };
    var feeDataset = {
        labels: labels,
        datasets: [dataset2]
    };

    var chartOptions = {
        legend: {
            display: false,
            position: 'bottom',
            labels: {
                boxWidth: 80,
                fontColor: 'black'
            }
        }
    };

    // const data = {
    //     labels: labels,
    //     datasets: [{
    //         label: 'Programs',
    //         backgroundColor: 'rgb(200, 99, 132)',
    //         borderColor: 'rgb(255, 99, 132)',
    //         data: programsCount,
    //     }]
    // };



    const config1 = {
        type: 'bar',
        data: chartDataset,
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
            maintainAspectRatio: false,

        },

    };
    const config2 = {
        type: 'bar',
        data: feeDataset,
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
            maintainAspectRatio: false,

        },

    };

    const chart1 = new Chart(
        document.getElementById('app_count_chart'),
        config1
    );
    const chart2 = new Chart(
        document.getElementById('fee_paid_chart'),
        config2
    );
</script>
@endsection