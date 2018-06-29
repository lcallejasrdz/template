$('input.timepicker').timepicker({
    timeFormat: 'HH:mm',
    interval: 30,
    minTime: '07',
    maxTime: '23:30',
    startTime: '07',
    dynamic: false,
    dropdown: true,
    scrollbar: true,
    change: function(time) {
        changeTimePicker();
    }
});