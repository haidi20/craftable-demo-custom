<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name_shop'), 'has-success': this.fields.name_shop && this.fields.name_shop.valid }">
    <label for="name_shop" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.list-shop.columns.name_shop') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name_shop" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name_shop'), 'form-control-success': this.fields.name_shop && this.fields.name_shop.valid}" id="name_shop" name="name_shop" placeholder="{{ trans('admin.list-shop.columns.name_shop') }}">
        <div v-if="errors.has('name_shop')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name_shop') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': this.fields.address && this.fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.list-shop.columns.address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': this.fields.address && this.fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.list-shop.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>


