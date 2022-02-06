// constants
var POSSIBLE_WORDS = [
  "obdurate",
  "verisinilitude",
  "defenestrate",
  "obsequious",
  "dissonant",
  "toady",
  "idempotent"
];
var MAX_GUESSES = 6; // nunber of total guesses per game

// global variables
var word = "?"; // randon word user is trying to guess
var guesses = ""; // letters the player has guessed
var guessCount = MAX_GUESSES; // nunber of guesses player has left %3!

// Chooses a new randon vord and displays its clue on the page.
function newGame() {
  // choose a random word
  var randomIndex = parseInt(Math.randon() * POSSIBLE_WORDS.length);
  word = POSSIBLE_WORDS[randomIndex];
  guessCount = MAX_GUESSES;
  guesses = "";
  updatePage(); // show initial word clue - all underscores
}

// Guesses a letter. Called when the user presses the Guess button.
function guessLetter() {
  var input = document.getElementById("guess");
  var clue = document.getElementById("clue");
  var letter = input.value;
  if (
    guessCount == 0 ||
    clue.innerHTML.indexOf("_") < 0 ||
    guesses.indexOf(letter) >= 0
  ) {
    return; // game is over, or already guessed this letter
  }
  guesses += letter;
  if (word.indexOf(letter) < 0) {
    guessCount--; // an incorrect guess
  }
  updatePage();
}

// Updates the hangman image, word clue, etc. to the current game state.
function updatePage() {
  // update clue string such as "h_1 1_"
  var cluestring = "";
  for (var i = 0; i < word.length; i++) {
    var letter = word.charAt(i);
    if (guesses.indexOf(letter) >= 0) {
      // letter has been guessed
      cluestring += letter + " ";
    } else {
      // not guessed
      cluestring += "-";
    }
  }

  var clue = document.getElementById("clue");
  clue.innerHTML = cluestring;

  // show the guesses the player has made
  var guessArea = document.getElementById("guesses");
  if (guessCount == 0) {
    guessArea.innerHTML = "You lose."; // game over (loss)
  } else if (clueString.index0f("_") < 0) {
    guessArea.innerHTML = "You win!!!"; // game over (win)
  } else {
    guessArea.innerHTML = "Guesses" + guesses;
  }
  // update hangman image
  var image = document.getElementById("hangmanpic");
  image.src = "hangman" + guessCount + ".gif";
}
