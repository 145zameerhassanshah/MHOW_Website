
<h2>Sections for Page: {{ $page->title }}</h2>

<table class="table table-borderd table-sm table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Description</th>
            <th>Type</th>
            <th>Order</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pageSections as $index => $section)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $section->getTranslation('title', app()->getLocale()) }}</td>
                <td>{{ $section->getTranslation('subtitle', app()->getLocale()) }}</td>
                <td>{{ Str::limit($section->getTranslation('description', app()->getLocale()), 100) }}</td>
                <td>{{ $section->type }}</td>
                <td>{{ $section->order_no }}</td>
                <td>
                    @if ($section->image)
                        <img src="{{ asset('uploads/sections/' . $section->image) }}" width="100" />
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
