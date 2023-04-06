<table class="table table-striped mt-3 text-center table-hover" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Slug</th>
        <th>نام</th>
        <th>سمت</th>
        <th>توضیحات</th>
        <th colspan="2">Actions</th>
        <th>ایجاد شده</th>
        <th>ویرایش شده</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">

    @forelse ($staffs as $key => $staff)
    <tr onclick="window.location='{{ route('staffs.show', $staff->slug) }}'" style="cursor: pointer;">
        <th scope="row">{{ $staffs->firstItem() + $key }}</th>
        <td>{{ $staff->slug }}</td>
        <td>{{ $staff->name }}</td>
        <td>{{ $staff->role }}</td>
        <td>{{ Str::limit($staff->description, 40, $end='...') }}</td>
        <td>
            <a href="{{ route('admin.staffs.edit', $staff->slug) }}" class="btn btn-warning">
                <div>
                    <i style="margin-left: 5px" class="fs-5 fa fa-edit"></i>
                    <div class="fw-bold">
                        ویرایش
                    </div>
                </div>
            </a>
        </td>
        <td>
            <form action="{{ route('admin.staffs.destroy', $staff->slug) }}" method="POST">
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
        <td> {{ $staff->created_at }}</td>
        <td> {{ $staff->updated_at }}</td>
    </tr>
    @empty
        <tr>
            <th>هنوز رکوردی وجود ندارد!</th>
        </tr>
    @endforelse

    </tbody>
</table>

{{ $staffs->links() }}