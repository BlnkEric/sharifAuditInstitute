<table class="table table-striped mt-3 text-center" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>نام</th>
        <th>نام شرکت</th>
        <th>Actions</th>
        <th>ایجاد شده</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">

    @forelse ($proposals as $key => $proposal)
    <tr>
        <th scope="row">{{ $proposals->firstItem() + $key }}</th>
        <td>{{ $proposal->name }}</td>
        <td>{{ $proposal->company_name }}</td>
        <td>
            <form action="{{ route('admin.proposals.destroy', $proposal->slug) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i>حذف</button>
            </form>
        </td>
        <td> {{ $proposal->created_at }}</td>
    </tr>
    @empty
        <tr>
            <th>هنوز رکوردی وجود ندارد!</th>
        </tr>
    @endforelse

    </tbody>
</table>

{{ $proposals->links() }}