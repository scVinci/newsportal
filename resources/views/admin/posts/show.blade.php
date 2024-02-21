@extends('admin.layouts.app')
@section('content')
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_page">
                   <h1>{{$post->title}}</h1>
                    <div class="post_commentbox">
                        <span><i class="fa fa-calendar"></i>{{$post->created_at}}</span>
                        <a href="#"><i class="fa fa-tags"></i>{{$post->category->title}}</a>
                    </div>
                    <div class="single_page_content"> <img class="img-center" src="{{asset('storage/'.$post->image)}}" alt="">
                        {!! $post->text!!}


                    </div>
                    <div class="social_link">
                        <ul class="sociallink_nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
@endsection
