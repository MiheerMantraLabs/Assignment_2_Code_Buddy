@include('includes.header')
@include('includes.navbar')

<form action="{{route('edit-catelog-form')}}" method="POST" class="container card mt-3 alert alert-dark text-center" style="white-space: wrap" role="alert">
    @csrf
    <input type="text" class="form-control p-3 border-2 mt-3" name="catalog_name" value="{{$catalog_name}}" placeholder="Enter catalog name">
    <span class="text-danger">
        @error('catalog_name')
            {{$message}}
        @enderror
    </span>
    <hr>
    <input type="hidden" name="id" value="{{$id}}">
    <button type="submit" class="btn btn-success m-auto">Update Catalog</button>
</form>

@include('includes.footer')