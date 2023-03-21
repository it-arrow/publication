<div class="modal-header">
    <h5 class="modal-title" id="SocialMediaLabel">Add New Social Link</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="{{route('social.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="modal-body p-4">
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="mb-3">
        <label for="social-media-icon" class="form-label">Social Media Icon</label>
        <input type="text" class="form-control" name="icon" id="social-media-icon" placeholder="fa-solid fa-facebook-f" value="{{$data->icon}}" required>
    </div>
    <div class="mb-3">
        <label for="social-media-name" class="form-label">Social Media Name</label>
        <input type="text" class="form-control" name="name" id="social-media-name" placeholder="Facebook" value="{{$data->name}}" required>
    </div>
    <div class="mb-3">
        <label for="social-media-link" class="form-label">Social Media Link</label>
        <input type="url" class="form-control" name="link" id="social-media-link" placeholder="https://www.facebook.com/" value="{{$data->link}}" required>
    </div>

   
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Add Social Media</button>
</div>
</form>