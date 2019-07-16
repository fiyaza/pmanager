@extends('layouts.app')

@section('content')
<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    <div class="well well-lg">
        <h1>{{ $project->name }}</h1>
        <p class="lead">{{ $project->description }}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="/projects/create" role="button">Add Project</a></p> -->
    </div>

    <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;">
        <br>
        @include('partials.comments')
        <div class="row container-fluid">
            <form method="post" action="{{ route('comments.store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="commentable_type" value="App\Project">
                <input type="hidden" name="commentable_id" value="{{ $project->id }}">

                <div class="form-group">
                    <label for="comment-content">Comment</label>
                    <textarea placeholder="Enter comment" style="resize: vertical;" id="comment-content" name="body" rows="3" spellcheck="false" class="form-control autosize-target text-left"></textarea>
                </div>

                <div class="form-group">
                    <label for="comment-url">Proof of work done (Url/Photos)</label>
                    <textarea placeholder="Enter url or screenshots" style="resize: vertical;" id="comment-url" name="url" rows="2" spellcheck="false" class="form-control autosize-target text-left"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>

            @if($project->user_id == Auth::user()->id)
            <li>
                <a href="#" 
                    onclick="
                        var result = confirm('Are you sure you wish to delete this project?');
                        if(result) {
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }
                        ">
                    Delete
                </a>
                <form id="delete-form" action="{{ route('projects.destroy', [$project->id]) }}" method="POST" style="display: none;">
                    <input type="hidden" name="_method" value="delete">
                    {{ csrf_field() }}
                </form>
            </li>
            @endif
            <br>
            <li><a href="/project/create">Add New Project</a></li>
            <br>
            <li><a href="/projects">My projects</a></li>
        </ol>
        <hr>

        <h4>Add Members</h4>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="add-user" action="{{ route('projects.adduser') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="hidden" name="project_id" value="{{ $project->id }}" class="form-control">
                        <input type="text" class="form-control" name="email" placeholder="Search user by email">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </span>
                    </div><!-- /input-group -->
                </form>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div>

    <br>

    <div class="sidebar-module">
        <h4>Team Members</h4>
        <ol class="list-unstyled">
            @foreach($project->users as $user)
                <li><a href="#">{{ $user->email }}</a></li>
            @endforeach
        </ol>
    </div>
</div>
@endsection
