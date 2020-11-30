
<div>
    <label class="col-form-label fw-normal{{ $errors->has('products.' . $product->id . '.id*') ? ' has-error' : '' }}">
        Название 
        <select name="products[{{ $i ?? $product->id }}][id]" class="form-control" required>
            @foreach ($all_products as $a_product)
                <option value="{{ $product->id }}"{{ old('products.' . $product->id . '.id') && old('products.' . $product->id . '.id') == $partner->id ? ' selected' : ($product->id == $a_product->id ? ' selected' : '') }}>{{ $product->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('products.' . $product->id . '.id*'))
            @include('service.validation_error', ['err_array' => $errors->get('products.' . $product->id . '.id*')])
        @endif
    </label>
    <label class="col-form-label fw-normal{{ $errors->has('products.' . $product->id . '.quantity*') ? ' has-error' : '' }}">
        Количество 
        <input name="products[{{ $i ?? $product->id }}][quantity]" class="form-control" value="{{ old('products.' . $product->id . '.quantity') ?? $product->pivot->quantity }}" required>
        @if ($errors->has('products.' . $product->id . '.quantity*'))
            @include('service.validation_error', ['err_array' => $errors->get('products.' . $product->id . '.quantity*')])
        @endif
    </label>
</div>
