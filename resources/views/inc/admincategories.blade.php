@isset($categories)
    @foreach ($categories as $category)
        <div class="row row-for-single-category">
            <div class="col-8 alert"><strong>{{ $category->name_tk }}</strong></div>
            <div class="col-3 alert text-center {{ ($category->status) ? 'alert-success' : 'alert-danger' }}" role="alert">
                {{ ($category->status) ? 'Отображается' : 'Не отображается' }}
            </div>
            <div class="col-1 alert d-flex justify-content-center">
                <a href="{{ route('admin_categories_edit',['id'=>$category->id]) }}" title="Изменить"><i class="fas fa-edit"></i></a>
            </div>
        </div>

        @foreach ($category->childrenCategories as $childCategory)
            @include('inc.child_admincategory', ['child_category' => $childCategory])
        @endforeach

    @endforeach
@endisset