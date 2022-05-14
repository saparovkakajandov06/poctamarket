<div class="menu d-flex aligncenter">

    @isset($categories)

        <div class="d-flex s-c-n-container">
            <a href="{{ route('getNewProds') }}" class="menu-item">Täze</a>
            
        </div>

        @foreach ($categories as $category)
            @if($category->status == 1)
            <div class="d-flex s-c-n-container">
                <a class="menu-item" href={{ route('productsByCatalog',['id'=>$category->id]) }}>{{ $category->name_tk }}</a>
                
                <div class="subcategory-new-1">
                    @foreach ($category->childrenCategories as $childCategory)
                        @if($childCategory->status == 1)
                            @include('inc.child_category', ['child_category' => $childCategory])
                        @endif
                    @endforeach
                </div>
            </div>
            
            @endif
        @endforeach


        <div class="d-flex s-c-n-container">
            <a href="{{ route('news') }}" class="menu-item">HABAR</a>
            
        </div>
        
    @endisset
    
</div>