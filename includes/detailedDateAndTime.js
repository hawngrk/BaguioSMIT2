var timeDisplay = document.getElementById("time");
    var dateDisplay = document.getElementById("datee");

    function refreshTime() {
        var dateString = new Date().toLocaleTimeString("en-US", {timeZone: "Asia/Manila"});
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var timeString = new Date().toLocaleDateString(undefined, options);
        // var formattedString = dateString.replace(", ", " - ");
        timeDisplay.innerHTML = dateString;
        dateDisplay.innerHTML = timeString;
    }

    setInterval(refreshTime, 1000);