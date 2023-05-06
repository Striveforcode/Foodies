const isloginpage=false;
  const ishomepage=false;
  const isprofile=false;
  const isHost=true;
  const isRegister=false;
  const isUpdateEvent=false;
  let eventImg;
  const textarea = document.getElementById("textarea-input");
const yesRadio = document.querySelector('input[value="yes"]');
const noRadio = document.querySelector('input[value="no"]');

  function imageSet(event) {
    eventImg=event.target.files[0];
  }
  
// yesRadio.addEventListener("click", function() {
//   textarea.style.display = "block";
// });

// noRadio.addEventListener("click", function() {
//   textarea.style.display = "none";
// });