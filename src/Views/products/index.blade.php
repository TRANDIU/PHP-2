@extends('main')

@section('title')
Danh sách
@endsection

@section('content')

<a class="btn btn-primary" href="{{url("/products/create")}}">Thêm</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Name</th>
        <th>Img Thumbnail</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Action</th>
    </tr>

    @foreach ($data as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['c_name']}}</td>
            <td>{{$item['name']}}</td>
            <td>
                <img src=" {{asset(['img_thumbnail'])}}" alt="" width="100px">
            </td>
            <td>{{date('d/m/Y H:i:s', strtotime($item['created_at']))}}</td>
            <td>{{date('d/m/Y H:i:s', strtotime($item['updated_at']))}}</td>
            <td>
                <a class="btn btn-warning" href="{{url("/products/{$item['id']}/edit")}}">Sửa</a>
                <a class="btn btn-danger" 
                onclick="return confirm('Bạn có chắc xóa không?')"
                href="{{url("/products/{$item['id']}/delete")}}">Xóa</a>
            </td>
        </tr>
    @endforeach
</table>