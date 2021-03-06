<div class="row">
   <div class="span12">
      <div class="widget">
         <div class="widget-header">
            <i class="icon-comments"></i>
            <h3>{{ $course->name }} Announcement</h3>
         </div>
         <div class="widget-content">
            <div class="tab-content">
               <div class="tab-pane active" id="wall">
                  <div class="row">
                     <div class="span12">
                        <div class="table-responsive">
                           {{ Form::open(array('url' => 'trainer/lectureWall', 'files' => true, 'class'=>'form-horizontal', 'autocomplete'=>'off', 'id'=>'form-post', 'role'=>'form', 'method' => 'post')) }}
                           {{ Form::textarea('post_msg', null, array('placeholder' => 'What\'s on your mind?', 'style' => 'width: 50%;', 'size' => '30x3', 'class' => 'form-control', 'id'=> 'post_msg', 'maxlength' => 5000)) }}                                                      
                           {{ Form::hidden('sid', Request::segment(3)) }}	
                           {{ Form::hidden('course_name', $course->name) }}                             	    		    		    
                           <br />
                           <a style="margin-top: 3px;" class="btn btn-primary" id="submitForm"><b>Post</b></a>
                           {{ Form::close() }}	
                           <br />
                           @if($allPost)
                           {{ $postContent }}
                           @else
                           <br />
                           <div align="center" class="alert alert-info" role="alert">
                              <strong>** No post at the moment. **</strong>
                           </div>
                           @endif
                           {{ HTML::style('resources/uploads') }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {	
   	$('#due-date-wrap').hide();
   
   	@if(count(Session::get('error')) > 0)		
   	    $('#due-date-wrap').show();	    
   	@endif
   
   	$('#post_msg').focus(function() {
   		$('#due-date-wrap').show('slow');
   	});
   
       // Submit Form
       $('#submitForm').click(function() {
       	$('#form-post').submit();
       });
       
       $('#form-post input').keydown(function(e) {
   		if (e.keyCode == 13) {
   			$('#form-post').submit();
   		}
   	});
   
   	$('.a-reply').click(function(e) {
       	e.preventDefault();
       	var th = $(this).attr('id');
       	var sp = th.split('-');    	
   
       	$('#comment-txt-'+sp[1]).show('slow');
       });
   	
   	$('.wall-post-setting').click(function() {
   		var id = $(this).attr('id');
   		var sp = id.split('-');
   		var hs = $('#hideShow-'+sp[3]);
   				
   		if(hs.val() > 0) {
   			$('#top-post-setting-'+sp[3]).hide('slow');
   			hs.val(0);
   		} else {
   			$('#top-post-setting-'+sp[3]).show('slow');
   			hs.val(1);
   		}	
   	});
   
   	$('.wall-post-setting-bottom').click(function() {
   		var id = $(this).attr('id');
   		var sp = id.split('-');
   		var hs = $('#hideShow-'+sp[3]);
   				
   		if(hs.val() > 0) {
   			$('#top-post-setting-'+sp[3]).hide('slow');
   			hs.val(0);
   		} else {
   			$('#top-post-setting-'+sp[3]).show('slow');
   			hs.val(1);
   		}	
   	});
   
   	$('.top-wall-update').click(function(e) {	
   		e.preventDefault();		
   		var id = $(this).attr('id');
   		var sp = id.split('-');
   		var html = '';
   		var postMsg = $('#post-msg-'+sp[3]).text();
   		var count = postMsg.indexOf('Cancel');
   
   		html += '<form class="form-update-post" id="form-update-post-'+sp[3]+'">';		
   		html += '<textarea style="width: 50%;" id="txt-post-update-'+sp[3]+'" rows="5" cols="30" class="form-control">'+postMsg+'</textarea>';
   		html += '<input type="hidden" value="'+postMsg+'" id="h-post-update-'+sp[3]+'">';
   		html += '<input type="hidden" value="0" id="h-open-update-'+sp[3]+'">';
   		html += '<a class="btn btn-primary btn-update-now" onclick="update_post(this.id);" id="btn-update-now-'+sp[3]+'">Update</a> ';
   		html += '<a class="btn btn-default btn-cancel-update" onclick="cancel_update(this.id);" id="btn-cancel-update-'+sp[3]+'">Cancel</a>';		
   		html += '</form>';
   		
   		if(count < 0) {
   			$('#post-msg-'+sp[3]).html( html );		
   		}
   	});	
   
   	$('.btn-reply').click(function(e) {         
   		e.preventDefault();
   		var id = $(this).attr('id');
   		var sp = id.split('-');
   		var txtMsg = $('#txt-comment-'+sp[2]).val();
   		
   		$.ajax({
   		  type: 'GET',
   		  dataType: 'json',
   		  url: '{{ URL::to("trainer/addComment") }}',
   		  data: 'msg='+ txtMsg +'&pid='+ sp[2]
   		}).success(function( data ) {	             
   			if(data.pid) {
   				$('#form-'+sp[2])[0].reset();
   
   				if($('#box-comment-'+sp[2]).html() == '') {
   					$('#box-comment-'+sp[2]).html(data.html);
   				} else {		
   					$('.all-threads-'+sp[2]).last().after(data.html);								
   				}
   			} else {
   				alert('Failed to add your comment.');
   			}
   		});	    	
       });    
   
       $('.top-wall-delete').click(function(e) {
       	e.preventDefault();
       	var id = $(this).attr('id');
   		var sp = id.split('-');
   		var con = confirm('Are you sure you really want to delete your post?');		
   
   		if(con) {
   			$.ajax({
   			  type: 'GET',
   			  dataType: 'json',
   			  url: '{{ URL::to("trainer/deletePost") }}',
   			  data: 'pid='+ sp[3]
   			}).success(function( data ) {					
   				if(data.pid) {		
   					$('#div-post-wrapper-'+sp[3]).remove();										
   				} else {
   					alert('Failed to delete your post.');
   				}
   			});	  
   		}		
   	});   
   
   	$('.bottom-wall-delete').click(function(e) {
       	e.preventDefault();
       	var id = $(this).attr('id');
   		var sp = id.split('-');
   		var con = confirm('Are you sure you really want to delete your comment?');		
   
   		if(con) {
   			$.ajax({
   			  type: 'GET',
   			  dataType: 'json',
   			  url: '{{ URL::to("trainer/deleteComment") }}',
   			  data: 'cid='+ sp[3]
   			}).success(function( data ) {					
   				if(data.cid) {		
   					$('#all-threads-'+sp[3]).remove();										
   				} else {
   					alert('Failed to delete your comment.');
   				}
   			});	  
   		}		
   	});
   
   	$('.bottom-wall-update').click(function(e) {
   		e.preventDefault();					
   		var id = $(this).attr('id');
   		var sp = id.split('-');
   		var html = '';
   		var txtComment = $('#span-txt-comments-'+sp[3]).text();
   		var count = txtComment.indexOf('Cancel');	
   		
   		html += '<form class="form-update-comment" id="form-update-comment-'+sp[3]+'">';		
   		html += '<textarea id="txt-comment-update-'+sp[3]+'" rows="2" cols="30" class="form-control">'+txtComment+'</textarea>';
   		html += '<input type="hidden" value="'+txtComment+'" id="h-post-comment-'+sp[3]+'">';
   		html += '<input type="hidden" value="0" id="h-comment-update-'+sp[3]+'">';
   		html += '<a class="btn btn-primary btn-updateComment-now" onclick="updateComment(this.id);" id="btn-updateComment-now-'+sp[3]+'">Update</a> ';
   		html += '<a class="btn btn-default btn-cancel-updateComment" onclick="cancel_updateComment(this.id);" id="btn-cancel-updateComment-'+sp[3]+'">Cancel</a>';		
   		html += '</form>';
   		
   		if(count < 0) {
   			$('#span-txt-comments-'+sp[3]).html( html );		
   		}
   	});	
   }); //end document.ready function
   
   function updateComment(id) {		
   		var sp = id.split('-');
   		var txtComment = $('#txt-comment-update-'+sp[3]).val();
   		
   		if(txtComment == '') {
   			$('#div-comment-update-'+sp[3]).show('slow');
   		} else {
   			$('#div-comment-update-'+sp[3]).hide('slow');			
   			$.ajax({
   			  type: 'GET',
   			  dataType: 'json',
   			  url: '{{ URL::to("trainer/updateComment") }}',
   			  data: 'myComment='+ txtComment +'&cid='+ sp[3]
   			}).success(function( data ) {				
   				if(data.cid) {		
   					$('#form-update-comment-'+sp[3]).remove();	
   					$('#span-txt-comments-'+sp[3]).html(txtComment);							
   				} else {
   					alert('Failed to update your comment.');
   				}
   			});	  
   		}
   }
   function update_post(id) {	
   	var sp = id.split('-');
   	var txtPost = $('#txt-post-update-'+sp[3]).val();
   
   	if(txtPost == '') {
   		$('#div-post-update-'+sp[3]).show('slow');
   	} else {
   		$('#div-post-update-'+sp[3]).hide('slow');			
   		$.ajax({
   		  type: 'GET',
   		  dataType: 'json',
   		  url: '{{ URL::to("trainer/updatePost") }}',
   		  data: 'myPost='+ txtPost +'&pid='+ sp[3]
   		}).success(function( data ) {				
   			if(data.pid) {		
   				$('#form-update-post-'+sp[3]).remove();	
   				$('#post-msg-'+sp[3]).html(txtPost);							
   			} else {
   				alert('Failed to update your post.');
   			}
   		});	  
   	}
   }
   
   function cancel_update(id) {	
   	var sp = id.split('-');
   
   	$('#post-msg-'+sp[3]).text($('#h-post-update-'+sp[3]).val());
   	$('#form-update-post-'+sp[3]).remove();	
   }	
   
   function cancel_updateComment(id) {	
   	var sp = id.split('-');
   
   	$('#span-txt-comments-'+sp[3]).text($('#h-post-comment-'+sp[3]).val());
   	$('#form-update-comment-'+sp[3]).remove();	
   }
   
   function deleteThread(id) {	    
   		var sp = id.split('-');		
   		var con = confirm('Are you sure you really want to delete your comment?');		
   
   		if(con) {
   			$.ajax({
   			  type: 'GET',
   			  dataType: 'json',
   			  url: '{{ URL::to("trainer/deleteComment") }}',
   			  data: 'cid='+ sp[3]
   			}).success(function( data ) {					
   				if(data.cid) {					
   					$('#all-threads-'+sp[3]).remove();										
   				} else {
   					alert('Failed to delete your comment.');
   				}
   			});	  
   		}	
   }
   
   function updateThread(id) {	
   		var sp = id.split('-');
   		var html = '';
   		var txtComment = $('#span-txt-comments-'+sp[3]).text();
   		
   		html += '<form class="form-update-comment" id="form-update-comment-'+sp[3]+'">';		
   		html += '<textarea id="txt-comment-update-'+sp[3]+'" rows="2" cols="30" class="form-control">'+txtComment+'</textarea>';
   		html += '<input type="hidden" value="'+txtComment+'" id="h-post-comment-'+sp[3]+'">';
   		html += '<input type="hidden" value="0" id="h-comment-update-'+sp[3]+'">';
   		html += '<a class="btn btn-primary btn-updateComment-now" onclick="updateComment(this.id);" id="btn-updateComment-now-'+sp[3]+'">Update</a> ';
   		html += '<a class="btn btn-default btn-cancel-updateComment" onclick="cancel_updateComment(this.id);" id="btn-cancel-updateComment-'+sp[3]+'">Cancel</a>';		
   		html += '</form>';
   		
   		$('#span-txt-comments-'+sp[3]).html( html );		
   }
</script>