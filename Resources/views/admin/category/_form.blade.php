{!! Form::model($model,['route' => $route, 'class' => 'form-horizontal form-material enableAjaxValidation','id' => 'category-form', 'method' => 'POST']) !!}
    <div class="form-body">
        <h3 class="box-title">Post</h3>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                	{!! Form::label('name', 'Title', array('class' => 'control-label')) !!}	
                	{!! Form::text('name', $model->name, ['class' => 'form-control']  ) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
{!! Form::close() !!}