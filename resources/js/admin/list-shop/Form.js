import AppForm from '../app-components/Form/AppForm';

Vue.component('list-shop-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name_shop:  '' ,
                address:  '' ,
                
            }
        }
    }

});