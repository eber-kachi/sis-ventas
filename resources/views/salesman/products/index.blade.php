@extends('layouts.adminReports')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card">

        <div class="card-header">

            <div class="float-left">
                <h4 class="heading-title">Productos</h4>
            </div>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('products.product.create') }}" class="btn btn-success" title="Create New Product">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($products) == 0)
            <div class="panel-body text-center">
                <h4>No Products Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Store</th>
                            <th>Sub Category</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ optional($product->Store)->id }}</td>
                            <td>{{ optional($product->SubCategory)->name }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>

                            <td>

                                <form method="POST" action="{!! route('products.product.destroy', $product->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('products.product.show', $product->id ) }}" class="btn btn-info" title="Show Product">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('products.product.edit', $product->id ) }}" class="btn btn-primary" title="Edit Product">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product" onclick="return confirm(&quot;Click Ok to delete Product.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $products->render() !!}
        </div>

        @endif

    </div>
@endsection
