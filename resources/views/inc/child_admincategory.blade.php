<div class="row row-for-single-category">
    <div class="col-8 alert pl-5">{{ $child_category->name_tk }}</div>
    <div class="col-3 alert text-center {{ ($child_category->status) ? 'alert-success' : 'alert-danger' }}" role="alert">
        {{ ($child_category->status) ? 'Отображается' : 'Не отображается' }}
    </div>
    <div class="col-1 alert d-flex justify-content-center">
        <a href="{{ route('admin_categories_edit',['id'=>$child_category->id]) }}" title="Изменить"><i class="fas fa-edit"></i></a>
    </div>
</div>

@if($child_category->categories)
    @foreach ($child_category->categories as $childCategory)
        @include('inc.child_admincategory', ['child_category' => $childCategory])
    @endforeach
@endif