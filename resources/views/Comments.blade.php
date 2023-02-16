@extends('layout')

@section('content')
    {{-- Start Post Function --}}
    <form>
    <div class="panel">
        <div class="panel-body">
                <div class="form-group ">
                    <input
                        type="text"
                        class="form-control @error('username') alert-danger @enderror"
                        id="username"
                        name="username"
                        placeholder="Username" 
                        value="{{ old('username') }}">
                    @error('username')
                        <p class="alert-danger">{{ $errors->first('username') }}</p>
                    @enderror
                </div>
                    <div class="form-group">
                        <textarea class="form-control @error('comments') alert-danger @enderror"
                            rows="3"
                            name="commments"
                            placeholder="What are you thinking?"
                            id="comments">{{ old('comments') }}
                        </textarea>
                        @error('comments')
                            <p class="alert-danger">{{ $errors->first('comments') }}</p>
                        @enderror
                    </div>
                <div class="mar-top clearfix d-grid gap-2 d-md-flex justify-content-md-end">
                    <button id="btn-add" class="btn-add btn btn-outline-primary me-md-2" type="submit"><i class="bi bi-pencil-square"></i> Share</button>
                </div>
            </div>
        </div>
    </form>
    {{-- End Post Function --}}
    
    <!-- Start Edit Modal -->
    <div class="modal" id="editcomment">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Comments</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden"  id="update_id">
                        <div class="form-group ">
                            <input
                                type="text"
                                id="mUsername"
                                class="form-control" 
                                placeholder="Username"
                                style="width: 200px; margin-bottom: 10px">
                            @error('mUsername')
                                <p class="alert-danger">{{ $errors->first('mUsername') }}</p> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="mComments" rows="3" placeholder="What are you thinking?"></textarea>
                        </div>
                    </div>
                    <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn_update btn btn-outline-primary"><i class="bi bi-pencil"></i> Update</button>
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->

    <!-- Start Newsfeed Content -->
    <div id="newsfeed">

    </div>
    <!-- End Newsfeed Content -->
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //fetch data for the dispaly
        fetchcomment();
        function fetchcomment()
        {
            $.ajax({
                type: "GET",
                url: "/comments",
                dataType: false,
                success: function (response) {
                    html = '';
                    $.each(response.posts, function (key, comments) {
                        html += `
                        <div class="media-block">
                            <a class="media-left" href="#"><img class="rounded-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                            <div class="media-body">
                                <div class="mar-btm">
                                    <a href="#"  class="username btn-link text-semibold media-heading box-inline">${comments.username}</a>
                                    <p id="created_at" class="created_at ext-muted text-sm"><i class="bi bi-globe"></i> - From Web - ${comments.created_at}</p>
                                </div>
                                    <p class="comments">${comments.comments}</p>
                                <div class="pad-ver">
                                    <div class="btn-group">                                    
                                        <button type="button" class="btn_delete btn btn-outline-secondary" value="${comments.id}" onclick="$.delete($(this).val());"><i class="bi bi-trash"></i></button>
                                        <button class="btn_edit btn btn-outline-secondary" value="${comments.id}" onclick="$.edit($(this).val());" "><i class="bi bi-pencil-square"></i></button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>`
                    });
                    $('#newsfeed').html(html);
                }
            });
        }
        
        // Adding of comments---------------------
        $('#btn-add').click(function (e) {
        e.preventDefault();
        var data = {
            'username' : $('#username').val(),
            'comments' : $('#comments').val()
        }
            $.ajax({
                type: "POST",
                url: "/comments",
                data: data,
                dataType: "json",
                success: function (response) {
                    fetchcomment();
                    $('#username').val(''),
                    $('#comments').val('')
                }
            });
        })

        // editing of comments---------------------
        $.extend({
            edit : function(id){
                var edit_id = id;
                $('#update_id').val(edit_id);
                $('#editcomment').modal('show');
                
                $.ajax({
                type: "GET",
                url: "comments/"+edit_id,
                success: function (response) {
                    $('#mUsername').val(response.posts.username);
                    $('#mComments').val(response.posts.comments);
                    }
                });
            }
        })

        //Updating of commments--------------------
        $('.btn_update').click(function (e) {
            e.preventDefault();
            var update_id = $('#update_id').val();
            var data = {
                
                'username' : $('#mUsername').val(),
                'comments' : $('#mComments').val()
            }
    
            $.ajax({
                type: "POST",
                url: "update/"+update_id,
                data: data,
                dataType: "json",
                success: function (response) {
                    fetchcomment();
                }
            });
            $('#editcomment').modal('hide');
        });

        // deletig of comments---------------------
        $.extend({
            delete : function(id){
                var delete_id = id;
                
                $.ajax({
                    type: "POST",
                    url: 'delete/'+delete_id,
                    data: { 'id': id },
                    success: function (response) {
                        alert('Are you sure you want to delete this comment?');
                        fetchcomment();
                    }
                });
            }
        })
    });
</script>
@endsection