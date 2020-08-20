
//politics, economy, sport, culture,

const generi_ = ["politics", "economy", "sport", "culture", "all_categories"];
const BTN = document.querySelectorAll(".btn");

const ALL_CATEGORIES = document.querySelectorAll(".all_categories");
const ECONOMY = document.querySelectorAll(".economy");
const SPORT = document.querySelectorAll(".sport");
const CULTURE = document.querySelectorAll(".culture");
const POLITICS = document.querySelectorAll(".politics");


for (let i = 0; i < BTN.length; i++) {

  BTN[i].addEventListener('click', () =>{
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
        POLITICS[o].style.display = 'flex';
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
        ECONOMY[o].style.display = 'flex';
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
        SPORT[o].style.display = 'flex';
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
        CULTURE[o].style.display = 'flex';
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


// const action = (() => {
//   const generi_ = ["politics", "economy", "sport", "culture", "all_categories"];
//   const BTN = document.querySelectorAll(".btn");
//
//   const ALL_CATEGORIES = document.querySelectorAll(".all_categories");
//   const ECONOMY = document.querySelectorAll(".economy");
//   const SPORT = document.querySelectorAll(".sport");
//   const CULTURE = document.querySelectorAll(".culture");
//   const POLITICS = document.querySelectorAll(".politics");
//
//   for(let i = 0; i < BTN.length; i++){
//     const All_vnt = BTN[i].id === generi_[4];
//     const Eco_vnt = BTN[i].id === generi_[1];
//     const Pol_vnt = BTN[i].id === generi_[0];
//     const Sprt_vnt = BTN[i].id === generi_[2];
//     const Cult_vnt = BTN[i].id === generi_[3];
//     BTN[i].addEventListener('click', () => {
//
//       const Eco = (() => {for(let a=0; a < ECONOMY.length; a++){ECONOMY[a].style.display = "flex"}});
//       const EcoNo = (() => {for(let A=0; A < ECONOMY.length; A++){ECONOMY[A].style.display = "none"}});
//       const Spr = (() => {for(let b=0; b < ECONOMY.length; b++){ECONOMY[b].style.display = "flex"}});
//       const SprNo = (() => {for(let B=0; B < ECONOMY.length; B++){ECONOMY[B].style.display = "none"}});
//       const Cult = (() => {for(let c=0; c < ECONOMY.length; c++){ECONOMY[c].style.display = "flex"}});
//       const CultNo = (() => {for(let C=0; C < ECONOMY.length; C++){ECONOMY[C].style.display = "none"}});
//       const Pol = (() => {for(let d=0; d < ECONOMY.length; d++){ECONOMY[d].style.display = "flex"}});
//       const PolNo = (() => {for(let D=0; D < ECONOMY.length; D++){ECONOMY[D].style.display = "none"}});
//
//       if(All_vnt){
//         return(Eco());
//         return(Spr());
//         return(Cult());
//         return(Pol());
//         console.log("all");
//       }
//       else if(Pol_vnt){
//         return(EcoNo());
//         return(SprNo());
//         return(CultNo());
//         return(Pol());
//         console.log("pol");
//       }
//       else if(Eco_vnt){
//         return(Eco());
//         return(SprNo());
//         return(CultNo());
//         return(PolNo());
//       }
//       else if(Sprt_vnt){
//         return(EcoNo());
//         return(Spr());
//         return(CultNo());
//         return(PolNo());
//       }
//       else if(Cult_vnt){
//         return(EcoNo());
//         return(SprNo());
//         return(Cult());
//         return(PolNo());
//       }
//     })
//   }
//
// })
//
// action();
