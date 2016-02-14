@extends('store.store')

@section('categories')
    @include('store.categories_partial')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Nome da Categoria</h2>

            @include('store.product_partial', ['product'=> $products])

        </div><!--features_items-->
    </div>
@stop