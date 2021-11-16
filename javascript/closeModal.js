
//modal with Forms
function closeModalForms(modal) {
    Swal.fire({
        icon: 'question',
        title: 'Are you sure you want to quit?',
        text:'All progress in this form will be lost.',
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        confirmButtonColor: '#007bff'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("registrationForm").reset();
            document.getElementById(modal).style.display = "none";
            document.body.classList.remove("scrollBody");
        }
    })
}


function closeModal(modal) {
    document.getElementById(modal).style.display = "none";
    document.body.classList.remove("scrollBody");
}