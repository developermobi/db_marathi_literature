
<?php
    include('header_top.php');
    include('classes/functions.php');
    error_reporting(0);
    $con = new functions();
    session_start(); 
    $date = $con->get_datetime();

?>
<!DOCTYPE html>
<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <h3>Events Video Links</h3> 
                    <div class="col-lg-12">
			        	<div class="col-lg-3 text-left">
			        		<label class="form-label">Youtube Link</label>
			        		<div class="form-group">
			        			<input type="text" name="link" id="link" class="form-control">
			        			<input type="hidden" id="type" value="<?php echo $_GET['action']?>">
			        		</div>
			        	</div>
			        	<div class="col-lg-3">
			        		<label class="form-label">&nbsp;</label>
			        		<div class="form-group text-left">
			        			<a class="btn btn-md btn-primary" id="saveLink">Submit</a>
			        		</div>
			        	</div>
			        </div>                   
                </div>
            </div>
        </div>
        

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">                
                <div class="panel-body table-responsive view_table_lmai">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Video</th>
                        <th>Link</th>
                        <!-- <th>Website</th> -->
                        <th>Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody id="tbody1">
                                                
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>

<?php
    include('footer.php');
?>

<script>
// Toastr options
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-center",
            "closeButton": true,
            "debug": false,
            "toastClass": "animated fadeInDown",
        };
    $(document).ready(function(){

    	getMediaData();

        // Initialize Example 1

        $("#saveLink").click(function(){
        	var link = $("#link").val();
	        var type = $("#type").val();

	        if(link == ''){
	        	alert('Please enter link');
	        	return false;
	        }

	        var formData = new FormData();

	        formData.append('link',link);
	        formData.append('type',type);
	        formData.append('action','saveMediaLink');

        	$.ajax({
        		url: 'webservices/ajax_media_link.php',
        		type: 'POST',
        		data: formData,
        		contentType: false,
            	processData: false,
        		beforeSend: function(){

        		},
        		success: function(response){
        			//alert(response);
        			var link = $("#link").val('');
        			if(response == 0){
        				alert("Success");
        				return false;
        			}else if(response == 1){
        				alert("Link not added");
        				return false;
        			}else if(response == 2){
        				alert("Bad request");
        				location.href = 'viewEvents.php';
        				return false;
        			}
        		},
        		complete: function(){
        			getMediaData();
        		}
        	});
        });

    });

    function confirmDelete(id){
        $('#hidden_id').val(id);
    }

    function getMediaData(){
    	var type = $("#type").val();

    	var formData = new FormData();
        formData.append('type',type);
        formData.append('action','getMediaLink');

    	$.ajax({
    		url: 'webservices/ajax_media_link.php',
    		type: 'POST',
    		data: formData,
    		contentType: false,
        	processData: false,
        	dataType: 'JSON',
    		beforeSend: function(){

    		},
    		success: function(response){
    			console.log(response);
    			$("#tbody1").html('');
    			if(response.status == 200){   
    				$("#example1").dataTable().fnDestroy(); 				
    				$("#tbody1").html(response.data);
    			}else{
    				alert(response.message);
    			}
    			
    			
    		},
    		complete: function(){    			
    			$('#example1').dataTable();
    		}
    	});
    }

    function deleteLink(id){

    	var flag = confirm('Are you sure want to delete this link?');

    	if(flag == false){
    		return false;
    	}

    	var formData = new FormData();
        formData.append('id',id);
        formData.append('action','deleteMediaLinkSingle');

    	$.ajax({
    		url: 'webservices/ajax_media_link.php',
    		type: 'POST',
    		data: formData,
    		contentType: false,
        	processData: false,
        	dataType: 'html',
    		beforeSend: function(){

    		},
    		success: function(response){
    			console.log(response);
    			if(response > 0){   
    				getMediaData();
    			}else{
    				alert('Not deleted');
    			}
    			
    			
    		},
    		complete: function(){    			
    			
    		}
    	});
    }

</script>