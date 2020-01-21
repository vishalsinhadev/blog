<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      	@if ($models->isEmpty())
            <tr> 
            	<th class="text-center" scope="row">No Results Founds</th> 
            </tr>
    	@endif
        @foreach( $models as $key => $model )
        <tr>
            <td>{{ $model->name }}</td>
            <td>{{ $model->created_at }}</td>
            <td class="text-center">
                <a class="btn btn-outline-secondary btn-icon" 
                	title="Edit"
                	href="{{ route('blog.admin.category.edit',['id' => $model->id]) }}">
                    <i class="mdi mdi-eye"></i>
                </a>
                <a class="btn btn-outline-secondary btn-icon" 
                	title="Delete" 
                	data-method="delete"
                	href="{{ route('blog.admin.category.destroy',['id' => $model->id]) }}">
                    <i class="mdi mdi-pencil"></i>
                </a>
            </td>
        </tr>
        @endforeach 
      </tbody>
    </table>
  </div>