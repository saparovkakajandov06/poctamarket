@if($child_category->status == 1)
    <a class="s-c-n-item" href="{{ route('productsByCatalog',['id'=>$child_category->id]) }}">{{ $child_category->name_tk }}</a>

    @if($child_category->categories)
        <ul>
            @foreach ($child_category->categories as $childCategory)
                @if($childCategory->status == 1)
                    @include('inc.child_category', ['child_category' => $childCategory])
                @endif
            @endforeach
        </ul>
    @endif
@endif
