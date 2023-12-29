<?php

namespace Database\Seeders;

use App\Models\Mcq;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Question::create([
            'question' => 'What is computer?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Define software',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is hardware?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Differentiate between hardware and software',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Define system software',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'List the types of system software',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Define application software',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is printer?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is an impact printer',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What non-impact printer?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Discuss laser printer',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'How does inkjet printer work?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Define network topology',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'How does star topology work?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'List two advantages of ring topology',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is the role of hub?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'List down network components',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is most common topolgy',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is disadvantge of star topology?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Draw star topology diagram',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Define network',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is workgroup computing?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What are network models?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Define client',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Define server',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'How does server work?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Give an example of client',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Discuss client-server architecture briefly',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'what is LAN?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Discuss WAN',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'List down types of networks',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is wi-fi?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Give two applications of computer in medical field',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'How does robot work?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is AI?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Define CAD',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Define CAM',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Differentiare between CAD and CAM',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is computer aided learning?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is B2B?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Define e-commerce',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'What is e-shopping?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'List down two e-commerce websites',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Can robot work better than human being?',
            'answer' => '',
            'question_type' => 'short',
            'marks' => '2',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 4,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain the main components of computer in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain the main components of computer in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain the types of printers in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain the types of impact printers in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain the types of non-impact printer in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain ring topology in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain star topology in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain bus topology in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain any three topologies in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain how star topolgy works. Also give its pros and cons',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain client-server model in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain network models in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Explain peer-to-peer model in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Discuss LAN components in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Discuss LAN protocols in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);
        Question::create([
            'question' => 'Discuss guided media in detail',
            'answer' => '',
            'question_type' => 'long',
            'marks' => '8',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => null,
            'user_id' => 1, //owner id
        ]);

        $mcq = Mcq::create([
            'option_a' => 'window',
            'option_b' => 'scanner',
            'option_c' => 'printer',
            'option_d' => 'plotter',
        ]);
        Question::create([
            'question' => '... is an example of software',
            'answer' => 'a',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'software',
            'option_b' => 'harware',
            'option_c' => 'window',
            'option_d' => 'network',
        ]);
        Question::create([
            'question' => 'Physical parts of computer are called ...',
            'answer' => 'a',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'driver',
            'option_b' => 'operating system',
            'option_c' => 'utility program',
            'option_d' => 'all',
        ]);
        Question::create([
            'question' => '... is an example of system software',
            'answer' => 'd',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'software',
            'option_b' => 'hardware',
            'option_c' => 'printer',
            'option_d' => 'plotter',
        ]);
        Question::create([
            'question' => 'A set of instructions refers to ...',
            'answer' => 'a',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'Information Technology',
            'option_b' => 'scanner',
            'option_c' => 'printer',
            'option_d' => 'plotter',
        ]);
        Question::create([
            'question' => 'IT stands for',
            'answer' => 'a',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'window',
            'option_b' => 'IT',
            'option_c' => 'printer',
            'option_d' => 'plotter',
        ]);
        Question::create([
            'question' => '... has converted world into global village',
            'answer' => 'b',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'laser printer',
            'option_b' => 'dot matrix',
            'option_c' => 'inkjet printer',
            'option_d' => 'thermal printer',
        ]);
        Question::create([
            'question' => '... is an example of impact printer',
            'answer' => 'b',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'software',
            'option_b' => 'scanner',
            'option_c' => 'printer',
            'option_d' => 'plotter',
        ]);
        Question::create([
            'question' => 'SDLC is a way to produce ...',
            'answer' => 'a',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'scanner',
            'option_b' => 'CRT',
            'option_c' => 'flat panel display',
            'option_d' => 'plotter',
        ]);
        Question::create([
            'question' => 'LCD is an example of ...',
            'answer' => 'c',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 1,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);

        $mcq = Mcq::create([
            'option_a' => 'network',
            'option_b' => 'toplogy',
            'option_c' => 'LAN',
            'option_d' => 'Wifi',
        ]);
        Question::create([
            'question' => 'Physical layout of network is called ...',
            'answer' => 'b',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);

        $mcq = Mcq::create([
            'option_a' => 'ring',
            'option_b' => 'star',
            'option_c' => 'mesh',
            'option_d' => 'bus',
        ]);
        Question::create([
            'question' => 'The most common topology is ...',
            'answer' => 'b',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'ring',
            'option_b' => 'star',
            'option_c' => 'mesh',
            'option_d' => 'bus',
        ]);
        Question::create([
            'question' => 'Which toplogy requires hub?',
            'answer' => 'b',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'ring',
            'option_b' => 'star',
            'option_c' => 'mesh',
            'option_d' => 'bus',
        ]);
        Question::create([
            'question' => 'Termainals are used in ...',
            'answer' => 'd',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'ring',
            'option_b' => 'star',
            'option_c' => 'mesh',
            'option_d' => 'bus',
        ]);
        Question::create([
            'question' => 'The term backbone is associated to ...',
            'answer' => 'd',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 2,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'router',
            'option_b' => 'bridge',
            'option_c' => 'NIC',
            'option_d' => 'http',
        ]);
        Question::create([
            'question' => 'Which is not a component of LAN? ',
            'answer' => 'd',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'LAN',
            'option_b' => 'MAN',
            'option_c' => 'WAN',
            'option_d' => 'VAN',
        ]);
        Question::create([
            'question' => 'Which covers countrywide area? ',
            'answer' => 'c',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'LAN',
            'option_b' => 'MAN',
            'option_c' => 'WAN',
            'option_d' => 'VAN',
        ]);
        Question::create([
            'question' => 'Which is not a LAN protocol? ',
            'answer' => 'd',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'router',
            'option_b' => 'bridge',
            'option_c' => 'NIC',
            'option_d' => 'gateway',
        ]);
        Question::create([
            'question' => 'Which device etends a LAN?',
            'answer' => 'b',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'router',
            'option_b' => 'bridge',
            'option_c' => 'NIC',
            'option_d' => 'http',
        ]);
        Question::create([
            'question' => 'Which device tells data packets the best route?',
            'answer' => 'a',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'router',
            'option_b' => 'bridge',
            'option_c' => 'NIC',
            'option_d' => 'gateway',
        ]);
        Question::create([
            'question' => ' ... ensures communication between two different procols. ',
            'answer' => 'd',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'text',
            'option_b' => 'packets',
            'option_c' => 'words',
            'option_d' => 'bytes',
        ]);
        Question::create([
            'question' => 'Message is broken into ... ',
            'answer' => 'b',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'LAN',
            'option_b' => 'WAN',
            'option_c' => 'MAN',
            'option_d' => 'VAN',
        ]);
        Question::create([
            'question' => 'Which covers citywide network? ',
            'answer' => 'c',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
        $mcq = Mcq::create([
            'option_a' => 'protocol',
            'option_b' => 'software',
            'option_c' => 'program',
            'option_d' => 'hardware',
        ]);
        Question::create([
            'question' => 'Set of rules for communication refers to ... ',
            'answer' => 'a',
            'question_type' => 'mcq',
            'marks' => '1',
            'is_approved' => 1,
            'bise_frequency' => 3,
            'is_from_exercise' => 1,
            'chapter_id' => 3,
            'mcq_id' => $mcq->id,
            'user_id' => 1, //owner id
        ]);
    }
}
