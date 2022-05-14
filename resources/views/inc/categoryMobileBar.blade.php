<ul class="mobile-menu-ul" id="accordion">
    @isset($categories)

        <div class="d-flex s-c-n-container">
            <a href="{{ route('getNewProds') }}" class="menu-item">Täze</a>
            
        </div>

        @foreach ($categories as $category)
            @if($category->status == 1)
                <li class="mobile-menu-ul-item">
        
                    <a 
                        class="{{ ($category->has_children) ? 'link-acc' : '' }}"
                        {{ ($category->has_children) ? '' : "href=" . route('productsByCatalog',['id'=>$category->id]) }}
                    >{{ $category->name_tk }}</a>

                    <ul class="submenu">
                        @foreach ($category->childrenCategories as $childCategory)
                            @if($childCategory->status == 1)
                                @include('inc.child_category_for_mobile', ['child_category' => $childCategory])
                            @endif
                        @endforeach
                       
                    </ul>
                </li>
            @endif
        @endforeach
    



    <li class="mobile-menu-ul-item">
        <a href="{{ route('news') }}">Habar</a>
    </li>

    @endisset
</ul>