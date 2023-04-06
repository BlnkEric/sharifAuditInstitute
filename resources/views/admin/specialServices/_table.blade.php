<table class="table table-striped mt-3 text-center table-hover" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Slug</th>
        <th>نام</th>
        <th colspan="2">Actions</th>
        <th>ایجاد شده</th>
        <th>ویرایش شده</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">

    @forelse ($special_services as $key => $special_service)
    <tr onclick="window.location='{{ route('specialServices.show', $special_service->slug) }}'" style="cursor: pointer;">
        <th scope="row">{{ $special_services->firstItem() + $key }}</th>
        <td>{{ $special_service->slug }}</td>
        <td>{{ $special_service->name }}</td>
        {{-- <td>{{ Str::limit($special_service->description, 40, $end='...') }}</td> --}}
        <td>
            <a href="{{ route('admin.specialServices.edit', ['service' => $service->slug, 'specialService' => $special_service->slug]) }}" class="btn btn-warning">
                <div>
                    <i style="margin-left: 5px" class="fs-5 fa fa-edit"></i>
                    <div class="fw-bold">
                        ویرایش
                    </div>
                </div>
            </a>
        </td>
        <td>
            <form action="{{ route('admin.specialServices.destroy', ['service' => $service->slug, 'specialService' => $special_service->slug]) }}" method="POST">
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
        <td> {{ $special_service->created_at }}</td>
        <td> {{ $special_service->updated_at }}</td>
    </tr>
    @empty
        <tr>
            <th>هنوز رکوردی وجود ندارد!</th>
        </tr>
    @endforelse

    </tbody>
</table>

{{ $special_services->links() }}