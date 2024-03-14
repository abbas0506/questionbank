@extends('layouts.teacher')
@section('page-content')
<div class="custom-container">
    <!--welcome  -->
    <div class="flex items-center">
        <div class="flex-1">
            <h2>Welcome {{ Auth::user()->userable->name }}!</h2>
            <div class="bread-crumb">
                <div>Teacher</div>
                <div>/</div>
                <div>Home</div>
            </div>
        </div>
        <div class="text-slate-500">{{ today()->format('d/m/Y') }}</div>
    </div>

    <!-- pallets -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
        <a href="{{route('teacher.qbank.index')}}" class="pallet-box">
            <div class="flex-1">
                <div class="title">Q. Bank</div>
                <div class="h2">{{App\Models\Question::all()->count()}} &nbsp <span class="text-xs text-slate-600">{{App\Models\Question::whereDate('created_at', today())->count()}} <i class="bi-arrow-up"></i></span></div>
            </div>
            <div class="ico bg-green-100">
                <i class="bi bi-question text-green-600"></i>
            </div>
        </a>
        <a href="{{route('teacher.tests.index')}}" class="pallet-box">
            <div class="flex-1">
                <div class="title">My Tests</div>
                <div class="h2">{{ Auth::user()->tests->count() }}</div>
            </div>
            <div class="ico bg-indigo-100">
                <i class="bi bi-clipboard2 text-indigo-400"></i>
            </div>
        </a>
        <a href="" class="pallet-box">
            <div class="flex-1 ">
                <div class="title">Course Allocations</div>
                <div class="h2">%</div>
            </div>
            <div class="ico bg-teal-100">
                <i class="bi bi-card-checklist text-teal-600"></i>
            </div>
        </a>
        <a href="" class="pallet-box">
            <div class="flex-1">
                <div class="title">Results</div>
                <div class="h2"> %</div>
            </div>
            <div class="ico bg-sky-100">
                <i class="bi bi-graph-up text-sky-600"></i>
            </div>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 mt-8 gap-6">
        <!-- middle panel  -->
        <div class="md:col-span-2">
            <!-- update news  -->
            <div class="p-4 bg-white">
                @if(Auth::user()->tests->count()>0)
                <h2>Recent Tests </h2>
                <div class="overflow-x-auto w-full mt-3">
                    <table class="table-fixed xs">
                        <thead>
                            <tr>
                                <th class="w-10">Sr</th>
                                <th class="w-64">Title</th>
                                <th class="w-32">Date</th>
                                <th class="w-20">Q.Paper</th>
                                <th class="w-20">Ans Key</th>
                            </tr>
                        <tbody>
                            @php $sr=1; @endphp
                            @foreach(Auth::user()->tests->sortByDesc('id') as $test)
                            <tr>
                                <td>{{$sr++}}</td>
                                <td class="text-left">
                                    <a href="{{route('teacher.tests.show',$test)}}" class="link">{{$test->title}}</a>
                                    <br>
                                    <label>{{$test->subject->grade->roman_name}}-{{$test->subject->name}}</label>
                                </td>
                                <td>{{$test->test_date->format('d/m/Y')}}</td>
                                <td>
                                    <a href="{{route('teacher.tests.show',$test)}}"><i class="bi-printer"></i></a>
                                    <a href="{{route('teacher.tests.pdf.show',[$test,1])}}"><i class="bi-p-square-fill"></i></a>
                                </td>
                                <td><a href="{{route('teacher.tests.anskey.show',$test)}}"><i class="bi-file-pdf text-red-400 hover:text-red-600"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
                @else
                <div class="h-full flex flex-col justify-center items-center">
                    <h3>Currently no test found!</h3>
                    <label for="">Start Now</label>
                </div>
                @endif
            </div>

        </div>
        <!-- middle panel end -->
        <!-- right side bar starts -->
        <div class="">
            <div class="bg-white p-4">
                <h2>Profile</h2>
                <div class="flex flex-col">
                    <div class="flex text-sm mt-4">
                        <div class="w-8"><i class="bi-person"></i></div>
                        <div>{{ Auth::user()->userable->name }}</div>
                    </div>
                    <div class="flex text-sm mt-2">
                        <div class="w-8"><i class="bi-envelope-at"></i></div>
                        <div>{{ Auth::user()->userable->email }}</div>
                    </div>
                    <div class="flex text-sm mt-2">
                        <div class="w-8"><i class="bi-phone"></i></div>
                        <div>{{ Auth::user()->userable->phone }}</div>
                    </div>
                    <div class="divider border-blue-200 mt-4"></div>
                    <div class="flex text-sm mt-4">
                        <div class="w-8"><i class="bi-key"></i></div>
                        <a href="{{url('admin/change/password')}}" class="link">Change Password</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    function confirmDel(event) {
        event.preventDefault(); // prevent form submit
        var form = event.target; // storing the form

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        })
    }
</script>

@endsection