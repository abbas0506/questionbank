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
        <a href="" class="pallet-box">
            <div class="flex-1">
                <div class="title">Total Applications</div>
                <div class="h2">{{ $session->applications()->count()}}</div>
            </div>
            <div class="ico bg-green-100">
                <i class="bi bi-person-circle text-green-600"></i>
            </div>
        </a>
        <a href="" class="pallet-box">
            <div class="flex-1 ">
                <div class="title">Recommeded</div>
                <div class="h2">{{ $session->applications()->recommended()->count()}}</div>
            </div>
            <div class="ico bg-teal-100">
                <i class="bi bi-card-checklist text-teal-600"></i>
            </div>
        </a>
        <a href="{{url('teachers')}}" class="pallet-box">
            <div class="flex-1">
                <div class="title">Objection Raised</div>
                <div class="h2">{{ $session->applications()->objectioned()->count() }}</div>
            </div>
            <div class="ico bg-indigo-100">
                <i class="bi bi-person-workspace text-indigo-400"></i>
            </div>
        </a>

        <a href="" class="pallet-box">
            <div class="flex-1">
                <div class="title">Fee Paid</div>
                <div class="h2"> {{ $session->applications()->feepaid()->count()}}</div>
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
            <div class="p-4 bg-red-50">
                <h2>Today's Activity </h2>
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

        </div>
        <!-- middle panel end -->
        <!-- right side bar starts -->
        <div class="">
            <div class="bg-sky-100 p-4">
                <div class="flex items-center space-x-2">
                    <i class="bi-people text-lg"></i>
                    <h2>Applications</h2>
                </div>
                <div class="divider mt-4 border-sky-200"></div>
                <div class="flex items-center justify-between mt-2 text-sm">
                    <div class="flex items-center">
                        <i class="bi-heart-pulse w-8"></i>
                        <a href="{{route('admin.sessions.index')}}" class="link">Pre Medical</a>
                    </div>
                    <div>{{$session->applications()->medical()->count()}}</div>
                </div>
                <div class="flex items-center justify-between mt-2 text-sm">
                    <div class="flex items-center">
                        <i class="bi-tools w-8"></i>
                        <a href="{{route('admin.groups.index')}}" class="link">Pre Engineering</a>
                    </div>
                    <div>{{$session->applications()->engg()->count()}}</div>
                </div>
                <div class="flex items-center justify-between mt-2 text-sm">
                    <div class="flex items-center">
                        <i class="bi-laptop w-8"></i>
                        <a href="{{route('admin.groups.index')}}" class="link">ICS</a>
                    </div>
                    <div>{{$session->applications()->ics()->count()}}</div>
                </div>
                <div class="flex items-center justify-between mt-2 text-sm">
                    <div class="flex items-center">
                        <i class="bi-emoji-smile w-8"></i>
                        <a href="{{route('admin.groups.index')}}" class="link">Arts</a>
                    </div>
                    <div>{{$session->applications()->arts()->count()}}</div>
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