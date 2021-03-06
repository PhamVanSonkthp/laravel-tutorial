
function actionDelete(event){
    event.preventDefault()
    let urlRequest = $(this).data('url')
    let that = $(this)

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (response) {
                    if(response.code === 200){
                        that.parent().parent().remove()

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                },
                error: function (err) {
                    console.log(err)
                },
            })
        }
    })
}

function search(ele) {
    if(event.key === 'Enter') {
        window.location.href = window.location.href.split("?")[0] + "?search_query="+ele.value
    }
}

$(function (){
    $(document).on('click', '.action_delete', actionDelete);

    if(window.location.href.split("?").length > 1){
        $('#input_search').val(decodeURIComponent(window.location.href.split("?")[1].split("=")[1]))
    }
})


