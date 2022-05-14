@if($child_category->status == 1)
    <li><a href="{{ route('productsByCatalog',['id'=>$child_category->id]) }}">{{ $child_category->name_tk }}</a></li>
@endif