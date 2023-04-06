<table class="table table-striped mt-3 text-center table-hover" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>Slug</th>
        <th>نام</th>
        {{-- <th>توضیحات</th> --}}
        <th colspan="2">Actions</th>
        <th>ایجاد شده</th>
        <th>ویرایش شده</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">

    @forelse ($jobOffers as $key => $jobOffer)
    <tr onclick="window.location='{{ route('admin.jobOffers.show', $jobOffer->slug) }}'" style="cursor: pointer;">
        <th scope="row">{{ $jobOffers->firstItem() + $key }}</th>
        <td>{{ $jobOffer->slug }}</td>
        <td>{{ $jobOffer->name }}</td>
        {{-- <td>{{ Str::limit($jobOffer->description, 40, $end='...') }}</td> --}}
        <td>
            <a href="{{ route('admin.jobOffers.edit', $jobOffer->slug) }}" class="btn btn-warning">
                <div>
                    <i style="margin-left: 5px" class="fs-5 fa fa-edit"></i>
                    <div class="fw-bold">
                        ویرایش
                    </div>
                </div>
            </a>
        </td>
        <td>
            <form action="{{ route('admin.jobOffers.destroy', $jobOffer->slug) }}" method="POST">
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
        <td> {{ $jobOffer->created_at }}</td>
        <td> {{ $jobOffer->updated_at }}</td>
    </tr>
    @empty
        <tr>
            <th>هنوز رکوردی وجود ندارد!</th>
        </tr>
    @endforelse

    </tbody>
</table>

{{ $jobOffers->links() }}