$(document).ready(function () {
    //Validate date when create and update work
    $(".endingDate").change(function () {
        var startDate = document.getElementById("startingDate").value;
        var endDate = document.getElementById("endingDate").value;

        if (isNaN(Date.parse(startDate))) {
            alert("Please choice Start date first");
            document.getElementById("endingDate").value = "";
        }

        if ((Date.parse(startDate) >= Date.parse(endDate))) {
            alert("End date should be greater than Start date");
            document.getElementById("endingDate").value = "";
        }
    });

    $(".startingDate").change(function () {
        var startDate = document.getElementById("startingDate").value;
        var endDate = document.getElementById("endingDate").value;

        if ((Date.parse(startDate) >= Date.parse(endDate)) && !isNaN(Date.parse(endDate))) {
            alert("End date should be greater than Start date");
            document.getElementById("startingDate").value = "";
        }
    });
})

