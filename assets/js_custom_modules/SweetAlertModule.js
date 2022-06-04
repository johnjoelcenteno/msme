class SweetAlert {
    static CreateSuccess() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "Created Successfully",
            showConfirmButton: false,
            timer: 1500
        })
    }

    static UpdateSuccess() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "Updated Successfully",
            showConfirmButton: false,
            timer: 1500
        })
    }

    static DeleteSuccess() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "Deleted Successfully",
            showConfirmButton: false,
            timer: 1500
        })
    }

    static AreYouSure() {
        return new Promise(resolve => {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                resolve(result.isConfirmed);
            })
        });
    }

    static Error() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: "Error Occured",
            showConfirmButton: false,
            timer: 1500
        })
    }

    static ErrorWithMessage(title) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title,
            showConfirmButton: false,
            timer: 1500
        })
    }

    static SuccessWithMessage(title) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title,
            showConfirmButton: false,
            timer: 1500
        })
    }
}