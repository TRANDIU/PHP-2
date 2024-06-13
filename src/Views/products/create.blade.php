@extends('main')

@section('title')
    Thêm mới
@endsection

@section('content')
  <form action="{{url('products/store')}}" method="POST" enctype="multipart/form-data">
  <div class="mt-3">
        <label for="category_id">Category </label>
        <select  id="category_id" name="category_id" class="form-select">
           @foreach($collection as $id=>$name)
             <option value="{{id}}">{{name}}</option>

           @endforeach
        </select>
     </div>

     <div class="mt-3">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control">
     </div>

     <div class="mt-3">
        <label for="img_thumbnail">Img Thumbnail</label>
        <input type="file" id="img_thumbnail" name="img_thumbnail" class="form-control">
     </div>

     <div class="mt-3">
        <label for="description">Description</label>
      <textarea id="description" name="description" class="form-control"></textarea>
     </div>
   
     <button type="submit" class="btn btn-primary mt-3">Save</button>
     

  </form>
@endsection