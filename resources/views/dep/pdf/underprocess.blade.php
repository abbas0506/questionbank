<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upder Process</title>
    <link href="{{public_path('css/pdf_tw.css')}}" rel="stylesheet">
    <style>
        @page {
            margin: 50px 80px 50px 50px;
        }

        .footer {
            position: fixed;
            bottom: 50px;
            left: 30px;
            right: 50px;
            background-color: white;
            height: 50px;
        }

        .page-break {
            page-break-after: always;
        }

        .data tr th,
        .data tr td {
            font-size: 12px;
            text-align: center;
            /* padding-bottom: 2px; */
            border: 0.5px solid;
        }
    </style>
</head>
@php
$roman = config('global.romans');
@endphp

<body>
    <footer class="footer">

    </footer>

    <main>
        <div class="container">

            <div class="w-1/2 mx-auto">
                <div class="relative">
                    <div class="absolute"><img alt="logo" src="{{public_path('/images/logo/school_logo.png')}}" class="w-16"></div>
                </div>
                <table class="w-full">
                    <tbody>
                        <tr>
                            <td class="text-center text-xl font-bold">Uner Process Applications</td>
                        </tr>
                        <tr>
                            <td class="text-center text-sm">Govt. Higher Secondary School Chak Bedi, Pakpattan</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!-- table header -->
            <div class="mt-8">
                <table class="w-full">
                    <tbody>
                        <tr class="text-xs">
                            <td class="text-left">Part I, Session {{$session->title()}}</td>
                            <td class="text-right">Printed on {{ now()->format('d-M-Y')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @php $i=1; @endphp
            @foreach($session->applications()->underprocess()->get()->sortBy('matric_rollno')->chunk(40) as $chunk)
            <table class="w-full mt-2 data">
                <thead>
                    <tr style="background-color: #bbb;">
                        <th class="w-8">#</th>
                        <th>Form #</th>
                        <th>Name</th>
                        <th>%</th>
                        <th>Group</th>
                        <th>App. Date</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($chunk as $application)
                    <tr class="text-base">
                        <td>{{$i}}</td>
                        <td>{{$application->matric_rollno}}</td>
                        <td style="text-align: left !important; padding:2px 6px;">{{$application->name}}</td>
                        <td>{{round($application->matric_marks/11,0)}} %</td>
                        <td>{{$application->group->short}}</td>
                        <td>{{$application->created_at->format('d-M-y')}}</td>
                        <td>{{$application->phone}}</td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach

                </tbody>
            </table>
            @if($i%40!=1)
            @break
            @endif
            <div class="page-break"></div>

            @endforeach

    </main>
    <script type="text/php">
        if (isset($pdf) ) {
            $x = 285;
            $y = 20;
            $text = "{PAGE_NUM} of {PAGE_COUNT}";
            $font = $fontMetrics->get_font("helvetica", "bold");
            $size = 6;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
</body>

</html>