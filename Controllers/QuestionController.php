<?php

namespace app\Controllers;

use app\Core\Controller;
use app\Core\Validation;
use app\Models\Question;
use app\Models\User;

class QuestionController extends Controller
{

    public Question $question;
    public function __construct()
    {
        parent::__construct();
        $this->question = new Question();
    }

    public function showQuestions()
    {
        $questions = $this->question->select()->fetchAll();
        $this->render->view('questions.questions',['questions' => $questions]);
    }

    public function addQuestion()
    {
        $this->render->view('questions.addQuestion');
    }

    public function postQuestion()
    {
        $question = $_POST['question'];
        $question = (new Validation)->validate($question,['min:5']);
        if(!empty($question->errors))
        {
            $this->render->view('questions.addQuestion',['dashAlert' => ['type' => 'danger', 'message' => reset($question->errors)]]);
           exit();
        }
        $this->question->insert(
           ['question' => $question->input,
                  'user_id' => $_SESSION['id']
          ])->exec();
        header( "refresh:3;url=/dashboard" );

        $this->render->view('questions.addQuestion',['dashAlert' => ['type' => 'success', 'message' => 'Question added successfully, Forwarding to all question page' ]]);

    }

}