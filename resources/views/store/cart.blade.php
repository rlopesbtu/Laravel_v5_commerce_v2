@extends('store.store')


@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Descricao</td>
                        <td class="price">Valor</td>
                        <td class="price">Qtde</td>
                        <td class="price">Total</td>
                        <td></td>
                    </tr>
                    </thead>

                    <tbody>
                @forelse($cart->all() as $k=>$item)
                    {!! Form::open(['route'=>['cart.update', $k], 'method'=>'put']) !!}
                    <tr>
                        <td class="cart_product">
                            <a href="{{ route('store.product', ['id'=>$k]) }}">
                                Imagem
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{ route('store.product', ['id'=>$k]) }}">{{ $item['name'] }}</a> </h4>
                            <p>Codigo: {{ $k }}</p>
                        </td>
                        <td class="cart_price">
                            R$ {{ number_format($item['price'], 2, ',', '.') }}
                        </td>
                        <td class="cart_quantity">
                            <div class="input-group" style="width: 45px">
                                {!! Form::text('qtd', $item['qtd'], ['class'=>'form-control']) !!}
                            </div>
                        </td>

                        <td class="cart_total">

                            <p class="cart_total_price"> R$ {{ $item['price'] * $item['qtd'] }}</p>
                        </td>
                        <td class="cart_delete">
                            <a href="{{route('cart.destroy',['id'=>$k])}}" class="cart_quantity_button">Delete</a>
                        </td>
                    </tr>
                 @empty
                    <tr>
                        <td class="" colspan="6">
                            <p>Nenhum item encontrado!</p>
                        </td>
                    </tr>
                    {!! Form::close() !!}
                 @endforelse
                    <tr class="cart_menu">
                        <td colspan="6">

                            <div class="pull-right">


                                <span style="margin-right: 10px">
                                    TOTAL: R$ {{ $cart->getTotal() }}
                                </span>
                                {!! Form::submit('Atualizar Carrinho', ['class'=>'btn btn-default']) !!}
                                <a href="#" class="btn btn-success">Fechar a conta</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>

                </table>

            </div>
        </div>
    </section>
@stop