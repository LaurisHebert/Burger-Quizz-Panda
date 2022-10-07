console.log(cardsJSON);
console.log(scoreJSON);


let d = document;
let startButton = d.querySelector('#start')

let emptyCard = d.querySelector('#questionCard')

let spaceForQuestion = d.querySelector('#emptyQuestionSlot')
let spaceForResponses = d.querySelector('#emptyAnswerSlot')

let answers = d.querySelectorAll('.btn-check')

startButton.addEventListener('click', evt => {
    startButton.classList.add('d-none')
    emptyCard.classList.remove('d-none')
    writingCard(cardsJSON)
})

function writingCard(fiches) {
    fiches.forEach(fiche => {
        let i = 0;
        spaceForQuestion.innerHTML = fiche.question + ' ?';
        // reset du cadre de réponse
        spaceForResponses.innerHTML = '';
        // pour chaque réponse proposer, crée une cellule contenant la réponse
        fiche.answers.forEach(answer => {
            i++
            spaceForResponses.innerHTML += '<input type="radio" class="btn-check" name="btnradio" id="'+answer.id+'" autoComplete="off"> '
                + '<label class="btn btn-outline-primary" for="'+answer.id+'">' + answer.answer + '</label>';
        })
        waiting_answer(fiche)
    })
}
function waiting_answer(fiche) {
    answers.forEach(answer => answer.addEventListener('click', evt => {
    }))
}

