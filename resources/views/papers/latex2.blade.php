\documentclass{article}
\usepackage{amsfonts}
\usepackage{mathrsfs}


\begin{document}
@foreach ($test->questions as $question)
@if ($question->question_type == "mcq")
@foreach($question->mcqs()->get() as $q)
@foreach($q->parts as $part)
{!! str_replace("&","\&",str_replace("_", "\_", $part->question->question))!!}
{!! str_replace("&","\&",$part->question->mcq->option_a) !!}
{!!str_replace("&","\&",$part->question->mcq->option_b)!!}
{!!str_replace("&","\&",$part->question->mcq->option_c)!!}
{!!str_replace("&","\&",$part->question->mcq->option_d)!!}
@endforeach
@endforeach
@endif
@endforeach
\end{document}
