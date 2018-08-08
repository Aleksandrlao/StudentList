const app = new Vue({
    el: '#app',
    data: {
        errors: [],
        name: null,
        age: null,
        universityId: null
    },
    methods: {
        checkForm: function (e) {
            if (this.name && this.age) {
                return true;
            }

            this.errors = [];

            if (!this.name) {
                this.errors.push('Требуется указать имя.');
            } else if( this.name.length > 15) {
                this.errors.push('Имя должно быть длинее 15 символов.');
            }

            if (!this.age) {
                this.errors.push('Требуется указать возраст.');
            }



            e.preventDefault();
        }
    }
})