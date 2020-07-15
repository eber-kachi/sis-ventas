@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($product->title) ? $product->title : 'Product' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('products.product.destroy', $product->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('products.product.index') }}" class="btn btn-primary" title="Show All Product">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('products.product.create') }}" class="btn btn-success" title="Create New Product">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('products.product.edit', $product->id ) }}" class="btn btn-primary" title="Edit Product">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product" onclick="return confirm(&quot;Click Ok to delete Product.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Store</dt>
            <dd>{{ optional($product->Store)->id }}</dd>
            <dt>Sub Category</dt>
            <dd>{{ optional($product->SubCategory)->name }}</dd>
            <dt>Title</dt>
            <dd>{{ $product->title }}</dd>
            <dt>Price</dt>
            <dd>{{ $product->price }}</dd>
            <dt>Description</dt>
            <dd>{{ $product->description }}</dd>
            <dt>Stock</dt>
            <dd>{{ $product->stock }}</dd>
            <dt>Created At</dt>
            <dd>{{ $product->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $product->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection