<?php

require_once '../App/Utils/Quiz.php';
use Panda\BgQuiz\Utils\game\Quiz;
$quiz = new Quiz();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Burger-Quiz</title>
</head>
<body>
<?php include_once "../view/header.php"; ?>

<input class="card m-auto" type="button" id="start" value="Start">

<!-- Cards avec JS  -->
<div id="questionCard" class="card m-auto d-none" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            Question
        </h5>
        <p id='emptyQuestionSlot' class="card-text">

        </p>
    </div>
    <div class="list-group list-group-flush btn-group-vertical" role="group" aria-label="Basic radio toggle button group" id="emptyAnswerSlot">
    </div>
</div>
<!-- Cards avec Objet  -->
<?php /* foreach ($fiches as $test) {
    $i++?>
    <div id='question_<?= $i ?>' class="card m-auto d-none" style="width: 18rem;">
        <div class="card-body p-3 mb-2 bg-secondary text-white">
            <h5 class="card-title ">Question :</h5>
            <p class="card-text"><?= $test->question ?> ?</p>
        </div>
        <div class="list-group list-group-flush btn-group-vertical" role="group"
             aria-label="Basic radio toggle button group">
            <?php foreach ($test->answers as $answer) { ?>
                <input type="radio" class="btn-check" name="btnradio<?= $test->id ?>"
                       id="btnradio<?= $answer['id']?>" value="test"
                       autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio<?= $answer['id'] ?>"><?= $answer['answer'] ?></label>
            <?php } ?>
        </div>
    </div>
<?php } */?>
<!-- Cards avec tableaux  -->
<?php /*
    $radioName = 0;
    $radioNumber = 0;
    $letter = [ 'A', 'B', 'C', 'D' ];
    foreach ($questions as $question) {
    $i = 0 ?>
    <div id='question_<?= $question['id'] ?>' class="card m-auto d-none" style="width: 18rem;">
        <div class="card-body p-3 mb-2 bg-secondary text-white">
            <h5 class="card-title ">Question :</h5>
            <p class="card-text"><?= $question['question'] ?> ?</p>
        </div>
        <div class="list-group list-group-flush btn-group-vertical" role="group"
             aria-label="Basic radio toggle button group">
            <?php foreach ($answer as $fiche) { ?>
                <?php if ($question['id'] === $fiche['question_id']) { ?>
                    <input type="radio" class="btn-check" name="btnradio<?= $radioName ?>"
                           id="btnradio<?= $radioNumber ?>"
                           autocomplete="off" value="<?= $fiche['answer_check']?>">
                    <label class="btn btn-outline-primary"
                           for="btnradio<?= $radioNumber ?>">-<?= $letter[$i] ?>- <br><?= $fiche['answer'] ?>
                    </label>
                    <?php
                    $i++;
                    $radioNumber++;
                }
                ?>
                <?php
            }
            $radioName++;
            ?>
        </div>
    </div>
<?php } */ ?>

<?php include_once "../view/footer.php" ?>

<script>
    let cardsJSON = <?php try {echo json_encode($quiz->getCards(), JSON_THROW_ON_ERROR);} catch (JsonException $e) {} ?>;
    let scoreJSON = <?php try {echo json_encode($quiz->getScore(), JSON_THROW_ON_ERROR);} catch (JsonException $e) {} ?>;
</script>
<script src="quiz_fiche.js"></script>
</body>
</html>
