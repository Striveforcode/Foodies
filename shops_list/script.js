let swiper1 = new Swiper('.swiper1', {
    // loop: true,
    pagination: {
        el: '.swiper-pagination1',
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var btn = document.querySelector('.btn1');
var timeoutId;

btn.addEventListener('mouseover', function() {
  timeoutId = setTimeout(function() {
    btn.innerHTML = '<span>Do You want to become Host</span>';
  }, 200); 
});

btn.addEventListener('mouseout', function() {
  clearTimeout(timeoutId);
  btn.innerHTML = '<i class="fa fa-plus"></i><span>Host</span>';
});