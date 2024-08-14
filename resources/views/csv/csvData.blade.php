<form action="{{ route('csv.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="file" name="csv_file" accept=".csv">
    <button type="submit">Upload CSV</button>
</form>
