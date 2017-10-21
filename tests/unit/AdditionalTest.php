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

  public function testNumberOfExercisesCountResetsAfter3()
  {
    $placementTestService = new LevelAssessmentService();
    $placementTestService->evaluateExercises($this->exercisesDataProviderSet2());
    $result = $placementTestService->numberOfExercises;
    $this->assertEquals(1, $result);
  }

  public function testAssignsPointsBasedOnNumberOfCorrectExercises()
  {
    $placementTestService = new LevelAssessmentService();
    $placementTestService->evaluateExercises($this->exercisesDataProviderSet1());
    $points = $placementTestService->points;
    $this->assertEquals(3, $points);
  }

  public function testRaisesLevelBasedOnPoints()
  {
    $placementTestService = new LevelAssessmentService();
    $placementTestService->evaluateExercises($this->exercisesDataProviderSet1());
    $level = $placementTestService->currentLevel;
    $this->assertEquals(2, $level);
  }

  private function exercisesDataProviderSet1(): array
  {
      return [
          (new Exercise())->setPassed(true),
          (new Exercise())->setPassed(true),
          (new Exercise())->setPassed(true),
      ];
  }

  private function exercisesDataProviderSet2(): array
{
    return [
        (new Exercise())->setPassed(true),
        (new Exercise())->setPassed(true),
        (new Exercise())->setPassed(true),
        (new Exercise())->setPassed(true),
    ];
  }
}
?>
