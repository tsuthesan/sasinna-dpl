<div class="col-xs-12 col-sm-12 col-md-7">
    <div class="form-group">


        @livewire('create-group')

        <select name="avg_cost" class="form-select" aria-label="Default select example">
            <option value="" selected >-- select Product Group--</option>
            @forelse ($product_groups as $product_group)
                <option value="{{ $product_group->id }}">{{ $product_group->name }}</option>
            @empty
                <option value="">N/A</option>
            @endforelse
        </select>
    </div>
</div>
