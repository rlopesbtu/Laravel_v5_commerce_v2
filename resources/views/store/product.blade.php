@extends('store.store')

@section('categories')
    @include('store.category')
@stop

@section('content')


    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    @if(count($products->images))
                        <img src="{{ url('uploads/'.$products->images->first()->id.'.'.$products->images->first()->extension) }}" alt=""/>
                    @else
                        <img src="{{ url('images/no-img.jpg') }}" alt="" width="200">
                    @endif

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($products->images as $image)
                                <a href="#"><img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" alt="" width="80"></a>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{ $products->name }}</h2>

                    <p>{{ $products->description }}</p>
                    <p>
                        @foreach($products->tags as $tag)
                            <a href="#" class="label label-primary">#</a>
                        @endforeach
                    </p>
                                <span>
                                    <span>R$ {{ number_format($products->price, 2, ',', '.') }}</span>
                                        <a href="#" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Adicionar no Carrinho
                                        </a>
                                </span>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
@stop