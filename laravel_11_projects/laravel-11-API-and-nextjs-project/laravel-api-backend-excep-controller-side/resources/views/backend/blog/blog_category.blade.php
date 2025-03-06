@extends('admin.master')
@section('admin') 

 <div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Blog Category</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal"> Add Category </button>
                </ol>
            </div>
        </div>

<!-- Datatables  -->
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                    <thead>
                    <tr>
                        <th>Sl</th> 
                        <th>Category Name</th>
                        <th>Category Slug</th> 
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
  @foreach($category as $key=> $item)
        <tr>
            <td>{{ $key+1 }}</td> 
            <td>{{ $item->blog_category }}</td>
            <td>{{ $item->slug }}</td>  
            <td>

   <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#category" id="{{ $item->id }}" onclick="categoryEdit(this.id)" > Edit </button>
   
      <a href="{{ route('delete.blog.category',$item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>

            </td>
        </tr>
  @endforeach 
                       
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>




    </div> <!-- container-fluid -->

</div> <!-- content -->



<!-- Default Modal -->
<div class="modal fade" id="standard-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="standard-modalLabel">Add Blog Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
 <form id="myForm" action="{{ route('blog.category.store') }}" method="post" class="row g-3"> 
    @csrf

    <div class="col-md-12">
        <label for="validationDefault01" class="form-label">Category Name</label>
        <input type="text" name="blog_category" class="form-control" >
    </div>      
            </div>
            <div class="modal-footer">
                
     <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
</form>

        </div>
    </div>
</div>

 
 
<!--Edit Modal -->
<div class="modal fade" id="category" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="standard-modalLabel">Edit Blog Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
 <form id="myForm" action="{{ route('blog.category.update') }}" method="post" class="row g-3"> 
    @csrf
    <input type="hidden" name="cat_id" id="cat_id">

    <div class="col-md-12">
        <label for="validationDefault01" class="form-label">Category Name</label>
        <input type="text" name="blog_category" class="form-control" id="cat" >
    </div>      
            </div>
            <div class="modal-footer">
                
     <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
</form>

        </div>
    </div>
</div>


<script>
    function categoryEdit(id){
        $.ajax({
            type: 'GET',
            url: '/edit/blog/category/'+id,
            dataType: 'json',

            success:function(data){
                // console.log(data)
                $('#cat').val(data.blog_category);
                $('#cat_id').val(data.id)
            }
        })
    }
</script>


@endsection