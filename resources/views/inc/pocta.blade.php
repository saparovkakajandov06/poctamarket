<section class="section-4 section-4-2 wrapper d-flex spacebetween aligncenter">
    <div class="sign-in-form-container">
        <h2>Скидки, акции, новинки Подпишитесь</h2>
        <form class="" action="{{ route('pocta.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row flex alignend login-div-input-1">

                <input type="email" name="email" required placeholder="Ваш Email" class="input-group">
            </div>

            <input type="submit" name="" value="Подписаться">
        </form>

    </div>

</section>