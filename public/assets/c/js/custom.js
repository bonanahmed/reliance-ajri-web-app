$(document).ready(function () {
    $('.button-submit').on('click', function (e) {
        var form = $(this).parents('form')
        e.preventDefault();
        Swal.fire({
            title: 'Do you want to delete this item?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                form.submit()
                // Swal.fire('Saved!', '', 'success')
            }
        })
    })
})