
var holes = document.querySelectorAll('.hole');
var scoreBoard = document.querySelector('.score');
var pauseError = document.querySelector('.pause-error');
var moles = document.querySelectorAll('.mole');

var startButton = document.querySelector('[data-action="startGame"]');

startButton.addEventListener('click', function () {
    startGame();
});

moles.forEach(function(mole){
    mole.addEventListener("click", addScore);
});

var game = null;

// Start the game
function startGame() {
    startButton.disabled = true;

    var max = moles.length,
        range = [250, 695],
        random,
        last;

    game = setInterval(function(){
              upTime = Math.floor(Math.random() * (range[0] - range[1])) + range[1];
              do {
                  random = Math.floor(Math.random() * (max - 0)) + 0;
              } while (random === last);

              holes[random].classList.toggle("up");

              setTimeout(function(){
                  holes[random].classList.toggle("up");
              }, upTime);

              last = random;

          }, 700);
}

var score = 0;

// Add score to total and display score
function addScore() {
    score ++;
    scoreBoard.innerHTML = score;
}

window.addEventListener('blur', pauseGame);

// Pause if window is blurred
function pauseGame() {
    startButton.disabled = false;
    clearInterval(game);
}
