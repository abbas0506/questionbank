\documentclass[8pt]{exam}
\renewcommand{\thepartno}{\arabic{partno}}
\qformat{\thequestiontitle \dotfill \thepoints}
\renewcommand\partshook{\hspace{2em}}
\usepackage{amsfonts}
\usepackage{mathrsfs}
\usepackage{amsmath}
\usepackage{adjustbox}
\usepackage[left=1cm,right=1cm,top=1cm,bottom=1cm,{{$orientation}},{{$pageSize}}paper]{geometry}
\usepackage{polyglossia}
\usepackage{fontspec}
\usepackage{bidi}
\setmainlanguage{english}
\setotherlanguage{urdu}
\setmainfont{Jameel Noori Nastaleeq.ttf}[Path=/latex/fonts/]
\begin{document}
\newcommand{\numRows}{3} % Number of rows
\newcommand{\numCols}{4} % Number of columns
\begin{tabular}{|*{\numCols}{c|}}
@for($i = 1; $i <= 3 ; $i++)
@for($j = 1; $j <= 4 ; $j++)
{{-- \begin{center} \large{\uppercase{GHSS Chak Bedi, Pakpattan}}\\ \small {{$test->test_date->format('d/m/Y')}} \end{center} Subject :{{$test->subject->name}} \hfill Roll \# : \_\_\_\_\_\_\_\_\_ \hfill Name: \_\_\_\_\_\_\_\_\_\_\_ \vspace{2mm} \hrule \vspace{2mm} Marks : {{ $test->totalMarks() }} \hfill Time : {{$test->getDuration()}} \vspace{2mm} \hrule \vspace{1mm}  --}}
\begin{questions} @foreach($test->questions()->mcqs()->get() as $testQuestion)
    \titledquestion{Encircle the correct option}[{{$testQuestion->parts->count()}}]
    @if($testQuestion->parts->count()==$testQuestion->necessary_parts)
    All questions are compulsory
    @else
    Answer any {{$testQuestion->necessary_parts}} questions
    @endif
    \begin{parts}
    @foreach($testQuestion->parts as $part)

    @if(Helper::hasUrdu($part->question->question)) \begin{RTL} @endif
    \part
    {!! Helper::parseTex($part->question->question, true) !!}\\
    \begin{oneparchoices}
    \choice {!! Helper::parseAnswer($part->question->mcq->option_a) !!}
    \choice {!! Helper::parseAnswer($part->question->mcq->option_b) !!}
    \choice {!! Helper::parseAnswer($part->question->mcq->option_c) !!}
    \choice {!! Helper::parseAnswer($part->question->mcq->option_d,true) !!}
    \end{oneparchoices}
    @if(Helper::hasUrdu($part->question->question)) \end{RTL} @endif
    @endforeach
    \end{parts}
    @endforeach
    @foreach($test->questions()->short()->get() as $testQuestion)
    \titledquestion{Q.2 Answer the following. }[8]
    (any 4 questions)
    \begin{parts}
    @foreach($testQuestion->parts as $part)
    @if(Helper::hasUrdu($part->question->question)) \begin{RTL} @endif
    \part
    {!! Helper::parseTex($part->question->question)!!}
    @if(Helper::hasUrdu($part->question->question)) \end{RTL} @endif
    @endforeach
    \end{parts}
    @endforeach
    @foreach($test->questions()->long()->get() as $testQuestion)
    \titledquestion{Q.3 Answer the following.}[10]
    (any 2 questions)
    \begin{parts}
    @foreach($testQuestion->parts as $part)
    @if(Helper::hasUrdu($part->question->question)) \begin{RTL} @endif
    \part
    {!! Helper::parseTex($part->question->question)!!}
    @if(Helper::hasUrdu($part->question->question)) \end{RTL} @endif
    @endforeach
    \end{parts}
    @endforeach
    \end{questions}
@if($j < 4) & @else \\ @endif
@endfor
@endfor
\end{tabular}
\end{document}