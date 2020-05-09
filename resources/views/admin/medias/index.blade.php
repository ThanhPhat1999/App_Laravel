@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">Welcome to Media</h1>
    <form action="/delete/media" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <div id="bulkOptionContainer" class="col-xs-4 form-group">
                    <select name="bulkOptions" id="" class="form-control">
                        <option value="">Choose Options</option>
                        <option value="delete">Delete</option>
                    </select>
                </div>
                <div class="col-xs-4">
                    <input type="submit" value="Apply" name="submit" class="btn btn-success">
                    <a href="{{ route('media.create') }}" class="btn btn-primary">Upload</a>
                </div>
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAllBoxes"></th>
                        <th>Image</th>
                        <th>Created</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($photos)
                        @foreach ($photos as $photo)
                            <tr>
                                <td><input class="checkboxes" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}"></td>
                                <td><img height="50" src="{{ $photo->path }}" alt=""></td>
                                <td>{{ $photo->created_at->diffForHumans() }}</td>
                                <td>
                                    <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                                    <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#selectAllBoxes').click(function() {
                if(this.checked)
                {
                    $('.checkboxes').each(function(){
                        this.checked = true;
                    })
                }
                else {
                    $('.checkboxes').each(function(){
                        this.checked = false;
                    })
                }
            })
        });
    </script>
@endsection
