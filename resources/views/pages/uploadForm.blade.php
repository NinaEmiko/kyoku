<form action="/upload" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    Project name:
    <br />
    <input type="text" name="name" />
    <br /><br />
    Project tracks (can attach up to two)
    <br />
    <input type="file" name="tracks[]" multiple />
    <br /><br />
    <input type="submit" value="Upload" />
</form>

{{-- https://laraveldaily.com/upload-multiple-files-laravel-5-4/ --}}