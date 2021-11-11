var dt = new Date();
document.getElementById("headingNav2").innerHTML = dt.toLocaleString('en-us', {
    dateStyle: 'long',
    timeStyle: 'short'
});

var date = new Date();
document.getElementById("dashBoardDate").innerHTML = date.toLocaleString('en-us', {
    dateStyle: 'long'});