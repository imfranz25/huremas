<script>
  window.uni_modal = function($title = '' , $url='',$size=""){
    start_load();
    $.ajax({
      url:$url,
      success:function(resp){
        if(resp){
          $('#uni_modal .modal-title').html($title)
          $('#uni_modal .modal-body').html(resp)
          if($size != ''){
            $('#uni_modal .modal-dialog').addClass($size)
          }else{
            $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
          }
          $('#uni_modal').modal({
            show:true,
            backdrop:'static',
            keyboard:false,
            focus:true
          })
          end_load();
        }
      }
    })
  }
</script>