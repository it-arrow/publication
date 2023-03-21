@php
    $breadcrumb=App\Models\HomePage::where('section',$section)->first();
@endphp
<div class="card">
    <div class="card-header">
       <h3>Breadcrumb Section</h3>
    </div>
    <div class="card-body">
        @if ($breadcrumb!=null)
        <form action="{{ route('breadcrumb-image.update',$breadcrumb->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
        @else
        <form action="{{ route('breadcrumb-image.store') }}" method="post" enctype="multipart/form-data">
            @csrf
        @endif
            <div class="row">
                <input type="hidden" name="section" value="{{ $section }}">
                <div class="mb-3 col-md-6">
                    <label >Page Title</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" name="page_title" value="{{old('page_title',$breadcrumb!=null ? json_decode($breadcrumb->value)->page_title : '') }}" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label >Page Sub Title</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" name="sub_title" value="{{old('sub_title',$breadcrumb!=null ? json_decode($breadcrumb->value)->sub_title : '') }}" required>
                </div>
            </div>
            
            <div class="row">
                <div class="mb-3">
                    <label>Breadcrumb Image</label><br>
                    <input type="file" name="breadcrumb_image" id="breadcrumb" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="mb-3">
                    @if ($breadcrumb!=null)
                        @if (json_decode($breadcrumb->value)->breadcrumb_image!=null)
                            
                        <img id="preview-breadcrumb-before-upload"  style="max-height:150px;" src="{{asset('uploads/breadcrumb/'.json_decode($breadcrumb->value)->breadcrumb_image)}}">
                        @else
                        <img id="preview-breadcrumb-before-upload"  style="max-height:150px;">
                            
                        @endif
                    @else
                    <img id="preview-breadcrumb-before-upload"  style="max-height:150px;">
                    @endif
                </div>
            </div>
            
            <div class="text-xl-end">
                @if ($breadcrumb!=null)
                <button type="submit" class="btn btn-success">Update</button> 
                @else
                <button type="submit" class="btn btn-success">Save</button> 
                @endif
            </div>
        </form>
    </div>
</div>