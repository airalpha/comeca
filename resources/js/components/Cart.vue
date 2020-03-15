<template>
    <div>

    </div>
</template>

<script>
    export default {
        name: "Cart",

        data() {
            return {
                cart: {},
            }
        },

        methods: {
            loadCartContent() {
                this.$Progress.start();
                axios.get('/api/cart/')
                    .then((data) => {
                        this.cart = data.data;
                    }, (error) => {
                        this.$Progress.fail();
                    });
                this.$Progress.finish();
            }
        },

        mounted() {

        },

        created() {
            this.loadCartContent();
        }
    }
</script>

<style scoped>

</style>
