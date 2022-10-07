<?php
namespace Panda\BgQuiz\Utils\game;

require_once '../App/Card.php';
require_once 'Database/Database.php';

use Panda\BgQuiz\objects\Card;
use Panda\BgQuiz\Utils\Database\PdoDb;

class Quiz
{
    private array $cards;
    private int $score= 0;

    public function __construct()
    {
            $this->bdd = new PdoDb();
            $this->buildCard();
    }


    /**
     * @return void
     * La fonction récupère 6 questions aléatoire
     *
     * Pour chaque questions, les réponses associé
     *
     * Place dans un Array "fiches" des objets "fiche" contentant une question et les réponses associer
     */
    private function buildCard(): void
    {
        $questions = $this->bdd->request('*', 'question', false, '', '', true, 'RAND()', 'DESC', true, 6);

        foreach ($questions as $question) {
            $answers = $this->bdd->request('id, answer', 'answer', true, 'question_id', $question['id']);
            $this->cards[] = new Card($question, $answers);
        }
    }


    /**
     * @param int $id_answer
     * ID de la réponse à vérifier
     *
     * @return void
     * augmente le score à chaque bonnes réponses
     */
    public function verification(int $id_answer): void
    {
        $answer = $this->bdd->request('answer_check','answer', true,'id', $id_answer);
        if ($answer === 1){
            $this->score++;
        }
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }
    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }
}