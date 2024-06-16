@php
    $list = ['Item #1', 'Item #2', 'Item #3'];
@endphp

<ul>
    @foreach ($list as $item)
        @include('includes.item')
    @endforeach
</ul>
