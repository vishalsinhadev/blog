@extends('layouts.backend')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tags</h4>
          <div class="pull-right">
          	<a href="{{ route('blog.admin.tag.index') }}" class="btn btn-success"><i class="mdi mdi-dots-horizontal"></i></a>
          </div>
          @include('blog::admin.tag._form', ['route' => ['blog.admin.tag.update','id' => $model->id]])

        </div>
      </div>
    </div>
  </div>
</div>
@endsection