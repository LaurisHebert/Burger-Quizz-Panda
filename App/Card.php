<?php

namespace Panda\BgQuiz\objects;
class Card
{
    public int $id;
    public string $question;
    public array $answers;

    public function __construct(array $question, array $answers)
    {
        $this->id = $question['id'];
        $this->question = $question['question'];
        $this->answers = $answers;
    }
}