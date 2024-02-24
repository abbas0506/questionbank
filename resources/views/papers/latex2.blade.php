\documentclass[a4paper]{exam}
\renewcommand{\thepartno}{\arabic{partno}}
\qformat{\thequestiontitle \dotfill \thepoints}
\renewcommand\partshook{\hspace{2em}}

\usepackage{amsfonts}
\usepackage{mathrsfs}
\usepackage{amsmath}
\usepackage{adjustbox}
\usepackage{multicol}
\usepackage[left=1cm,right=1cm,top=1cm,bottom=1cm,{{$orientation }}]{geometry}
\usepackage{polyglossia}
\usepackage{fontspec}
\usepackage{bidi}
\setmainlanguage{english}
\setotherlanguage{urdu}
\setmainfont{Jameel Noori Nastaleeq.ttf}[Path=/var/www/suoni/public/latex/]
\begin{document}
\begin{multicols}{2}
\begin{questions}
@for($i = 1; $i <= 2 ; $i++)
 
{{-- \hrule
\vspace{2mm}
Makrs : {{ $test->totalMarks() }} \hfill Time : {{$test->getDuration()}}
\vspace{2mm}
\hrule
\vspace{5mm} --}}

@foreach($test->questions()->mcqs()->get() as $testQuestion)
    \titledquestion{Encircle the correct option}[{{$testQuestion->mcqs()->count()}}]
    @if($testQuestion->parts->count()==$testQuestion->necessary_parts)
        All questions are compulsory
    @else
        Answer any {{$testQuestion->necessary_parts}} questions
    @endif
    \begin{parts}
    @foreach($testQuestion->parts as $part)
    
        @if(Helper::hasUrdu($part->question->question)) \begin{RTL} @endif
        \part
        {!! Helper::parseTex($part->question->question) !!}\\
            \begin{oneparchoices}
                \choice {!! Helper::parseTex($part->question->mcq->option_a) !!}
                \choice {!! Helper::parseTex($part->question->mcq->option_b) !!}
                \choice {!! Helper::parseTex($part->question->mcq->option_c) !!}
                \choice {!! Helper::parseTex($part->question->mcq->option_d) !!}
            \end{oneparchoices}
        @if(Helper::hasUrdu($part->question->question)) \end{RTL} @endif
    @endforeach
    \end{parts}
@endforeach
@foreach($test->questions()->short()->get() as $testQuestion)
    \titledquestion{Q.2 Answer the following. (any 4 questions) }[8]
    \begin{parts}
    @foreach($testQuestion->parts as $part)
    @if(Helper::hasUrdu($part->question->question)) \begin{RTL} @endif
        \part
        {!! Helper::parseTex($part->question->question)!!}\\
    @if(Helper::hasUrdu($part->question->question)) \end{RTL} @endif
    @endforeach
    \end{parts}
@endforeach
@foreach($test->questions()->long()->get() as $testQuestion)
\titledquestion{Q.3 Answer the following. (any 2 questions) }[10]
    \begin{parts}
    @foreach($testQuestion->parts as $part)
        @if(Helper::hasUrdu($part->question->question)) \begin{RTL} @endif
        \part
        {!! Helper::parseTex($part->question->question)!!}\\
        @if(Helper::hasUrdu($part->question->question)) \end{RTL} @endif
    @endforeach
    \end{parts}
@endforeach
\columnbreak

@endfor
\end{questions}
\end{multicols}
\end{document}
