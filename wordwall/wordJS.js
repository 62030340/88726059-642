function formValidation() {
  var uword = document.registform.userword;
  if (validateUserWord(uword, 5)) {
    if (allLetter(uword)) {
      if (gogame(uword)) {
        if (rand()) {
        }
      }
    }
  }
  return false;
}

function validateUserWord(uword, numwork) {
  var error = "";
  var illegalChars = /\W/; //allow letters, numbers, underscores

  if (uword.value == "") {
    uword.style.background = "Yellow";
    error = "กรุณาป้อน  ตัวอักษร \n";
    alert(error);
    uword.focus();
    return false;
  } else if (uword.value.length != numwork) {
    uword.style.background = "Yellow";
    error = " ตัวอักษร ต้องมีความยาวเท่ากับ " + numwork + " ตัวอักษร\n";
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




const game_vocabulary = ["ABOUT","ABOVE","ABUSE","ADAPT","ADMIT","ADMIN","AGAIN","AGENT","ALIGN","ALIKE"];
        const random_game_vocabulary = game_vocabulary[Math.floor(Math.random() * game_vocabulary.length)];
        
        document.getElementById('userword').focus();



function gogame() { console.log(random_game_vocabulary);
    let text = "";
    
document.getElementById("SHOW").innerHTML = text; // คำตอบ
    n = document.getElementById('userword').value;
    h = document.getElementById('hist'); 
    
    let text1 = "";
    for (let i = 0; i < 5; i++) {
    // h.innerHTML +=" " + game_vocabulary2.slice(i, i+1) + "| " ;  
}h.innerHTML += "<br>"   ; 
    for (let i = 0; i < 5; i++) {
        let game_vocabulary2 = n ;
        let game_vocabulary_CK = random_game_vocabulary;
        let game_Chek = "____"; 
        let game_HAVE = "!"; 
        let game_NO = "*";
        // console.log(game_vocabulary2.slice(i, i+1));
        // console.log(game_vocabulary_CK.slice(i, i+1));
        if (random_game_vocabulary.includes(game_vocabulary2.slice(i, i+1))  ){ 
            if (game_vocabulary2.slice(i, i+1) == game_vocabulary_CK.slice(i, i+1)) {
                game_Chek = game_vocabulary2.slice(i, i+1);
                
            }else{game_Chek = game_vocabulary2.slice(i, i+1)+game_HAVE}
        
         }
         else{game_Chek = game_vocabulary2.slice(i, i+1)+game_NO}
    h.innerHTML +=  " | "+ game_Chek + "| "  ;  
}   // h.innerHTML += "<br>"   ;  


result = document.getElementById('result');
if (n != random_game_vocabulary  ){ result.innerHTML = "<p>ใกล้แล้วอีกนิดเดียว</p>"; } 
            // if(random_game_vocabulary.includes(n) ){ result.innerHTML = "<p>มี</p>";  }
            if(n == random_game_vocabulary){result.innerHTML = "<p> YOU WIN </p>";}
            // if( RUNGAME > 4){result.innerHTML = "<p> YOU LOSE </p>";
            

}

function rand(){
  // const game_vocabulary = ["ABOUT","ABOVE","ABUSE","ADAPT","ADMIT","ADMIN","AGAIN","AGENT","ALIGN","ALIKE"];
  // const random_game_vocabulary = game_vocabulary[Math.floor(Math.random() * game_vocabulary.length)];
  // document.getElementById('userword').focus();
  text =4;
  document.getElementById("myTable").innerHTML = " ";
  var x = document.createElement("userword");
  var ran = new Array();
  var num = new Array();

  for (i=1;i<=text;i++){
      rn = game_vocabulary[Math.floor(Math.random() * game_vocabulary.length)];
      ran[i] = rn;
      num[i] = 1 ;
          for(j=1;j<=i-1;j++){
              if(ran[i] == ran[j]){ 
                  num[i] += 1 ;
                  ran[j] = " ";
                  num[j] = " ";
              } 
          }      
  }
  for ( i=0;i<=text;i++){
    
      var y = document.createElement("TR");
          for ( j=1;j<=5;j++){
              var z = document.createElement("TH");

              if(j==1){
                  if(i==0){
                      z.innerHTML = "A" + i ;
                      y.appendChild(z);
                      x.appendChild(y);}
                  else{
                      z.innerHTML ="B" + i ;
                      y.appendChild(z);
                      x.appendChild(y); 
                  }
              }
              if(j==2){
                if(i==0){
                    z.innerHTML = "A2" + i ;
                    y.appendChild(z);
                    x.appendChild(y);}
                else{
                    z.innerHTML ="B2" + i ;
                    y.appendChild(z);
                    x.appendChild(y); 
                }
             }
             if(j==1){
              if(i==0){
                  z.innerHTML = "A" + i ;
                  y.appendChild(z);
                  x.appendChild(y);}
              else{
                  z.innerHTML ="B3" + i ;
                  y.appendChild(z);
                  x.appendChild(y); 
              }
          }
          if(j==2){
            if(i==0){
                z.innerHTML = "A4" + i ;
                y.appendChild(z);
                x.appendChild(y);}
            else{
                z.innerHTML ="B4" + i ;
                y.appendChild(z);
                x.appendChild(y); 
            }
         }
            
              else{
                  if(i==0){
                      z.innerHTML ="C" + i ;
                      y.appendChild(z);
                      x.appendChild(y);}
                  else{
                      z.innerHTML = "D" + i ;
                      y.appendChild(z);
                      x.appendChild(y); 
                  }
              }
          }
  }console.log(game_vocabulary.slice(i, i+1));
  document.getElementById("myTable").appendChild(x);
}

function NewGame(){
  document.getElementById('SHOW').value ="";
  document.getElementById('hist').innerHTML ="";
  document.getElementById('result').innerHTML  ="";
  document.getElementById('result').innerHTML  ="";
  
  onClick="return formValidation()";
}

function myFunction() {
  n = document.getElementById('userword').value;
  for (i=1;i<=5;i++){
    
    var x = document.createElement("TABLE");
    x.setAttribute("userword", "myTable");
    document.body.appendChild(x);

    var y = document.createElement("TR");
    y.setAttribute("userword", "myTable");
    document.getElementById("myTable").appendChild(y);

    var z = document.createElement("TD");
    var t = document.createTextNode(n.slice(i-1, i));
    z.appendChild(t);
    document.getElementById("myTable").appendChild(z);
    
}

}