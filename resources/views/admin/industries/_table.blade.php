<table class="table table-striped mt-3 text-center" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Slug</th>
        <th>نام</th>
        <th>توضیحات</th>
        <th>Actions</th>
        <th></th>
        <th>ایجاد شده</th>
        <th>ویرایش شده</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">

    @forelse ($industries as $industry)
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $industry->slug }}</td>
        <td>{{ $industry->name }}</td>
        <td>{{ Str::limit($industry->description, 40, $end='...') }}</td>
        <td>
            <a href="{{ route('admin.industries.edit', $industry->slug) }}" class="btn btn-warning">ویرایش</a>
        </td>
        <td>
            <form action="{{ route('admin.industries.destroy', $industry->slug) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i>حذف</button>
            </form>
        </td>
        <td> {{ $industry->created_at }}</td>
        <td> {{ $industry->updated_at }}</td>
    </tr>
    @empty
        <tr>
            <th>هنوز رکوردی وجود ندارد!</th>
        </tr>
    @endforelse

    </tbody>
</table>

{{ $industries->links() }}