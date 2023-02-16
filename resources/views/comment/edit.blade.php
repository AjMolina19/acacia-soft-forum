@extends('layout')

@section('content')
<br><br>
    <form action="/{{ $posts->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="panel">
        <div class="panel-body">
                <div style="text-decoration-color: red" class="form-group ">
                    <input 
                        type="text" 
                        class="form-control @error('useraname') alert-danger @enderror" 
                        name="username" 
                        id="username"
                        placeholder="Username" 
                        value="{{ $posts->username }}"
                        style="width: 200px; margin-bottom: 10px">
                    @error('useraname')
                        <p class="alert-danger">{{ $errors->first('username') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="What are you thinking?" name="comments" id="comments">{{ $posts->comments }}</textarea>
                </div>
                <br>
                <div class="mar-top clearfix d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-outline-success me-md-2" type="submit"><i class="bi bi-pencil"></i>Update</button>
                    <button class="btn btn-outline-danger me-md-2" type="submit"><i class="bi bi-x-square"></i>Cancel</button>
                </div>
            </div>
        </div>
        </form>
@endsection

<!-- Start Edit Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
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
                    @error('useraname')
                        <p class="alert-danger">{{ $errors->first('username') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="mComments" rows="3" placeholder="What are you thinking?"></textarea>
                </div>
            </div>
            <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn_update btn btn-outline-primary">Update</button>
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Edit Modal -->