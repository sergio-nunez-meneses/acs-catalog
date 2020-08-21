// const REPLACE_BTN = getId('replaceBtn');
//
// function replaceWord() {
//   const MATCH = getName('matchWord')[0].value,
//     REPLACE = getName('replaceWord')[0].value,
//     CASE = getId('case').value;
//   let text = getId('replaceText').innerHTML,
//     pattern = new RegExp(MATCH, CASE),
//     result = text.replace(pattern, REPLACE);
//
//   getId('replaceText').innerHTML = result;
// }
//
// REPLACE_BTN.addEventListener('click', replaceWord);

const BTN = document.querySelectorAll(".btn");

const ALL_CATEGORIES = document.querySelectorAll(".all_categories");
const ECONOMY = document.querySelectorAll(".economy");
const SPORT = document.querySelectorAll(".sport");
const CULTURE = document.querySelectorAll(".culture");
const POLITICS = document.querySelectorAll(".politics");

const generi_ = ["politics", "economy", "sport", "culture", "all_categories"];

for (let i = 0; i < BTN.length; i++) {

  BTN[i].addEventListener('click', () => {
    if (BTN[i].id === generi_[0]) {
      for (var j = 0; j < ECONOMY.length; j++) {
        ECONOMY[j].style.display = 'none';
      }
      for (var k = 0; k < CULTURE.length; k++) {
        CULTURE[k].style.display = 'none';
      }
      for (var l = 0; l < SPORT.length; l++) {
        SPORT[l].style.display = 'none';
      }
      for (var o = 0; o < POLITICS.length; o++) {
        POLITICS[o].style.display = 'block';
      }
    }
    else if(BTN[i].id === generi_[1]){
      for (var j = 0; j < POLITICS.length; j++) {
        POLITICS[j].style.display = 'none';
      }
      for (var k = 0; k < CULTURE.length; k++) {
        CULTURE[k].style.display = 'none';
      }
      for (var l = 0; l < SPORT.length; l++) {
        SPORT[l].style.display = 'none';
      }
      for (var o = 0; o < ECONOMY.length; o++) {
        ECONOMY[o].style.display = 'block';
      }
    }
    else if(BTN[i].id === generi_[2]){
      for (var j = 0; j < POLITICS.length; j++) {
        POLITICS[j].style.display = 'none';
      }
      for (var k = 0; k < CULTURE.length; k++) {
        CULTURE[k].style.display = 'none';
      }
      for (var l = 0; l < ECONOMY.length; l++) {
        ECONOMY[l].style.display = 'none';
      }
      for (var o = 0; o < SPORT.length; o++) {
        SPORT[o].style.display = 'block';
      }
    }
    else if(BTN[i].id === generi_[3]){
      for (var j = 0; j < POLITICS.length; j++) {
        POLITICS[j].style.display = 'none';
      }
      for (var k = 0; k < SPORT.length; k++) {
        SPORT[k].style.display = 'none';
      }
      for (var l = 0; l < ECONOMY.length; l++) {
        ECONOMY[l].style.display = 'none';
      }
      for (var o = 0; o < CULTURE.length; o++) {
        CULTURE[o].style.display = 'block';
      }
    }
    else if(BTN[i].id === generi_[4]){
      for (var j = 0; j < POLITICS.length; j++) {
        POLITICS[j].style.display = 'block';
      }
      for (var k = 0; k < SPORT.length; k++) {
        SPORT[k].style.display = 'block';
      }
      for (var l = 0; l < ECONOMY.length; l++) {
        ECONOMY[l].style.display = 'block';
      }
      for (var o = 0; o < CULTURE.length; o++) {
        CULTURE[o].style.display = 'block';
      }
    }
  })
}
