@extends('admin.master')
@section('admin') 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

                    <!-- Start Content-->
<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Add Slider</h4>
        </div> 
       
    </div>

    <!-- Form Validation -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Add Slider</h5>
                </div><!-- end card header -->

                <div class="card-body">


<form action="{{ route('store.slider') }}" method="post" class="row g-3" enctype="multipart/form-data"> 
	@csrf

    <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Slider Heading</label>
        <input type="text" name="heading" class="form-control" >
    </div>

     <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Slider Link</label>
        <input type="text" name="link" class="form-control" >
    </div>

     <div class="col-md-12">
        <label for="validationDefault01" class="form-label">Slider Description</label>
        <textarea name="description" class="form-control" placeholder="Required example textarea" ></textarea>
    </div>

    <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Slider Image</label>
        <input type="file" name="image" class="form-control"  id="image">
    </div>

     <div class="col-md-6">
         <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile"> 
    </div>
 
   
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Save Changes</button>
    </div>
</form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

  

</div> <!-- container-fluid -->

</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#image').change(function(e){
				var reader = new FileReader();
				reader.onload = function(e){
					$('#showImage').attr('src',e.target.result);
				}
				reader.readAsDataURL(e.target.files['0']);
			})
		})
	</script>



@endsection