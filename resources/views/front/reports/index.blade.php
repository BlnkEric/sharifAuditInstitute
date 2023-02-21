@extends('front.layouts.app')

@section('title', 'گزارشات')

@section('content')
    <div class="container">
        <h1>گزارشات</h1>


        
    <!-- Table -->
    <div class="container tableContMain p-4">
        <table>
            <tr>
                <th style="width: 10%">نام قرارداد - (عنوان)</th>
                {{-- <th style="width: 10%"></th>
                <th style="width: 10%">تعداد موجود از این نوع</th> --}}
                <th style="width: 10%">تاریخ انعقاد قرارداد</th>
                <th style="width: 10%">تاریخ ویرایش قرارداد</th>
                <th style="width: 10%">فایل PDF قرارداد</th>
                <th style="width: 10%">حذف</th>
            </tr>
            <tr>
                @foreach ($reports as $report)
                <!-- {{ product.cart }} -->
                <td>{{ report.name  }}</td>
                <td>{{ report.created_At }}</td>
                <td>{{ report.updated_At }}</td>
                <td>{{ report.path }}</td>
                <td>
                @endforeach
                
            </tr>
        </table>

        
        {{-- <div class="row">
            @foreach ($reports as $report)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('reports.show', $report->slug) }}" class="card-link text-decoration-none text-dark">
                        <div class="card">
                            <img src="{{ $report->image->path == 'seed' ? 'https://picsum.photos/200/300' : $report->image->url() }}"
                                class="card-img-top" alt="{{ $report->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $report->title }}</h5>
                                <p class="card-text">{{ Str::limit($report->description, 20, $end='...') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div> --}}
    </div>
@endsection
