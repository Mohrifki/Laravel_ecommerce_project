$(function(){
  $('.delete_btn').on('click', function(e){
    e.preventDefault();
    if(confirm('sure want to delete')){
      $.ajax({
        url:$(this).attr('href'),
        type:'delete',
        success:(res)=>{
          $(this).parents('tr').remove();
          Toast.fire({
            icon: 'success',
            title: 'data deleted'
          })
        }
      })
    }
  });

  $('input').on('focus',function(e){
    $(this).siblings('span').html('');
  });

  $('.insert_form').on('submit',function(e){
    e.preventDefault();
    let formData = new FormData($(this)[0]);
    $.ajax({
      url: $(this).attr('action'),
      type: 'POST',
      data: formData,
      success: (res)=>{
        console.log(res);
        $(this).trigger('reset');
        $('.preloader').hide();
        toaster('success','data updated successfully');
      },
      error: (err)=>{
        // console.log(err.responseJSON.errors);
        let errors = err.responseJSON.errors;
        for (const key in errors) {
          if (Object.hasOwnProperty.call(errors, key)) {
            const element = errors[key];
            $(`.${key}`).text(element);
            console.log(key, element);
          }
        }
        toaster('error','check below for errors');
        $('.preloader').hide();
      },
      beforeSend:()=>{
        $('.preloader').show();
      }
    })
  });

  $('.update_form').on('submit',function(e){
    e.preventDefault();
    let formData = new FormData($(this)[0]);
    $.ajax({
      url: $(this).attr('action'),
      type: 'POST',
      data: formData,
      success: (res)=>{
        $('.preloader').hide();
        toaster('success','data updated successfully');
      },
      error: (err)=>{
        // console.log(err.responseJSON.errors);
        let errors = err.responseJSON.errors;
        for (const key in errors) {
          if (Object.hasOwnProperty.call(errors, key)) {
            const element = errors[key];
            $(`.${key}`).text(element);
            console.log(key, element);
          }
        }
        toaster('error','check below for errors');
        $('.preloader').hide();
      },
      beforeSend:()=>{
        $('.preloader').show();
      }
    })
  });

  function toaster(icon, message){
    Toast.fire({
      icon: icon,
      title: message,
    })
  }

})