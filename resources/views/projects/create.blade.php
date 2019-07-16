@extends('layouts.app')

@section('content')
<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
    <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;">
        <form method="post" action="{{ route('projects.store') }}">
            {{ csrf_field() }}

            @if($companies == null)
                <input class="form-control" type="hidden" name="company_id" value="{{ $company_id }}">
            @endif
            
            @if($companies != null)
                <div class="form-group">
                    <label for="company">Select Company</label>
                    <select name="company_id" class="form-control">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="form-group">
                <label for="project-name">Name<span class="required">*</span></label>
                <input placeholder="Enter name" id="project-name" required spellcheck="false" class="form-control" type="" name="name" value="">
            </div>

            <div class="form-group">
                <label for="project-content">Description</label>
                <textarea placeholder="Enter description" style="resize: vertical;" id="project-content" name="description" rows="5" spellcheck="false" class="form-control autosize-target text-left"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="sidebar-module">
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li><a href="/projects">All projects</a></li>
        </ol>
    </div>
</div>
@endsection
