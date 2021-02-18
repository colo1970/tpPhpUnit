<?php 

namespace App\Entity;

use App\Entity\Scorer;

class Question
{
     private $output;
     private $questions = [];
     private $scorer;
     public function __construct(Output $output, Scorer $scorer)
     {
         $this->output = $output;
         $this->scorer  = $scorer;
     }

     public function getCountQuestions()
     {
         return 10;
     }

     public function saveAs($name)
     {
        $save = $this->output->save($name, $this->questions);
        if($save && $this->scorer){
            $this->scorer->update();
        }
        return $save;
     }
}