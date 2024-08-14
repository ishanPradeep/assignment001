<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
    </tr>
    </thead>
    <tbody>
    <?php if(count($document_list) > 0){?>
    @foreach ($document_list as $data)
        <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->phone_number }}</td>
        </tr>
    @endforeach
        <?php } ?>

    </tbody>
</table>

<div>
    {{ $document_list->links() }} <!-- Pagination Links -->
</div>
