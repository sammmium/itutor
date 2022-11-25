
$(document).ready(function() {
    /* Всегда видимый календарь на странице расписаний */
    $("#datepicker").datepicker({
        onSelect: function(date){
            $('#datepicker_value').val(date);
            // console.log($('form[name="schedule_calendar"]'))
            $('form[name="schedule_calendar"]').submit();
        }
    });
    $("#datepicker").datepicker("setDate", $('#datepicker_value').val());

    /* Форма добавления новой записи в расписание */
    $('a.add-schedule-button').on('click', function () {
        let parent = document.querySelector('div.day-schedule');
        let child = '' +
            '<div class="row day-schedule-item">' +
            '    <div class="pupil col-8">{{ event["pupil"] }}</div>' +
            '    <div class="time col-4">{{ event["subject_time"] }}</div>' +
            '</div>';
        console.log(parent)
    });
});