<table class="table table-striped mt-3 text-center table-hover" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Slug</th>
        <th>نام</th>
        {{-- <th>توضیحات</th> --}}
        <th></th>
        <th>Actions</th>
        <th></th>
        <th>ایجاد شده</th>
        <th>ویرایش شده</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">

    @forelse ($services as $key => $service)
    <tr onclick="window.location='{{ route('services.show', $service->slug) }}'" style="cursor: pointer;">
        <th scope="row">{{ $services->firstItem() + $key }}</th>
        <td>{{ $service->slug }}</td>
        <td>{{ $service->name }}</td>
        {{-- <td>{{ Str::limit($service->description, 40, $end='...') }}</td> --}}
        <td>
            <a href="{{ route('admin.specialServices.create', $service->slug) }}" class="btn btn-success">افزودن خدمات خاص</a>
        </td>
        <td>
            <a href="{{ route('admin.services.edit', $service->slug) }}" class="btn btn-warning">ویرایش</a>
        </td>
        <td>
            <form action="{{ route('admin.services.destroy', $service->slug) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </td>
        <td> {{ $service->created_at }}</td>
        <td> {{ $service->updated_at }}</td>
    </tr>
    @empty
        <tr>
            <th>هنوز رکوردی وجود ندارد!</th>
        </tr>
    @endforelse

    </tbody>
</table>

{{ $services->links() }}