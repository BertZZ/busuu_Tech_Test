<?php

use Busuu\Entity\Exercise;
use Busuu\Service\LevelAssessmentService;
use PHPUnit\Framework\TestCase;

class AdditionalTests extends TestCase
{
  public function testNumberOfExercisesIncreases()
  {
    $placementTestService = new LevelAssessmentService();
    $placementTestService->evaluateExercises($this->exercisesDataProviderSet1());
    $result = $placementTestService->numberOfExercises;
    $this->assertEquals(3, $result);
  }

  private function exercisesDataProviderSet1(): array
  {
      return [
          (new Exercise())->setPassed(true),
          (new Exercise())->setPassed(true),
          (new Exercise())->setPassed(true),
      ];
  }
}
?>
