export default {
    showSuccess(title,message){
        Swal.fire(title,message,'success')
    },

    showError(){
        Swal.fire({
            type: '',
            title:title,
            text:message
        })
    }
}