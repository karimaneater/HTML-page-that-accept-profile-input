var currentDate = new Date();

// Get the year, month, and day from the Date object
var year = currentDate.getFullYear();
var month = currentDate.getMonth() + 1; // Months are zero-based
var day = currentDate.getDate();

// Format the date as YYYY-MM-DD
var formattedDate = year + '-' + month.toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');

// Display the current date



function getYears(startingDate, endingDate) {
    var start = new Date(startingDate);
    var end = new Date(endingDate);
    return start.getFullYear() - end.getFullYear();
}


$("#birthday").on('change', function(){

    var bday = this.value;
    var age = getYears(formattedDate, bday);
    $('#age').val(age);
   
});
