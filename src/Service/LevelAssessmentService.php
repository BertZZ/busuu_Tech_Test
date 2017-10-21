<?php

namespace Busuu\Service;

class LevelAssessmentService implements LevelAssessmentServiceInterface
{
    /**
     * @param array $exercises
     * @return string|bool
     */
    public $currentLevel = 0;
    public $numberOfExercises = 0;
    public $points = 0;
    public $minimumNumberOfExercises = 6;
    public $levelHistory = array();
    public $levels = array("A1", "A2", "B1", "B2", "C1", "C2");


    public function calculateLevel(array $exercises)
    {
      /** Evaluate exercises function
      */
        $length = count($exercises);
        echo $length;
        if($length < $this->minimumNumberOfExercises) {
          return false;
        } else {
          return $this->levels[$this->currentLevel];
    }
  }

    public function evaluateExercises(array $exercises)
    {
      foreach($exercises as $exercise){
        ++$this->numberOfExercises;
      }
    }
}
