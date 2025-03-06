@extends('admin.master')
@section('admin') 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

                    <!-- Start Content-->
<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Edit Blog Post</h4>
        </div> 
       
    </div>

    <!-- Form Validation -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Blog Post</h5>
                </div><!-- end card header -->

                <div class="card-body">


<form id="myForm" action="{{ route('update.blog.post') }}" method="post" class="row g-3" enctype="multipart/form-data"> 
	@csrf

    <input type="hidden" name="id" value="{{ $post->id }}">

    <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Post Title</label>
        <input type="text" name="post_title" class="form-control" value="{{ $post->post_title }}" >
    </div>

     <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Blog Category</label>
        <select name="blogcat_id" class="form-select" id="example-select">
            <option selected="">Select Category</option>
            @foreach($blogcat as $cat)
            <option value="{{ $cat->id }}" {{ $cat->id == $post->blogcat_id ? 'selected' : '' }} >{{ $cat->blog_category }}</option>
             @endforeach
        </select>
    </div> 

       <div class="col-md-12">
        <label for="validationDefault01" class="form-label">Blog Description</label>
        <div id="quill-editor" style="height: 200px"> </div>
        <input type="hidden" name="long_descp" id="long_descp">

         <div id="quill-content" style="display: none;">
            {!! $post->long_descp !!}
        </div>
       
    </div>

    <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Blog Image</label>
        <input type="file" name="image" class="form-control"  id="image">
    </div>

     <div class="col-md-6">
         <img id="showImage" src="{{ asset($post->image) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile"> 
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


<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Include Quill JavaScript -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
    // Initialize Quill editor
    var quill = new Quill('#quill-editor', {
        theme: 'snow'
    });

     // Set initial content if available

      var initailContent = document.getElementById('quill-content').innerHTML;
      if (initailContent) {
        quill.clipboard.dangerouslyPasteHTML(initailContent);
      }

    // On form submission, update the hidden input value with the editor content
    document.getElementById('myForm').onsubmit = function() {
        document.getElementById('long_descp').value = quill.root.innerHTML;
    };
</script>



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