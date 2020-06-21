var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
    },
  });

$('#btn-nav').click(function () {
    if ($('.burger-item').hasClass('active')){
        $('.burger-item').removeClass('active');
    }else{
        $('.burger-item').addClass('active');}
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
    if ($(document).height() <= $(window).height())
        $("footer").addClass("fixed-bottom");


    $(".wan-spiner-adults").WanSpinner({
        maxValue:10,
        minValue:1,
    });
    $(".wan-spiner-children").WanSpinner({
        maxValue:10,
        minValue:0,
    });
    $("#pass").mask("9999-999999");
    $("#birthpass").mask("я-яя№999999")


    $("#calendar,#calendarbook1,#calendarbook2").datepicker({
    monthNames: ['Январь', 'Февраль', 'Март', 'Апрель',
   'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь',
   'Октябрь', 'Ноябрь', 'Декабрь'],
    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
    firstDay: 1,
    showOtherMonths: true,
    dateFormat: "dd.mm.yy",
   });

    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        weekHeader: 'Не',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);

    /* Локализация timepicker */
    $.timepicker.regional['ru'] = {
        timeOnlyTitle: 'Выберите время',
        timeText: 'Время',
        hourText: 'Часы',
        minuteText: 'Минуты',
        secondText: 'Секунды',
        millisecText: 'Миллисекунды',
        timezoneText: 'Часовой пояс',
        currentText: 'Сейчас',
        closeText: 'Закрыть',
        timeFormat: 'HH:mm',
        amNames: ['AM', 'A'],
        pmNames: ['PM', 'P'],
        isRTL: false
    };
    $.timepicker.setDefaults($.timepicker.regional['ru']);

    $(function(){
        $("#calendar1,#calendar2").datetimepicker();
    });


})
$('#registerPassenger').each(function () {
    $(this).validate({
        rules:{
            name1:"required",
            name2:"required",
            name3:"required",
            pass:"required",
            seat:"required",
        },
        messages:{
            name1:"Пожалуйста введите фамилию пассажира",
            name2:"Пожалуйста введите имя пассажира",
            name3:"Пожалуйста введите отчество пассажира",
            pass:"Пожалуйста введите номер документа",
            seat:"Пожалуйста выберите место для пассажира"
        },
        errorElement: "label",
        errorClass: "error",
        validClass: "success",
    })
})
