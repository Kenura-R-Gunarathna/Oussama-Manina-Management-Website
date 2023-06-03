<section id="slider-part" class="slider-active">
    @foreach ($sliders as $slider)
        <div class="single-slider bg_cover pt-150" style="background-image: url('{{ $slider->image() }}')"
            data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">{{ $slider->title }}</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">{{ $slider->content }}</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    @endforeach
</section>
