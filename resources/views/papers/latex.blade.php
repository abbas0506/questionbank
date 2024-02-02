\documentclass[a4paper]{exam}
\renewcommand{\thepartno}{\arabic{partno}}
\qformat{Question \thequestion \dotfill \thepoints}

\usepackage{amsfonts}
\usepackage{mathrsfs}
\usepackage{amsmath}
\begin{document}

\begin{center}
\fbox{\fbox{\parbox{5.5in}{\centering
Answer the questions in the spaces provided. If you run out of room
for an answer, continue on the back of the page.}}}
\end{center}

\vspace{5mm}
\makebox[0.75\textwidth]{Name and section:\enspace\hrulefill}

\vspace{5mm}
\makebox[0.75\textwidth]{Instructor’s name:\enspace\hrulefill}

\begin{questions}
@foreach ($test->questions as $tetQuestion)
    @if ($tetQuestion->question_type == "mcq")
        \question
        \begin{parts}
        @foreach($tetQuestion->mcqs()->get() as $qeuestion)
            @foreach($qeuestion->parts as $part)
                \part
                {{-- {!! str_replace("&","\&",str_replace("_", "\_", $part->question->question))!!}\\ --}}
                {!! str_replace("&","\&",str_replace("_", "\_", $part->question->question))!!}\\
                    \begin{oneparchoices}
                        \choice {!! str_replace("&","\&",$part->question->mcq->option_a) !!}
                        \choice {!!str_replace("&","\&",$part->question->mcq->option_b)!!}
                        \choice {!!str_replace("&","\&",$part->question->mcq->option_c)!!}
                        \choice {!!str_replace("&","\&",$part->question->mcq->option_d)!!}
                    \end{oneparchoices}
            @endforeach
        @endforeach
    @elseif ($tetQuestion->question_type == "short")
        \question
        \begin{parts}
        @foreach($tetQuestion->short()->get() as $qeuestion)
            @foreach($qeuestion->parts as $part)
                \part
                {!! str_replace("&","\&",str_replace("_", "\_", $part->question->question))!!}\\
            @endforeach
        @endforeach
    @elseif ($tetQuestion->question_type == "long")
        \question
        \begin{parts}
        @foreach($tetQuestion->long()->get() as $qeuestion)
            @foreach($qeuestion->parts as $part)
                \part
                {!! str_replace("&","\&",str_replace("_", "\_", $part->question->question))!!}\\
            @endforeach
        @endforeach
    @endif
@endforeach
\end{parts}

\end{questions}
\end{document}
