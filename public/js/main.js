// {{-- Start Edit Function --}}
//         {{-- <div class="modal" id="editcomment" tabindex="-1">
//             <div class="modal-dialog">
//                 <div class="modal-content">
//                     <div class="modal-header">
//                     <h5 class="modal-title">Edit Comment</h5>
//                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
//                     </div>
//                         <div class="modal-body">
//                             <ul id="updateform_errList"></ul>
//                             <input type="hidden" id="update_id">
//                             <div class="form-group ">
//                                 <input 
//                                     type="text" 
//                                     class="username form-control" 
//                                     placeholder="Username"
//                                     value=""
//                                     style="width: 200px; margin-bottom: 10px">
//                                 @error('useraname')
//                                     <p class="alert-danger">{{ $errors->first('username') }}</p>
//                                 @enderror
//                             </div>
//                             <div class="form-group">
//                                 <textarea class="comments form-control" rows="3" placeholder="What are you thinking?"></textarea>
//                             </div>
//                         </div>
//                     <div class="modal-footer">
//                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
//                     <button type="button" id="btn-update" class="btn btn-primary">Update</button>
//                     </div>
//                 </div>
//             </div>
//         </div> --}}
//         {{-- End Edit Function --}}

//         <!-- Newsfeed Content -->
//     $('.btn-edit').click(function (e) {
    //     e.preventDefault();
    //     var edit_comment = $(this).val();
    //     $('#editcomment').modal('show');

    //     $.ajax({
    //         type: "GET",
    //         url: "comments/"+edit_comment,
    //         success: function (response) { 
    //             $('.username').val(response.posts.username);
    //             $('.comments').val(response.posts.comments);
    //         }
    //     });
    // });

    //     $('#btn-update').click(function (e) {
    //         e.preventDefault();
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
    //         var update_id = $('update_id').val();
    //         var data = {
    //             'username' : $('.username').val(),
    //             'comments' : $('.comments').val()
    //         }

    //         $.ajax({
    //             type: "PUT",
    //             url: "comments/"+update_id,
    //             data: data,
    //             dataType: "json",
    //             success: function (response) {
    //                 // $('#editcomment').modal('hide');
    //             }
    //         });
    //     });
    //<a class="btn btn-outline-secondary" id="btn-delete" href="/${comments.id}"><i class="bi bi-trash"></i></a>

    // $('.btn-delete').click(function (e) {
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     var delete_id = (this).val();
    //         $.ajax({
    //             type: "DELETE",
    //             url: "/comments"+delete_id,
    //             success: function (response) {
    //             }
    //         });
    //     });

    // <form action="/${comments.id}" method="POST">
                                    //     @csrf
                                    //     @method('DELETE')
                                    //     <button
                                    //         type="submit"
                                    //         onclick="return confirm('Are you sure you want to delete this comment?')" 
                                    //         class="btn btn-secondary "><i class="bi bi-trash"></i>
                                    //     </button>
                                    // </form><button type="button" class="btn btn-secondary" value=""><i class="bi bi-trash"></i></button>href="comment/${comments.id}/edit"

                                    