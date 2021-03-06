@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.list-shop.actions.edit', ['name' => $listShop->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <list-shop-form
                :action="'{{ $listShop->resource_url }}'"
                :data="{{ $listShop->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.list-shop.actions.edit', ['name' => $listShop->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.list-shop.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </list-shop-form>

        </div>
    
</div>

@endsection