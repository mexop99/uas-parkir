const flashdata = $('.flash-data-success').data('flashdata');
if (flashdata) {
    Swal.fire({
        type: 'success',
        icon: 'success',
        title: 'Good Job!',
        text: 'Data behasil '+ flashdata
      })
    
}