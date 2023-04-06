<table class="table table-striped mt-3 text-center table-hover" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Slug</th>
        <th>نام</th>
        {{-- <th>توضیحات</th> --}}
        <th colspan="4">Actions</th>
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
            <a href="{{ route('admin.specialServices.index', $service->slug) }}" class="btn btn-info fs-6">
                <div>
                    <i style="margin-left: 5px" class="fs-5 fa fa-arrow-down"></i>
                    <div class="fw-bold">
                        خدمات خاص
                    </div>
                </div>
            </a>
        </td>
        <td>
            <a href="{{ route('admin.specialServices.create', $service->slug) }}" class="btn btn-success fs-6">
                <div>
                    <i style="margin-left: 5px" class="fs-5 fa fa-plus"></i>
                    <div class="fw-bold">
                        افزودن خدمات خاص
                    </div>
                </div>
            </a>
        </td>
        <td>
            <a href="{{ route('admin.services.edit', $service->slug) }}" class="btn btn-warning">
                <div>
                    <i style="margin-left: 5px" class="fs-5 fa fa-edit"></i>
                    <div class="fw-bold">
                        ویرایش
                    </div>
                </div>
            </a>
        </td>
        <td>
            <form action="{{ route('admin.services.destroy', $service->slug) }}" method="POST">
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