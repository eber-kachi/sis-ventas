
<div class="form-group {{ $errors->has('store_id') ? 'has-error' : '' }}">
    <label for="store_id" class="col-md-2 control-label">Store</label>
    <div class="col-md-10">
        <select class="form-control" id="store_id" name="store_id" required="true">
        	    <option value="" style="display: none;" {{ old('store_id', optional($product)->store_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select store</option>
        	@foreach ($Stores as $key => $Store)
			    <option value="{{ $key }}" {{ old('store_id', optional($product)->store_id) == $key ? 'selected' : '' }}>
			    	{{ $Store }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('store_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sub_category_id') ? 'has-error' : '' }}">
    <label for="sub_category_id" class="col-md-2 control-label">Sub Category</label>
    <div class="col-md-10">
        <select class="form-control" id="sub_category_id" name="sub_category_id" required="true">
        	    <option value="" style="display: none;" {{ old('sub_category_id', optional($product)->sub_category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sub category</option>
        	@foreach ($SubCategories as $key => $SubCategory)
			    <option value="{{ $key }}" {{ old('sub_category_id', optional($product)->sub_category_id) == $key ? 'selected' : '' }}>
			    	{{ $SubCategory }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('sub_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title" class="col-md-2 control-label">Title</label>
    <div class="col-md-10">
        <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($product)->title) }}" minlength="1" maxlength="255" required="true" placeholder="Enter title here...">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">Price</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="number" id="price" value="{{ old('price', optional($product)->price) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter price here...">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($product)->description) }}" minlength="1" maxlength="500" required="true">
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
    <label for="stock" class="col-md-2 control-label">Stock</label>
    <div class="col-md-10">
        <input class="form-control" name="stock" type="number" id="stock" value="{{ old('stock', optional($product)->stock) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter stock here...">
        {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

