@extends('layouts.app')

@section('content')
   <a href="/post/index" class="btn btn-primary">Back</a><br/><br/>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Post </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="{{route('post/update', ['id'=>$post->id]) }}"  class="new-article-form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">              
        <div class="box-body">
            @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @endif
            
            <div class="form-group col-md-8">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" placeholder="Title*">
            </div>
            


            <div class="form-group col-md-8">
                <label>Body:</label>
                <textarea id="body" name="body" value="{{$post->body}}" rows="10" cols="110">
                    {{$post->body}}
                </textarea>
            </div>
            

            
            
            <div class="form-group col-md-8">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>



    </form>
</div>
@endsection 