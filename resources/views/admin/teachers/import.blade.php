@extends('layouts.admin')
@section('page-content')


<div class="custom-container">
    <h2>Import Teachers</h2>
    <div class="bread-crumb">
        <a href="{{url('admin')}}">Cancel & Go Back</a>
    </div>

    <div class="mt-12">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <!-- smaple format for .xlsx -->
        <div class="collapsible">
            <div class="head border border-dashed mt-8">
                <div class="flex items-center space-x-2">
                    <i class="bx bxs-chevron-down bx-burst text-blue-600"></i>
                    <h2 class=""><span class="text-slate-600 text-xs">Help required?</span></h2>
                </div>
            </div>

            <div class="body">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="text-xs">
                            <th>sr</th>
                            <th>name</th>
                            <th>father</th>
                            <th>dob</th>
                            <th>cnic</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>address</th>
                            <th>qualification</th>
                            <th>designation</th>
                            <th>bps</th>
                            <th>personal</th>
                            <th>appointed_on</th>
                            <th>joined_on</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td>05.06.1978</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>08.05.2009</td>
                            <td>10.03.2014</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>

        <form action="{{route('admin.teachers.import.post')}}" method="POST" enctype="multipart/form-data" class="flex flex-col w-full">
            @csrf

            <div class="flex flex-col border rounded-sm bg-gray-100 p-3">
                <label for="upload" class="">Please upload an Excel file</label>
                <input type="file" name='file' class="mt-3" id='upload'>

            </div>

            <div class="flex items-center space-x-4 mt-6">
                <button type="submit" class="btn-teal rounded p-2 w-24">Import</button>
            </div>

        </form>
    </div>

    @endsection