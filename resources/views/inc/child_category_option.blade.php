@if($child_category->status == 1)
    
    @if($child_category->has_children)
        @if($child_category->categories)
            <optgroup>
                @foreach ($child_category->categories as $childCategory)
                    @if($childCategory->status == 1)
                        @include('inc.child_category_option', ['child_category' => $childCategory])
                    @endif
                @endforeach
            </optgroup>
        @endif
    @else
        <option value="{{ $child_category->id }}" {{ (old('category_id') == $child_category->id) ? 'selected' : '' }}>{{ $child_category->name_tk }}</option>
    @endif
@endif
