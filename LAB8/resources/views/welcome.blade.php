@extends('layouts.master')

@section('content')
@if(Session::has('info'))
    @component('components.alert')
        {{ Session::get('info') }}
    @endcomponent
@endif

<div class="row">
    <div class="col">
        <form action='{{ route('new_post') }}' method='post'>
            <legend>New Post</legend>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name='title'>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea type="text" class="form-control" id="body" name='body'></textarea>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <div class="card-columns">
            @foreach($posts as $post)
	            @if($edit_mode && $edit_post->id==$post->id)
	                <div class="card">
	                <h5 class="card-header">{{ $post->title }}</h5>
	                <div class="card-body">
	                     <form action='{{route('edit_post')}}' method='post'>
	                        <p class="card-text"> 
	                            <div class="form-group">
	                                <textarea type="text" class="form-control" id="body" name='body'>{{ $edit_post->body }}</textarea>
	                            </div>

	                        </p>
	                        @csrf
	                        <input type="hidden" name="id" value={{ $edit_post->id }}>
	                        <button type="submit" class="btn btn-primary">Save</button>
	                    </form>

	                </div>
	                </div>
	            @else
	                 <div class="card">
	                	<h5 class="card-header">{{ $post->title }}</h5>
		                <div class="card-body">
		                    <p class="card-text">{{ $post->body }}</p>
							
							<a href="{{ route('edit', ['id'=> $post->id ]) }}" class="btn btn-primary">Edit</a>
		                    
		                    <a href="{{ route("delete", ['id'=>$post->id ])}}" class="btn btn-danger">Delete</a>
		                </div>
	                </div>

	            @endif
            @endforeach
        </div>
    </div>
    
</div>
@endsection