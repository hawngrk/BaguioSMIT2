//Logout javascript
function logout() {
    Swal.fire({
        icon: 'info',
        title: 'Are you sure you want to sign out?',
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        confirmButtonColor: '#007bff'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'POST',
                url: '../includes/logout.php',
                data: {logout: 'logout'},
                success: function(results) {
                    setTimeout("window.location.href = '../Admin/login.php'", 500);
                },
            });
        } 
    })
}