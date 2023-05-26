<div>
    <strong>Product Group:</strong><span class="text-danger">*</span>
    <a wire:click="$set('show', true)" class="btn btn-primary btn-md"
       type="button"
       wire:click.prevent="$emit('showModal', 'SomeData')"
    >Add Products</a>

    <div class="modal fade @if($show === true) show @endif"
         id="myExampleModal"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button class="close"
                            type="button"
                            aria-label="Close"
                            wire:click.prevent="doClose()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Modal Content:
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Name:</strong><span class="text-danger">*</span>
                            <input type="text" name="name" class="form-control" wire:model="name" placeholder="Name of the item"
                                   required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Description:</strong><span class="text-danger">*</span>
                            <input type="text" name="description" class="form-control" wire:model="description" placeholder="Description"
                                   required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="form-group">
                            <strong>Attribute Name :</strong><span class="text-danger">*</span>
                            <select name="atb_id" class="form-select" aria-label="Default select example" wire:model="atb_id">
                                <option value="" selected >-- select Attribute--</option>
                                @foreach($attributes as $attribute)
                                    <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--                    <div class="col-xs-12 col-sm-12 col-md-7">--}}
                    {{--                    <div class="form-group">--}}
                    {{--                        <strong>Description:</strong><span class="text-danger">*</span>--}}
                    {{--                        <input type="text" wire:modal="description" name="description" class="form-control" placeholder="Description"--}}
                    {{--                               required>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary"
                            type="button"
                            wire:click.prevent="doClose()">Cancel</button>

                    <button class="btn btn-secondary"
                            type="button"
                            wire:click.prevent="doSomething()">Do Something</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Let's also add the backdrop / overlay here -->
    <div class="modal-backdrop fade show"
         id="backdrop"
         style="display: @if($show === true)
                 block
         @else
                 none
         @endif;"></div>
</div>
