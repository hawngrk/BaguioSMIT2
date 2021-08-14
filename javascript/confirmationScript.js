/**
 * Confirmation Script to Delete
 */
function deleteAction() {
    let confirmAction = confirm("Are you sure to delete?");
    if (confirmAction) {
        alert("Deleted successfully executed");
    } else {
        alert("Action canceled");
    }
}

/**
 * Confirmation Script to Add
 */
function addAction() {
    let confirmAction = confirm("Are you sure to add the following?");
    if (confirmAction) {
        alert("Successfully added");
    } else {
        alert("Action canceled");
    }
}

/**
 * Confirmation Script to Archive
 */
function archiveAction() {
    let confirmAction = confirm("Are you sure to archive the following?");
    if (confirmAction) {
        alert("Successfully archived");
    } else {
        alert("Action canceled");
    }
}