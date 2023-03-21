<section class="page-title"
    style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)),url('{{ $image_path }}');">
    <div class="auto-container">
        <h1>{{ $page_title }}</h1>
        <div class="title">{{ $sub_title }}</div>
    </div>
    <!--Page Info-->
    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container">
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{ $page_title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Page Info-->
</section>