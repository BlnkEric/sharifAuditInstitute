<table class="table table-striped mt-3 text-center" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Slug</th>
        <th>نام</th>
        <th>توضیحات</th>
        <th colspan="2">Actions</th>
        <th>ایجاد شده</th>
        <th>ویرایش شده</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">

    @forelse ($industries as $key => $industry)
    <tr>
        <th scope="row">{{ $industries->firstItem() + $key }}</th>
        <td>{{ $industry->slug }}</td>
        <td>{{ $industry->name }}</td>
        <td>{{ Str::limit($industry->description, 40, $end='...') }}</td>
        <td>
            <a href="{{ route('admin.industries.edit', $industry->slug) }}" class="btn btn-warning">
                <div>
                    <i style="margin-left: 5px" class="fs-5 fa fa-edit"></i>
                    <div class="fw-bold">
                        ویرایش
                    </div>
                </div>
            </a>
        </td>
        <td>
            <form action="{{ route('admin.industries.destroy', $industry->slug) }}" method="POST">
                @csrf
                @method('delete')
                <a as="button" type="submit" class="btn btn-danger">
                    <div>
                        <i style="margin-left: 5px" class="fs-5 fa fa-trash"></i>
                        <div class="fw-bold">
                            حذف
                        </div>
                    </div>
                </a>
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