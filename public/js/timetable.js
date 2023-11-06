// timetable.js
$(document).ready(function () {
    $("#prevMonthButton").click(function () {
        var class_id = $(this).data("class-id");
        var currentMonth = parseInt($("#currentMonth").val());
        changeMonth(-1, class_id, currentMonth);
    });

    $("#nextMonthButton").click(function () {
        var class_id = $(this).data("class-id");
        var currentMonth = parseInt($("#currentMonth").val());
        changeMonth(1, class_id, currentMonth);
    });
    $("[id^='gradeButton_']").click(function () {
        var id = $(this).attr("id");
        var class_id = id.replace("gradeButton_", "");
        loadGradeTimetable(class_id);
    });
});

function changeMonth(monthChange, class_id, currentMonth) {
    var currentYear = parseInt($("#currentYear").val());

    currentMonth += monthChange;

    if (currentMonth < 1) {
        currentMonth = 12;
        currentYear -= 1;
    } else if (currentMonth > 12) {
        currentMonth = 1;
        currentYear += 1;
    }

    $("#currentYear").val(currentYear);
    $("#currentMonth").val(currentMonth);
    loadTimetable(class_id);
}

function loadTimetable(class_id) {
    var currentYear = $("#currentYear").val();
    var currentMonth = $("#currentMonth").val();
    $.ajax({
        url:
            "/influencer_education/" +
            "public/" +
            "timetable/" +
            class_id +
            "/" +
            currentYear +
            "/" +
            currentMonth,
        type: "GET",
        success: function (data) {
            $("#timetableContent").html(data);
            console.log("Ajax成功です");
        },
        error: function () {
            console.log("Ajax失敗です");
        },
    });
}
function loadGradeTimetable(class_id) {
    var currentYear = $("#currentYear").val();
    var currentMonth = $("#currentMonth").val();
    $.ajax({
        url:
            "/influencer_education/" +
            "public/" +
            "timetable/" +
            class_id +
            "/" +
            currentYear +
            "/" +
            currentMonth,
        type: "GET",
        success: function (data) {
            $("#timetableContent").html(data);
            console.log("Ajax成功です");
        },
        error: function () {
            console.log("Ajax失敗です");
        },
    });
}
