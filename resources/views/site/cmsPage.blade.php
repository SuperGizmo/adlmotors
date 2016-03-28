@extends('site.template.main')

@section('background')
    <div id="slideshow">
        <?php
        $i = 1; ?>
        @foreach($backgroundImages as $backgroundImage)
            <img src="images/1500/{!! $backgroundImage->location !!}"
            <?php
                if($i == 1)
                {
                    echo 'class="active"';
                    $i = $i +1;
                }
             ?>/>
        @endforeach
    </div>
@endsection

@section('content')
    @if(count($pageData->images) > 0)
        <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
            <div class="col-md-12" style="padding-top: 10px;">
                <a href="images/{!! $pageData->images()->first()->location !!}" data-target="#lightbox"><img class="img-responsive"  src="images/250/{!! $pageData->images()->first()->location !!}" /></a>
            </div>
            @foreach($pageData->images as $image)
                <div class="col-md-6" style="padding-top: 10px;">
                    <a href="images/{!! $image->location !!}">
                    <img class="img-responsive" src="images/50/{!! $image->location !!}" /></a>
                </div>
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            {!! $pageData->content !!}
        </div>
    @else
        {!! $pageData->content !!}
    @endif
@endsection

@section('contactForm')
	@include('contactForms.formOne')
@endsection