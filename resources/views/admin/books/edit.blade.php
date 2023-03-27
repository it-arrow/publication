@extends('admin.includes.main')
@section('title')Edit Book -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Book</h3>
                            <a href="{{route('books.index')}}" class="btn btn-success btn-sm float-right">View Books</a>
                        </div>
                        <div class="card-body">
                            @include('admin.includes.message')

                            <form action="{{route('books.update',$book->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <div class="form-group">
                                            <label for="name">Book Title</label> <span class="text-danger"> * </span>
                                            <input type="text" class="form-control" name="name" value="{{old('name',$book->name)}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Category</label><span class="text-danger"> * </span>
                                            <select name="category" class="form-control">
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $book->category == $category->id ? 'selected' : ' ' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="number" class="form-control" name="vacancy_no" value="{{old('vacancy_no')}}" required> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <div class="form-group">
                                            <label for="name">Grade</label><span class="text-danger"> * </span>
                                            <select name="grade" class="form-control">
                                                <option value="" disabled selected>Select Grade</option>
                                                @foreach($grades as $grade)
                                                <option value="{{ $grade->id }}" {{ $book->grade == $grade->id ? 'selected' : ' ' }}>{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="number" class="form-control" name="vacancy_no" value="{{old('vacancy_no')}}" required> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="author">Author</label><br>
                                            <input type="text" class="form-control" name="author" value="{{old('author',$book->author)}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <div class="form-group">
                                            <label for="pdf_book">PDF Book</label><br>
                                            <input type="file" class="form-control" name="pdf_book">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pdf_book">Year</label><br>
                                            <input type="text" class="form-control" name="year" value="{{old('year',$book->year)}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pdf_book">Book Image</label><br>
                                            <input type="file" class="form-control" name="book_image" id="book-image" onchange="loadFile(event)">
                                            @if($book->image != null)
                                                @if(file_exists(public_path('uploads/book/images/'.$book->image)))
                                                <img id="book-image-view"  height="200" width="200" class="rounded me-2" src="{{ asset('uploads/book/images/'.$book->image) }}">
                                                @endif
                                            @else
                                            @endif
                                            <img id="preview-logo-before-upload"  height="200" width="200" class="rounded me-2 d-none" >
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="pdf_book">Access Code Required</label><br>
                                            <input type="checkbox" class="js-feature" name="access_code_required" {{ $book->access_code == '1' ? 'checked' : ' ' }} >
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-5">
                                        <div class="form-group">
                                            <label for="pdf_book">Downloadable</label><br>
                                            <input type="checkbox" class="js-feature" name="downloadable" {{ $book->downloadable == '1' ? 'checked' : ' ' }} >
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
<script>
    let featured = Array.prototype.slice.call(document.querySelectorAll('.js-feature'));
        featured.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
</script>
<script>
        var loadFile = function(event) {
            document.getElementById('book-image-view').style.display = 'none';
            var output = document.getElementById('preview-logo-before-upload');
            output.className = 'd-block';
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('preview-logo-before-upload');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };

  </script>
@endsection


