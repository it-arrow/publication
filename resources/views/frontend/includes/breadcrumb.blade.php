<section class="header-second-bg" style="background-image:url('uploads/breadcrumb/{{$setting->breadcrumb}}')">
    <div class="breadcrumb-area text-center">
        <h4>{{Route::current()->getName()}}</h4>
        <p><a href="{{route('home')}}">Home</a> > {{Route::current()->getName()}}</p>
    </div>
</section>