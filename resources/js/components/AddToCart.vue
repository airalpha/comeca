<template>
    <a href="#" class="add-to-cart-btn" @click.stop="addToCart(product)">Add to cart</a>
</template>

<script>
    export default {
        name: "AddToCart",

        data() {
            return {
                hide: true,
                form: new Form({
                    id: '',
                    name: '',
                    price: '',
                    qte: '1',
                }),
            }
        },

        props: {
            product: Object,
        },

        methods: {
            addToCart(product) {
                this.form.fill(product);
                this.form.qte = $("#qty").val();
                this.$Progress.start();
                this.form.post('/api/cart')
                    .then((data) => {
                        Fire.$emit('Aftercreate');
                        console.log(data);
                        Toast.fire({
                            icon: data.data.type,
                            title: data.data.message
                        });
                        this.$Progress.finish();
                    }, (error) => {
                        this.$Progress.fail();
                    });
            },
        },

        mounted() {
            console.log("Mounted");
        }
    }
</script>

<style scoped>

</style>
