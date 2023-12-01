@extends('layouts.master')

@section('title','Category')
@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{url('admin/delete-category')}}" method= "post">
    @csrf

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category with it' post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="category_delete_id" id="category_id">
        <h5>Are you sure delete category with its post. ?</h5>

      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-danger">Yes Delete</button>
      </div>

      </form>
    </div>
  </div>
</div>


<div class="container-fluid px-4">
        <div class="card">
            <div class="card-header">

            <h4>View Category
                <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
            </h4>
            </div>
            <div class="card-body">
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif


                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>IMAGE</th>
                            <th>STATUS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        
                    </thead>

                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img src="{{asset($item->image)}}" width="50px" height="50px" alt="Image">
                            </td>
                            <td>{{$item->status == '1' ? 'Hidden':'Shown'}}</td>
                            <td>
                                <a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <!-- <a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a> -->
                            <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{ $item->id}}">Delete</button> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        


        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
        </ol>
        <div class="row">

        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
    //$('.deleteCategoryBtn').click(function(e){
      $(document).on('click','deleteCategoryBtn', function(e){

     // })
        e.preventDefault();

        var category_id = $(this).val();
        $('#category_id').val(category_id);

        $('#deleteModal').modal('show');

    });
    });
</script>

@endsection