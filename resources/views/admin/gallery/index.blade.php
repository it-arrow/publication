@extends('admin.includes.main')
@section('title')Gallery -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Gallery</h4>
                </div>
            </div>
        </div>
        @component('components.breadcrumb-form')
        @slot('section')
        gallery
        @endslot
        @endcomponent
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('photo.create')}}" class="btn btn-success">Add Photos</a>
            </div>
            @include('admin.includes.message')
        </div>
        
        <div class="panel-body row">
            @if (Route::is('photo.index'))
                {{-- @if (!empty($gallery->photos))  
                @foreach (json_decode($gallery->photos) as $key => $photo)
                    <div class="col-md-2">
                        
                        <div class="img-upload-preview gallery-image">
                            <a href="{{ asset('uploads/gallery/photos/'.$photo) }}" target="_blank">
                                <img loading="lazy" src="{{ asset('uploads/gallery/photos/'.$photo) }}" alt="Our Gallery" class="img-fluid" style="height:180px">
                            </a>
                            <form action="{{route('delete.photo',$key)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger close-btn remove-files" type="submit" title='Delete'><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
                
                @endif --}}
                @if ($gallery!=null)  
                @foreach ($gallery as $key => $photo)
                    <div class="col-md-2">
                        
                        <div class="img-upload-preview gallery-image">
                            <a href="{{ asset('uploads/gallery/photos/'.$photo->photos) }}" target="_blank">
                                <img loading="lazy" src="{{ asset('uploads/gallery/photos/'.$photo->photos) }}" alt="Our Gallery" class="img-fluid" style="height:180px">
                            </a>
                            <form action="{{route('delete.photo',$photo->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger close-btn remove-files" type="submit" title='Delete'><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
                
                @endif
                <div class="mt-3">

                    {{ $gallery->links() }}
                </div>
            @endif
        </div>
        
        <!-- end row-->

    </div> <!-- container -->
</div> <!-- content -->

    {{-- <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (Route::is('photo.index'))
                        <a href="{{route('photo.create')}}" class="btn btn-success btn-sm float-right">Add Photos</a>
                   
                    @endif
                   
                </div>
                <div class="card-body p-0">
                    <div class="tab-base">

                
                        <!--Tabs Content-->
                        <div class="tab-content">
                            <div id="demo-lft-tab-1" class="tab-pane fade active in show">
                
                                <div class="panel mt-2">
                                    
                                    <div class="panel-body row">
                                        @if (Route::is('photo.index'))
                                            @if (!empty($gallery->photos))  
                                            @foreach (json_decode($gallery->photos) as $key => $photo)
                                                <div class="col-md-4 col-sm-4 col-xs-6">
                                                    
                                                    <div class="img-upload-preview">
                                                        <a href="{{ asset('uploads/gallery/photos/'.$photo) }}" target="_blank">
                                                            <img loading="lazy" src="{{ asset('uploads/gallery/photos/'.$photo) }}" alt="" class="img-fluid">
                                                        </a>
                                                        <form action="{{route('delete.photo',$key)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger close-btn remove-files" type="submit" title='Delete'><i class="fa fa-times"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @else
                                                <div class="col-md-4 col-sm-4 col-xs-6">No Photos Found</div>
                                            @endif
                                        
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div> --}}


@endsection

