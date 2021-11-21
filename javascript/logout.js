//Logout javascript
function logout() {
    Swal.fire({
        icon: 'warning',
        title: 'Logging out',
        text: "Are you sure to sign out?",
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        confirmButtonColor: '#3085d6'
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