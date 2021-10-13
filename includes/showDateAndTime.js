var dt = new Date();
document.getElementById("headingNav2").innerHTML = dt.toLocaleString('en-us', {
    dateStyle: 'long',
    timeStyle: 'short'
});