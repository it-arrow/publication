@extends('admin.includes.main')
@section('title')Opportunity -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <a href="{{route('books.create')}}" class="btn btn-success btn-sm float-right">Add Book</a>

                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects" id="myTable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>NAme</th>
                                <th>Category</th>
                                <th>Grade</th>
                                <th>Author</th>
                                <th>Year</th>
                                <th>Access Code Required</th>
                                <th>Downloadable</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($books)>0)
                                @foreach ($books as $book)
                                <tr>
                                    <td> {{$loop->iteration}} </td>

                                    <td> {{$book->name}} </td>

                                    <td>
                                        @if($book->category !=null)
                                        {{$book->get_category->name}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($book->grade != null)
                                        {{$book->get_grade->name}}
                                        @endif
                                    </td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->year }}</td>
                                    <td><input type="checkbox" class="code-required-feature" data-id="{{ $book->id }}" name="access_code_required" {{ $book->access_code=='1' ? 'checked' : ' ' }}></td>
                                    <td><input type="checkbox" class="downloadable-feature" data-id="{{ $book->id }}" name="downloadable" {{ $book->downloadable=='1' ? 'checked' : ' ' }}></td>


                                    <form action="{{route('books.destroy',$book->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" href="{{route('books.show',$book->id)}}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{route('books.edit',$book->id)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <button class="btn btn-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" title='Delete'>
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>

                                        </td>
                                    </form>

                                </tr>

                                @endforeach
                            @else
                                <tr><td colspan="6"><i class="fa fa-exclamation-triangle"></i> {!! trans('No Data Found') !!}</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
    let featured = Array.prototype.slice.call(document.querySelectorAll('.code-required-feature'));
        featured.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
</script>
<script>
    let featured1 = Array.prototype.slice.call(document.querySelectorAll('.downloadable-feature'));
        featured1.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
</script>
@endsection

@section('scripts')


<script>
    $(document).ready(function(){
        //datatable
        $('#myTable').DataTable();

        $('.code-required-feature').change(function () {
            let code_required = $(this).prop('checked') === true ? 1 : 0;
            // console.log(status);
            let book_id = $(this).data('id');
            //   console.log(category_id);

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('books.update_code_required') }}',
                data: {'code_required': code_required, 'book_id': book_id},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 20;
                    toastr.success(data.message);
                }
            });
        });
        $('.downloadable-feature').change(function () {
            let downloadable = $(this).prop('checked') === true ? 1 : 0;
            // console.log(status);
            let book_id = $(this).data('id');
            //   console.log(category_id);

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('books.update_downloadable') }}',
                data: {'downloadable': downloadable, 'book_id': book_id},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 20;
                    toastr.success(data.message);
                }
            });
        });
    });

</script>

@endsection
