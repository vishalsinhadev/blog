{!! Form::model($model,['route' => $route, 'class' => 'form-horizontal form-material enableAjaxValidation','id' => 'course-form', 'method' => 'POST']) !!}
    <div class="form-body">
        <h3 class="box-title">Post</h3>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                	{!! Form::label('title', 'Title', array('class' => 'control-label')) !!}	
                	{!! Form::text('title', $model->title, ['class' => 'form-control', 'placeholder' => 'Title']  ) !!}
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-label">Description</label>
                
                    <textarea id="post-description-textarea" 
                    		  	style="resize: vertical;" 
                    		  	rows="3" 
                    		  	spellcheck="false"
                              	class="form-control autosize-target{{ $errors->has('description') ? ' is-invalid' : '' }}" 
                              	placeholder="Descriptions"
                              	name="description">{{ !empty($model) ? $model->description : old('description') }}</textarea>
                
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                	{!! Form::label('slug', 'Slug', array('class' => 'control-label')) !!}	
                	{!! Form::text('slug', $model->slug, ['class' => 'form-control', 'placeholder' => 'Slug']  ) !!}
                </div>
            </div>
            <div class="col-md-6">
            	<div class="form-group">
                	<label for="category_id" class="form-control-label">Category</label>
                    <select style="max-width: 99%" id="category" name="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                        @foreach($categories as $category)
                            @if(($model->id != null) && $model->category->contains($category))
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                
                    @if ($errors->has('category_id'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </div>
                    @endif
                </div>
            	<div class="form-group">
                    <label for="tags[]" class="form-control-label">Tags</label>
                    <select style="max-width: 99%" 
                    		id="post-tags" 
                    		name="tags[]" 
                    		class="form-control{{ $errors->has('tags[]') ? ' is-invalid' : '' }}" 
                    		multiple>
                        @foreach($tags as $tag)
                            @if(($model->id != null) && $model->tags->contains($tag))
                                <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
                            @else
                                <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                            @endif
                        @endforeach
                    </select>
                
                    @if ($errors->has('tags[]'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('tags[]') }}</strong>
                        </div>
                    @endif
                </div>
                
            </div>
            <div class="col-md-12">
            	<div class="form-group">
                    <label for="post-content-textarea" class="form-control-label">Content</label>
                    <textarea data-save-id="{{ isset($post)?'post.edit.'.$post->id.'.by@' . request()->ip():'post.create' }}" id="simplemde-textarea"
                              class="form-control{{ $errors->has('content') ? ' is-invalid ' : ' ' }}"
                              name="html_content"
                              spellcheck="false"
                              rows="36"
                              placeholder="Enter Main Content"
                              style="resize: vertical">{{ ($model->id != null) ? $model->content : old('content') }}</textarea>
                        @if($errors->has('content'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('content') }}</strong>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
{!! Form::close() !!}

@push('script')
<script src="//cdn.bootcss.com/select2/4.0.3/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
<script>
    $("#post-tags").select2({
        tags: true
    });
</script>
<script>
    CKEDITOR.replace( 'html_content' );
</script>

@endpush