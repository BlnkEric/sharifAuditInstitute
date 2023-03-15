@extends('admin.layouts.app')

@section('title', 'مدیریت موقعیت شغلی')

@section('content')
    <div class="container">
        <div class="row py-4 bg-white">
            @include('messages')
            <div class="row">
                <table class="table table-striped mt-3 text-center table-hover" style="border-color: black;" border="1px;">
                    <thead>
                    <tr>
                        <th>دانلود رزومه های ارسالی</th>
                        <th>عملیات</th>
                        <th>ایجاد شده</th>
                        <th>ویرایش شده</th>
                    </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                
                    @forelse ($jobOffer->jobRequests as $key => $jobRequest)
                    <tr style="cursor: pointer;" 
                        id="resume_{{$jobRequest->id}}"
                        >

                        <td>
                            <a 
                            onClick="backgroundIfDownloaded(this.parentNode.parentNode.id)"
                            href="{{ route('admin.jobRequests.download', $jobRequest->uuid) }}" 
                            class="btn btn-warning"
                            ">دانلود</a>
                        </td>
                        <td>
                            <form action="{{ route('jobRequests.destroy', $jobRequest->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i>حذف</button>
                            </form>
                        </td>
                        <td> {{ $jobRequest->created_at }}</td>
                        <td> {{ $jobRequest->updated_at }}</td>
                    </tr>
                    @empty
                        <tr>
                            <th>هنوز رکوردی وجود ندارد!</th>
                        </tr>
                    @endforelse
                
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>


@endsection

<script>
function backgroundIfDownloaded (clicked_id){
    document.getElementById(clicked_id).style.backgroundColor= "#00FF00";
}
</script>
