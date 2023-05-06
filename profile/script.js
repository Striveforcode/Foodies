let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});

searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
  sidebar.classList.toggle("open");
  menuBtnChange(); //calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
 }
}
// sidebar
// const links = document.querySelectorAll('.sidebar a');
// const pages = document.querySelectorAll('.page');

// links.forEach(link => {
// 	link.addEventListener('click', e => {
// 		e.preventDefault();

// 		pages.forEach(page => page.style.display = 'none');
// 		document.querySelector(link.getAttribute('href')).style.display = 'block';
// 	});
// });

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

$("#v-pills-tabContent button").click(function () {
  $("#form").toggleClass("view");
  $("input").each(function () {
    var inp = $(this);
    if (inp.attr("readonly")) {
      inp.removeAttr("readonly");
    } else {
      inp.attr("readonly", "readonly");
    }
  });
  $("textarea").each(function () {
    var inp = $(this);
    if (inp.attr("readonly")) {
      inp.removeAttr("readonly");
    } else {
      inp.attr("readonly", "readonly");
    }
  });
});
