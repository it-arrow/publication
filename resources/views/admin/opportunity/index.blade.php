@extends('admin.includes.main')
@section('title')Opportunity -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <a href="{{route('opportunity.create')}}" class="btn btn-success btn-sm float-right">Add Opportunity</a>
                    
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects" id="myTable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>Title</th>
                                <th>No. of Vacancy</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($opportunities)>0)
                                @foreach ($opportunities as $opportunity)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    
                                    <td> {{$opportunity->title}} </td>
                                    
                                    <td>
                                        {{$opportunity->vacancy_no}}
                                    </td>


                                    <form action="{{route('opportunity.destroy',$opportunity->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <td class="project-actions">
                                            <a class="btn btn-primary btn-sm" href="{{route('opportunity.show',$opportunity->id)}}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{route('opportunity.edit',$opportunity->id)}}">
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
@endsection

@section('scripts')


<script>
    $(document).ready(function(){
        //datatable
        $('#myTable').DataTable();
    });

</script>




@endsection