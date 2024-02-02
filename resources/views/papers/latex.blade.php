\documentclass[a4paper]{exam}
\renewcommand{\thepartno}{\arabic{partno}}
\qformat{\thequestiontitle \dotfill \thepoints}


\usepackage{amsfonts}
\usepackage{mathrsfs}
\usepackage{amsmath}
\usepackage{adjustbox}
\usepackage[left=1cm,right=1cm,top=1cm,bottom=1cm]{geometry}

\begin{document}

\begin{center}
\fbox{\fbox{\parbox{5.5in}{\centering
Answer the questions in the spaces provided. If you run out of room
for an answer, continue on the back of the page.}}}
\end{center}
\hrule
\vspace{2mm}
Makrs : {{ $test->totalMarks() }} \hfill Time : {{$test->getDuration()}}
\vspace{2mm}
\hrule
\vspace{5mm}


\begin{questions}
@foreach ($test->questions as $tetQuestion)
    @if ($tetQuestion->question_type == "mcq")
        \titledquestion{Encircle the correct option. Answer any 3 questions}[{{$tetQuestion->mcqs()->count()}}]
        \begin{parts}
        @foreach($tetQuestion->mcqs()->get() as $qeuestion)
            @foreach($qeuestion->parts as $part)
                \part
                {!! str_replace("&","\&",str_replace("_", "\_", $part->question->question))!!}\\
                    \begin{oneparchoices}
                        \choice {!! str_replace("&","\&",$part->question->mcq->option_a) !!}
                        \choice {!!str_replace("&","\&",$part->question->mcq->option_b)!!}
                        \choice {!!str_replace("&","\&",$part->question->mcq->option_c)!!}
                        \choice {!!str_replace("&","\&",$part->question->mcq->option_d)!!}
                    \end{oneparchoices}
            @endforeach
        @endforeach
        \end{parts}
    @elseif ($tetQuestion->question_type == "short")
        \question
        \begin{parts}
        @foreach($tetQuestion->short()->get() as $qeuestion)
            @foreach($qeuestion->parts as $part)
                \part
                {!! str_replace("&","\&",str_replace("_", "\_", $part->question->question))!!}\\
            @endforeach
        @endforeach
        
        \end{parts}
    @elseif ($tetQuestion->question_type == "long")
        \question
        \begin{parts}
        @foreach($tetQuestion->long()->get() as $qeuestion)
            @foreach($qeuestion->parts as $part)
                \part
                {!! str_replace("&","\&",str_replace("_", "\_", $part->question->question))!!}\\
            @endforeach
        @endforeach
        
        \end{parts}
    @endif
@endforeach
\end{questions}
\end{document}
