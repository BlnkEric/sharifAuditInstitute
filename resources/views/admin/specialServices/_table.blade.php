<table class="table table-striped mt-3 text-center table-hover" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Slug</th>
        <th>نام</th>
        <th>متعلق به خدمت اصلی</th>
        <th>Actions</th>
        <th></th>
        <th>ایجاد شده</th>
        <th>ویرایش شده</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">

    @forelse ($special_services as $key => $service)
    <tr onclick="window.location='{{ route('services.show', $service->slug) }}'" style="cursor: pointer;">
        <th scope="row">{{ $special_services->firstItem() + $key }}</th>
        <td>{{ $service->slug }}</td>
        <td>{{ $service->name }}</td>
        <td>{{ $service->service->name }}</td>
        {{-- <td>{{ Str::limit($service->description, 40, $end='...') }}</td> --}}
        <td>
            <a href="{{ route('admin.specialServices.edit', ['service' => $service->service->slug, 'specialService' => $service->slug]) }}" class="btn btn-warning">ویرایش</a>
        </td>
        <td>
            <form action="{{ route('admin.specialServices.destroy', $service->slug) }}" method="POST">
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

{{ $special_services->links() }}