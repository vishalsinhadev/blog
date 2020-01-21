@extends('layouts.backend')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tags</h4>
          <div class="pull-right">
          	<a href="{{ route('blog.admin.tag.create') }}" class="btn btn-success"><i class="mdi mdi-plus"></i></a>
          </div>
          @include('blog::admin.tag._grid')

        </div>
      </div>
    </div>
  </div>
</div>
@endsection