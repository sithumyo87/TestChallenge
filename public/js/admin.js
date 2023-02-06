$("[id=delete]").on("click", function() {
    report = confirm(
        "Are You Sure Want to delete? This action cannot be undone."
    );
    if (report == true) {
        return true;
    } else {
        return false;
    }
});

jQuery('.datepicker').datetimepicker({
    timepicker:false,
    format:'d-m-Y'
});