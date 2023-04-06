<table class="table table-striped mt-3 text-center table-hover" style="border-color: black;" border="1px;">
    <thead>
    <tr>
        <th>#</th>
        <th>نام</th>
        <th>صنعت</th>
        <th>خدمات دریافتی</th>
        <th colspan="2">Actions</th>
        <th>لوگو مشتری</th>
        <th>ایجاد شده</th>
        <th>ویرایش شده</th>
    </tr>
    </thead>
    <tbody style="vertical-align: middle;">

    @forelse ($clients as $key => $client)
    <tr onclick="window.location='{{ route('admin.clients.show', $client->id) }}'" style="cursor: pointer;">
        <th scope="row">{{ $clients->firstItem() + $key }}</th>
        <td>{{ $client->name }}</td>
        @if($client->industry != null)
            <td>{{ $client->industry->name }}</td>
        @else
            <td>یافت نشد</td>
        @endif

        {{-- <td>
            {{ $client->services() }}
            @foreach($client as $key => $service)
                {{ $key }}
            @endforeach
        </td> --}}
        @if($client->services != null)
            <td>
                <ul>
                    @foreach($client->services as $key => $value)
                        <li>
                            {{ $value->name }}
                        </li>
                    @endforeach
                </ul>
                {{-- {{ $client->services[0]->contracted }} --}}
            </td>
        @else
            <td>یافت نشد</td>
        @endif

        <td>
            <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-warning">
                <div>
                    <i style="margin-left: 5px" class="fs-5 fa fa-edit"></i>
                    <div class="fw-bold">
                        ویرایش
                    </div>
                </div>
            </a>
        </td>
        <td>
            <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST">
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

        <td>         
            {{-- {{ $client->image }} --}}
            @if($client->image)
                @if ($client->image->path == 'seed')
                    <img src="https://picsum.photos/200/300" 
                    style="max-width: 100%;
                    max-height: 100%;">
                @else
                    <img class="rounded-circle" src="{{ $client->image->url() }}" 
                    style="width: 50px;
                    height: 50px;">
                @endif
            @endif
        </td>
        
        <td> {{ $client->created_at }}</td>
        <td> {{ $client->updated_at }}</td>
    </tr>
    @empty
        <tr>
            <th>هنوز رکوردی وجود ندارد!</th>
        </tr>
    @endforelse

    </tbody>
</table>

{{ $clients->links() }}