var modal = document.getElementById("imgModal");
var img = document.getElementById("infoImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

function viewImage(id) {
    var src = $('#' + id).attr('src');
    var capt = $('#' + id).attr('alt')
    modal.style.display = "block";
    modalImg.src = src;
    captionText.innerHTML = capt;
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal || event.target == addModal || event.target == notifyModal || event.target == uploadFileModal) {
        modal.style.display = "none";
        addModal.style.display = "none";
        uploadFileModal.style.display = "none";
        notifyModal.style.display = "none";
    }
}