function formGAME() {
  var uword = document.registform.userword;
  if (validateUserWord(uword, 5)) {
    if (allLetter(uword)) {
      if (mycount(5)) {
        if (PLAY(uword)) {
        }
      }
    }
  }
  return false;
}

function validateUserWord(uword, numword) {
  var error = "";
  var illegalChars = /\W/;

  if (uword.value == "") {
    uword.style.background = "Yellow";
    error = "กรุณาป้อน  ตัวอักษร \n";
    alert(error);
    uword.focus();
    return false;
  } else if (uword.value.length != numword) {
    uword.style.background = "Yellow";
    error = " ตัวอักษร ต้องมีความยาวเท่ากับ " + numword + " ตัวอักษร\n";
    alert(error);
    uword.focus();
    return false;
  } else if (illegalChars.test(uword.value)) {
    uword.style.background = "Yellow";
    error = "ตัวอักษร มีตัวอักษรที่ไม่ได้รับอนุญาต\n";
    alert(error);
    uword.focus();
    return false;
  } else {
    uword.style.background = "White";
  }
  return true;
}

function allLetter(uword) {
  var letters = /^[A-Z]+$/;
  if (uword.value.match(letters)) {
    return true;
  } else {
    uword.style.background = "Yellow";
    alert(" ต้องเป็นตัวอักษร ตัวใหญ่ เท่านั้น");
    uword.focus();
    return false;
  }
}

const vocab = [
  "ABOUT",
  "ABOVE",
  "ABUSE",
  "ADAPT",
  "ADMIT",
  "ADMIN",
  "AGAIN",
  "AGENT",
  "ALIGN",
  "ALIKE",
];

const random_vocab = vocab[Math.floor(Math.random() * vocab.length)];

var count = 0;
function mycount() {
  sh = document.getElementById("show");
  count += 1;
  check = document.getElementById("userword").value;
  OVERGAME = document.getElementById("OVERGAME");
  if (count < 6) {
    if (check == random_vocab) {
      WIN = " YOU WIN !!! \n";
      alert(WIN);
    } else {
      AGAIN = " AGAIN ลองอีกครั้ง !!! \n";
      alert(AGAIN);
    }
  } else {
    if (count == 6) {
      sh.innerHTML = "<p> จบเกมคุณแพ้ เริ่มเกมใหม่อีกครั้ง</p>";
      LOSE = " YOU LOSE !!! \n";
      alert(LOSE);
    } else {
      sh.innerHTML = "<p> เริ่มเกมใหม่อีกครั้ง</p>";
      LOSE = " NEW GAME !!! \n";
      alert(LOSE);
      location.reload();
      
    }
  }
  return true;
}

function PLAY() {
  console.log(random_vocab);

  for (i = 0; i < 5; i++) {
    h = document.getElementById("hist");
    get_kum = document.getElementById("userword").value;
    SHOW = " ";
    console.log(get_kum.slice(i, i + 1));

    if (random_vocab.includes(get_kum.slice(i, i + 1))) {
      if (get_kum.slice(i, i + 1) == random_vocab.slice(i, i + 1)) {
        SHOW = get_kum.slice(i, i + 1);
      } else {
        SHOW = get_kum.slice(i, i + 1) + "?";
      }
    } else {
      SHOW = get_kum.slice(i, i + 1) + " ! ";
    }

    h.innerHTML += " [ " + SHOW + " ] ";
  }
  h.innerHTML += "<br>";

  result = document.getElementById("result");
  check = document.getElementById("userword").value;

  if (check == random_vocab) {
    result.innerHTML = "<p> YOU WIN </p>";
  } else {
    result.innerHTML = "<p>ลองอีกครั้ง</p>";
  }
}

function NEW() {
  location.reload();
}
