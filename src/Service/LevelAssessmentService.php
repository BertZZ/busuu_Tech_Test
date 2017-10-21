<?php

namespace Busuu\Service;

class LevelAssessmentService implements LevelAssessmentServiceInterface
{
    /**
     * @param array $exercises
     * @return string|bool
     */
    public $currentLevel = 0;
    public $levelHistory = array();
    public $levels = array("A1", "A2", "B1", "B2", "C1", "C2");


    public function calculateLevel(array $exercises)
    {
        return $this->levels[$this->currentLevel];
    }
}
