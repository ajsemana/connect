<ol class="breadcrumb">
	@foreach ($breadcrumbs as $breadcrumb)
		<li class="{{ $breadcrumb['class'] }}"><a href="{{ $breadcrumb['href'] }}">{{ $breadcrumb['text'] }}</a></li>
   	@endforeach
</ol>

@if( $errors->all() )
    <div class="alert alert-error">
    	<button class="close" data-dismiss="alert" type="button">&times;</button>
    	{{ HTML::ul($errors->all()) }}
    </div>
@endif

<div class="widget">
    <div class="widget-header"> <i class="icon-th-large"></i>
    	<h3>Add New Course</h3>
    </div>
    <!-- /widget-header -->
    
    <div class="widget-content">
    	{{ Form::open(array('url'=>'admin/training-courses/addData', 'class'=>'form-horizontal', 'autocomplete'=>'off', 'id'=>'form-courses', 'role'=>'form', 'method' => 'post')) }}
		<div class="span2">&nbsp;</div>
		<div class="span8">
			<fieldset>				
				<div class="control-group">											
					<label class="control-label" for="name">Course Name:</label>
					<div class="controls">
						{{ Form::text('course_name', Input::old('course_name'), array('required', 'maxlength'=>'100')) }}
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" for="">Date From:</label>
					<div class="controls">
						<input type="date" name="date_from" value="{{ date('Y-m-d') }}" required>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" for="">Date To:</label>
					<div class="controls">
						<input type="date" name="date_to" value="{{ date('Y-m-d') }}" required>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" for="">Duration:</label>
					<div class="controls">
						<input type="number" ng-model="duration" name="duration" min="1" max="5" value="1" required>						
					</div> <!-- /controls -->			
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" for="">Time:</label>
					<div class="controls">
						<input type="time" name="time_from" value="09:00" required> to <input type="time" name="time_to" value="17:00" required>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">											
					<label class="control-label" for="">Status:</label>
					<div class="controls">
						<select name="status" required>
							<option value="1">Open</option>
							<option value="0">Ended</option>
						</select>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
								
				<div class="control-group">											
					<label class="control-label" for=""></label>
					<div class="controls">
						<a class="btn btn-primary" id="submitForm">Submit</a>
						<a class="btn" href="{{ $url_cancel }}">Cancel</a>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
			</fieldset>
        </div>
        <div class="span2">&nbsp;</div>        
        {{ Form::hidden('filter_name', $filter_name) }}
        {{ Form::hidden('sort', $sort) }}
        {{ Form::hidden('order', $order) }}
        
		{{ Form::close() }}
	</div><!-- /widget-content --> 
</div><!-- /widget -->	
<script type="text/javascript">
$(document).ready(function() {
    // Submit Form
    $('#submitForm').click(function() {
    	$('#form-courses').submit();
    });
    
    $('#form-courses input').keydown(function(e) {
		if (e.keyCode == 13) {
			$('#form-courses').submit();
		}
	});
});	
</script>