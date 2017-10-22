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
    public $levels = array("A1", "A2", "B1", "B2", "C1", "C2");


    public function calculateLevel(array $exercises)
    {
      /** Evaluate exercises function
      */
        $this->evaluateExercises($exercises);
        $length = count($exercises);
        if($length < $this->minimumNumberOfExercises) {
          return false;
        } else {
          return $this->levels[$this->currentLevel];
    }
  }

    public function evaluateExercises(array $exercises)
    {
      foreach($exercises as $exercise){
        if($exercise->isPassed()){
          $this->points++;
        }
          $this->countExercises();
          $this->changeLevel();
        }
      }

    public function countExercises()
    {
      if ($this->numberOfExercises == 3) {
        $this->numberOfExercises = 1;
      } else {
      $this->numberOfExercises++;
      }
    }


    public function changeLevel()
  {
    if ($this->numberOfExercises == 3) {
      if($this->points == 0 && $this->currentLevel > 0){
        $this->currentLevel--;
        $this->points = 0;
      } elseif ($this->points == 2) {
        $this->currentLevel++;
        $this->points = 0;
      } elseif ($this->points == 3 && $this->currentLevel < 4) {
        $this->currentLevel = $this->currentLevel + 2;
        $this->points = 0;
      } elseif ($this->points == 3 && $this->currentLevel = 4) {
        $this->currentLevel++;
        $this->points = 0;
      } else {
        $this->points = 0;
      }
    }
  }
}
