var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
    },
  });
$(document).ready(function(){
    $('#city-select1').niceSelect();
    $('#city-select2').niceSelect();
    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      if ($(window).width() <= 992){
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    } 
    });
  }
  $("#calendar").datepicker({
    monthNames: ['Январь', 'Февраль', 'Март', 'Апрель',
   'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь',
   'Октябрь', 'Ноябрь', 'Декабрь'],
    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
    firstDay: 1,
    showOtherMonths: true,
    dateFormat: "dd.mm.yy",
   });
})