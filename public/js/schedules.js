
$(document).ready(function() {
    /* Всегда видимый календарь на странице расписаний */
    $("#datepicker").datepicker({
        onSelect: function(date){
            $('#datepicker_value').val(date);
            $('form[name="schedule_calendar"]').submit();
        }
    });
    $("#datepicker").datepicker("setDate", $('#datepicker_value').val());

    /* Форма добавления новой записи в расписание */
    $('a.add-day-schedule-item').on('click', function () {
        $('form[name="lesson_add"]').submit();
    });
});