<table class="table table-striped mt-3 text-center" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>نام گزارش</th>
        <th>توضیحات</th>
        <th>مشتری</th>
        <th>فایل بارگزاری شده</th>
        <th>ایجاد شده</th>
        <th>ویرایش شده</th>
        <th>ویرایش</th>

    </tr>
    </thead>
    <tbody style="vertical-align: middle;">

    @forelse ($reports as $key => $report)
    <tr>
        <th scope="row">{{ $reports->firstItem() + $key }}</th>
        <td>{{ $report->name }}</td>
        <td>{{ Str::limit($industry->description, 40, $end='...') }}</td>
        <td>{{ $report->user_id }}</td>
        <td>{{ $report->created_at }}</td>
        <td>{{ $report->updated_at }}</td>
        <td>{{ $report->path }}</td>
        <td>
            <a href="{{ route('admin.reports.edit', $report->slug) }}" class="btn btn-warning">ویرایش</a>
        </td>
        <td>
            <form action="{{ route('admin.industries.destroy', $report->slug) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i>حذف</button>
            </form>
        </td>
        {{-- <td> {{ $report->created_at }}</td>
        <td> {{ $report->updated_at }}</td> --}}
    </tr>
    @empty
        <tr>
            <th>هنوز رکوردی وجود ندارد!</th>
        </tr>
    @endforelse

    </tbody>
</table>

{{ $reports->links() }}