
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
                    <h3>Events</h3>                    
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
                        <th>Title</th>
                        <th>Venue</th>
                        <th>Website</th>
                        <th>Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody id="tbody1">
                        <tr>
                            <td>1</td>
                            <td>Marathi Literature Festival</td>
                            <td>Kusumagraj Smarak | Vishwas Lawns</td>
                            <td><u><a href="http://marathiliteraturefestival.com" target="_blank">marathiliteraturefestival.com</a></u></td>
                            <td class="text-center">
                                <a href='view_img.php?action=mlf&type=gallery' class='btn-group' role='group'>
                                    <button type="button" class="btn btn-info btn-sm">Gallery</button>                           
                                    <button type="button" class='btn btn-default btn-sm' title='View and Upload Images'><i class='fa fa-cloud-upload'></i></button>
                                </a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='view_img.php?action=mlf&type=media' class='btn-group' role='group'>
                                    <button type="button" class="btn btn-success btn-sm">Media</button>                             
                                    <button type="button" class='btn btn-default btn-sm' title='View and Upload Images'><i class='fa fa-cloud-upload'></i></button>
                                </a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='video.php?action=mlf' class='btn-group' role='group'>
                                    <button type="button" class="btn btn-danger btn-sm">Video</button>                           
                                    <button type="button" class='btn btn-default btn-sm' title='View and Upload Video'><i class='fa fa-youtube-square'></i></button>
                                </a>

                            </td>
                        </tr>
                        <!-- <tr>
                            <td>2</td>
                            <td>Gujarati Literature Festival</td>
                            <td>Ahmedabad Management Association</td>
                            <td><u><a href="http://glf.mobisofttech.co.in" target="_blank">glf.mobisofttech.co.in</a></u></td>
                            <td class="text-center">
                                <a href='view_img.php?action=glf&type=gallery' class='btn-group' role='group'>
                                    <button type="button" class="btn btn-info btn-sm">Gallery</button>                           
                                    <button type="button" class='btn btn-default btn-sm' title='View and Upload Images'><i class='fa fa-cloud-upload'></i></button>
                                </a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='view_img.php?action=glf&type=media' class='btn-group' role='group'>
                                    <button type="button" class="btn btn-success btn-sm">Media</button>                             
                                    <button type="button" class='btn btn-default btn-sm' title='View and Upload Images'><i class='fa fa-cloud-upload'></i></button>
                                </a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='video.php?action=glf' class='btn-group' role='group'>
                                    <button type="button" class="btn btn-danger btn-sm">Video</button>                           
                                    <button type="button" class='btn btn-default btn-sm' title='View and Upload Video'><i class='fa fa-youtube-square'></i></button>
                                </a>
                            </td>
                            
                        </tr> -->
                        
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

        // Initialize Example 1
        $('#example1').dataTable();

    });

    function confirmDelete(id){
        $('#hidden_id').val(id);
    }

</script>