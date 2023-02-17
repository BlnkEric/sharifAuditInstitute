<table class="table table-striped mt-3 text-center table-hover" style="border-color: black;" border="1px;">
    <thead>
        <tr>
            <th>#</th>
            <th>Slug</th>
            <th>عنوان</th>
            <th>Actions</th>
            <th></th>
            <th>ایجاد شده</th>
            <th>ویرایش شده</th>
        </tr>
    </thead>
    <tbody style="vertical-align: middle;">

        @forelse ($articles as $key => $article)
            <tr onclick="window.location='{{ route('articles.show', $article->slug) }}'" style="cursor: pointer;">
                <th scope="row">{{ $articles->firstItem() + $key }}</th>
                <td>{{ $article->slug }}</td>
                <td>{{ $article->name }}</td>
                <td>
                    <a href="{{ route('admin.articles.edit', $article->slug) }}" class="btn btn-warning">ویرایش</a>
                </td>
                <td>
                    <form action="{{ route('admin.articles.destroy', $article->slug) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i>حذف</button>
                    </form>
                </td>
                <td> {{ $article->created_at }}</td>
                <td> {{ $article->updated_at }}</td>
            </tr>
        @empty
            <tr>
                <th>هنوز رکوردی وجود ندارد!</th>
            </tr>
        @endforelse

    </tbody>
</table>

{{ $articles->links() }}
