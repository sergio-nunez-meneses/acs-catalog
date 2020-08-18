
//politics, economy, sport, culture,

// const generi_ = ["politics", "economy", "sport", "culture"];
//
// const selezione = (() => {
//   switch(genere_){
//     case generi_[0]:
//     let genere_ = generi_[0];
//     case generi_[1]:
//     let genere_ = generi_[1];
//     case generi_[2]:
//     let genere_ = generi_[2];
//     case generi_[3]:
//     let genere_ = generi_[3];
//   };
// });

const BTN = document.querySelectorAll(".btn");

const ECONOMY = document.querySelectorAll(".economy");
const SPORT = document.querySelectorAll(".sport");
const CULTURE = document.querySelectorAll(".culture");
const POLITICS = document.querySelectorAll(".politics");

for (let i = 0; i < BTN.length; i++) {
  BTN[i].addEventListener('click', () =>{
    if (BTN[i].id === 'sport') {
      for (var j = 0; j < ECONOMY.length; j++) {
        ECONOMY[j].style.display = 'none';
      }
      for (var k = 0; k < CULTURE.length; k++) {
        CULTURE[k].style.display = 'none';
      }
      for (var l = 0; l < POLITICS.length; l++) {
        POLITICS[l].style.display = 'none';
      }
    }
  });
}
