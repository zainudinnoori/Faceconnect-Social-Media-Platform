$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
//if a post is sharing by a user

//load according scroll
  function loadMoreData(page){
    $.ajax(
          {
              url: '?page=' + page,
              type: "get",
              beforeSend: function()
              {
                  $('.ajax-load').show();
              }
          })
          .done(function(data)
          {
         
              if(data.html == ""){
                  $('.ajax-load').html("No more records found");
                  return;
              }
              $('.ajax-load').hide();
              $("#FollowingPosts").append(data.html);
          })
          .fail(function(jqXHR, ajaxOptions, thrownError)
          {
                alert('server not responding...');
          });
  }
//modal to show single orginal image
$('.show-orginal-image').click(function(){
    var photoname= $(this).attr('name');
    var extension = $(this).attr('extension');
    $('.modal-content-orginal').empty();
    $('.modal-content-orginal').html('<img width="130%" src="/images/'+photoname+'_orginal'+extension+'">');
});

$(document).ready(function(){
    $("#click").click(function(){
        $("#notification").toggle();
    });
});

$('.delete_post').click(function(e){
  var post_id = $(this).attr('data-post-id');
  var data={post_id:post_id,method:'DELETE'}
  e.preventDefault();
  swal({
      title: 'Are You Sure?',
      text: "You won't be able to revert this post again!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
      $.ajax(
      {
        url:'post/'+post_id,
        type: 'DELETE',
        dataType: "JSON",
        data: data,
            success: function ()
            { 
              $('#post-content'+post_id).fadeOut("slow");
                Command: toastr["success"]("Your post has beed deleted !!! ", "Success..")
          toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            }
        }); 
        swal(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
  })
});


$(document).ready(function() {
  $('.store_like').on('click',function(e) {
    var user_id = $(this).attr('data-user_id');
    var post_id = $(this).attr('data-post-id');
    var data = {user_id:user_id, post_id:post_id};
    var request = $.ajax({
        url: "/like/store",
        type: "POST",
        data: data,
        dataType:"html"
        });
        request.done(function( msg ) {
            var response = JSON.parse(msg);
            $('#no_of_likes'+post_id).empty().html(response.no_of_likes+' Likes');
            if(response.msg === "Liked")
            {
              $('#like_'+post_id).empty().html('<i class="fa fa-heart" style="color:red">');
            }
            else
            {
              $('#like_'+post_id).empty().html('<i class="fa fa-heart" style="color:gray">');
            }
        });
    });
});


var post_data = "";
$('.pencil-edit').click(function(){
  var edit_post_id= $(this).attr('id');
  $('#post_body_'+edit_post_id).removeClass('text_area_disabled');
  $('#post_body_'+edit_post_id).addClass('text_area_enabled');
  $('#post_body_'+edit_post_id).removeAttr('disabled');
  $('#post_body_'+edit_post_id).focus();
  $('#btn-update-post-'+edit_post_id).removeAttr('hidden');
  $('#btn-cancel-edit-'+edit_post_id).removeAttr('hidden');
  $('#upload-photo-'+edit_post_id).removeAttr('hidden');
  
  post_data= $('#post_body_'+edit_post_id).val();

});

$('.cancel-edit').click(function updated(){
  var post_id = $(this).attr('btn-cancle-post-id');
  $('#post_body_'+post_id).removeClass('text_area_enabled');
  $('#post_body_'+post_id).addClass('text_area_disabled');
  $('#post_body_'+post_id).attr('disabled','disabled');
  $('#btn-update-post-'+post_id).attr('hidden','hidden');
  $('#btn-cancel-edit-'+post_id).attr('hidden','hidden');
  $('#upload-photo-'+post_id).attr('hidden','hidden');
  $('#post_body_'+post_id).empty();
  $('#post_body_'+post_id).val(post_data);


});


$('.post-update').click(function(e){
var post_id = $(this).attr('data-post-id');
var post_content= $('#post_body_'+post_id).val();
var data={
  post_id:post_id,
  method:'PUT',
  post_content:post_content,
}
  $.ajax(
  {
    url:'/post/'+post_id,
    type: 'PUT',
    dataType: "JSON",
    data: data,
      success: function ()
      { 
          Command: toastr["success"]("Your post has beed updated !!! ", "Success..")
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      }
  });
    post_data=$('#post_body_'+post_id).val();
    $('#post_body_'+post_id).removeClass('text_area_enabled');
    $('#post_body_'+post_id).addClass('text_area_disabled');
    $('#post_body_'+post_id).attr('disabled','disabled');
    $('#btn-update-post-'+post_id).attr('hidden','hidden');
    $('#btn-cancel-edit-'+post_id).attr('hidden','hidden');
});

var commentContent="";
$('.edit-comment').click(function(){
  var commentid=$(this).attr('comment-id');
  $('#comment-'+commentid).removeClass('text_area_disabled');
  $('#comment-'+commentid).addClass('text_area_enabled_comment');
  $('#comment-'+commentid).removeAttr('disabled');
  $('#update-comment-'+commentid).removeAttr('hidden');
  $('#cancle-comment-'+commentid).removeAttr('hidden');
  commentContent=$('#comment-'+commentid).val();
});

$('.comment-cancle').click(function(){
  var commentid=$(this).attr('comment-id');
  $('#comment-'+commentid).removeClass('text_area_enabled_comment');
  $('#comment-'+commentid).addClass('text_area_disabled');
  $('#comment-'+commentid).attr('disabled');
  $('#update-comment-'+commentid).attr('hidden','hidden');
  $('#cancle-comment-'+commentid).attr('hidden','hidden');
  $('#comment-'+commentid).empty();
  $('#comment-'+commentid).val(commentContent);
});


$('.comment-update').click(function(){
  var commentId = $(this).attr('comment-id');
  var commentBody= $('#comment-'+commentId).val();
  var data={
    commentId:commentId,
    method:'PUT',
    commentBody:commentBody,
    }
  $.ajax(
  {
    url:'/post/comment/'+commentId,
    type: 'PUT',
    dataType: "JSON",
    data: data,
    success: function()
            {
          Command: toastr["success"]("Comment updated !!! ", "Success..")
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
          $('#comment-'+commentId).removeClass('text_area_enabled_comment');
      $('#comment-'+commentId).addClass('text_area_disabled');
      $('#comment-'+commentId).attr('disabled');
      $('#update-comment-'+commentId).attr('hidden','hidden');
      $('#cancle-comment-'+commentId).attr('hidden','hidden');
            }

  });
  
});


$('.comment-delete').click(function(e){
    var commentId = $(this).attr('comment-id');
    var data={commentId:commentId,method:'Delete'}
    $.ajax(
    {
      url:'/post/comment/'+commentId,
      type: 'DELETE',
      dataType: "JSON",
      data: data,
            success: function ()
            { 
            $('#comment-block-'+commentId).fadeOut("slow");
                Command: toastr["success"]("Comment deleted !!! ", "Success..")
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-bottom-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
            }
        });
      // console.log("It failed");
});


$('.likers').click(function(){
  var postId= $(this).attr('post-id');
  var data={postId:postId,method:'get'}
  $.ajax(
    {
      url:'/post/likers/'+postId,
      type: 'get',
      dataType: "JSON",
      data: data,
            success: function (msg)
            { 
              var likers="";
              for(i=0;i<(msg.likers).length;i++)
              {
                  likerimage= '<img width="30px" class="img img-circle" height="30px" src=/images/'+msg.likers[i].image+'>&nbsp&nbsp&nbsp';
                  likername= msg.likers[i].name+'&nbsp&nbsp<i style="color:red" class="fa fa-heart">&nbsp&nbspLiked</i><br><br>';
                  likerid='<a href=/user/'+msg.likers[i].id+'>'+likerimage+likername+'</a>';
                  
                  likers=likers+likerid;
              } 
              if((msg.likers).length != 0 )
              {
                $('#likers-modal-'+msg.post_id).html(likers);
                $('#likers-modal-header-'+msg.post_id).html('Total  '+msg.no_of_likers+' Likes');
              }
              else
              {
                $('#likers-modal-'+msg.post_id).html('<p>No like</p>');
              }
            }
        });
    });
  
   $(document).ready(function() {
      src = "{{ route('searchajax') }}";
       $("#namanyay-search-box").autocomplete({
          source: function(request, response) {
              $.ajax({
                  url: src,
                  dataType: "json",
                  data: {
                      term : request.term
                  },
                  success: function(data) {
                      response(data);
                     
                  }
              });
          },
          minLength: 2,
         
      });
  });

    $('.photo-delete').click(function(e){
    var photoId = $(this).attr('photo-id');
    var data={photoId:photoId,method:'Delete'}
    $.ajax(
    {
      url:'/photo/delete/'+photoId,
      type: 'DELETE',
      dataType: "JSON",
      data: data,
            success: function ()
            { 
            $('#photo-block-'+photoId).fadeOut("slow");
                Command: toastr["success"]("Photo deleted !!! ", "Success..")
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-bottom-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
            }
        });
      // console.log("It failed");
});


$('.block-user').click(function(e){
  var user_id = $(this).attr('user_id');
  var data={user_id:user_id,method:'POST'}
  e.preventDefault();
  swal({
      title: 'Really ?',
      text: "Do you want to block this user",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Block!'
    }).then((result) => {
      if (result.value) {
      $.ajax(
      {
        url:'blockuser/'+user_id,
        type: 'post',
        dataType: "JSON",
        data: data,
            success: function ()
            { 
            $('.user-'+user_id).fadeOut("slow");
            Command: toastr["success"]("User blocked, To see the block list Goto Settings->Block list !!! ", "Success..")
            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
          }
        }); 
      }
  })
});

$('.unblock-user').click(function(e){
  var blockid = $(this).attr('blockid');
  var data={blockid:blockid,method:'get'}
  e.preventDefault();
  swal({
      title: 'Really ?',
      text: "Do you want to unblock this user",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Unblock!'
    }).then((result) => {
      if (result.value) {
      $.ajax(
      {
        url:'unblockuser/'+blockid,
        type: 'get',
        dataType: "JSON",
        data: data,
            success: function ()
            { 
            $('.unblock-user-row-'+blockid).fadeOut("slow");
            Command: toastr["success"]("User unblocked, no he can see your posts", "Success..")
            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
          }
        }); 
      }
  })
});



     //   var counter= $('#disp-images-upload').length;
      // function readURL(input) {
     //        if (input.files && input.files[0]) {
     //            var reader = new FileReader();
     //           //  var fp = $('#file-input');
     //           // var count = fp[0].files.length;
      //             reader.onload = function (e) {
      //                 $('.image-display-'+counter)
      //                     .attr('src', e.target.result)
      //                     .width(150)
      //                     .height(150);
      //                     counter++;
      //             };
      //         $('#disp-images-upload').append('<img class="image-display-'+counter+'" src="#" alt="" /> ..<i class="fa fa-pencil"></i> ')
     //            reader.readAsDataURL(input.files[0]);
     //        }
     //    }