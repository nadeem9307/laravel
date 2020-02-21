@include('front/layout/header')
    <!-- Start Blog
        ============================================= -->
        <div class="blog-area single full-blog right-sidebar default-padding">
            <div class="container">
                <div class="row">
                    <div class="blog-items">
                        <div class="blog-content col-md-12">
                            <!-- Item -->
                            <div class="single-item">
                                <!-- End Thumb -->
                                <div class="info">
                                    <h3>{!! $details->translation()->first()?$details->translation()->first()->title:'' !!}</h3>
                                    {!!$details->translation()->first()?$details->translation()->first()->description:''!!}
                                </div>
                            </div>
                            <!-- End Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog -->
        @include('front/layout/footer')
