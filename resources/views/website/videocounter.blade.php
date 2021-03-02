@extends('website.layout.master')

@section('body')
   

        <div class="col-12 text-center">
        
            Video Viewer ({{ $video->viewers }})
            <hr>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/GVNDbTwOSiw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
           
@endsection



