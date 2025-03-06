@extends('admin.master')
@section('admin') 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

                    <!-- Start Content-->
<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Edit Gateway One</h4>
        </div> 
       
    </div>

    <!-- Form Validation -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Gateway One</h5>
                </div><!-- end card header -->

                <div class="card-body">


<form action="{{ route('update.gateway.one') }}" method="post" class="row g-3" enctype="multipart/form-data"> 
	@csrf

    <input type="hidden" name="id" value="{{ $getone->id }}">

    <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Title </label>
        <input type="text" name="title" class="form-control" value="{{ $getone->title }}" >
    </div>

     <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $getone->phone }}">
    </div>

     <div class="col-md-12">
        <label for="validationDefault01" class="form-label">Description</label>
        <textarea name="description" class="form-control" placeholder="Required example textarea" >{{ $getone->description }}</textarea>
    </div>

    <div class="col-md-6">
        <label for="validationDefault01" class="form-label">GateOne Image</label>
        <input type="file" name="image" class="form-control"  id="image">
    </div>

     <div class="col-md-6">
         <img id="showImage" src="{{ asset($getone->image) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile"> 
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