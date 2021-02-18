<?php 

namespace App\Tests;

use App\Entity\OutPut;
use Prophecy\Argument;
use App\Entity\Question;
use App\Entity\Scorer;
use PHPUnit\Framework\TestCase;

class QuestionTest extends TestCase
{
    public function testCountQuestion()
    {
        $output = $this->prophesize(OutPut::class);
        $score = $this->prophesize(Scorer::class);
        $question  = new Question($output->reveal(), $score->reveal());
        $this->assertSame(10, $question->getCountQuestions());
    }

    public function testSaveAs()
    {
        $output = $this->prophesize(OutPut::class);
        $score = $this->prophesize(Scorer::class);
        $score->update()->willReturn(true);
        $output->save(Argument::type('string'), [])->willReturn(true);
        $question = new Question($output->reveal(), $score->reveal());

        $this->assertTrue($question->saveAs('nom'));
    }
}