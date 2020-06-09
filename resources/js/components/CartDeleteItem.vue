<template>
    <a  href="" @click.prevent="deleteItem"><i class="icon_close"></i></a>
</template>

<script>
    export default {
        name: "CartDeleteItem",

        props: {
            rowId: String,
        },

        methods: {
            deleteItem() {
                this.$Progress.start();
                axios.delete('/api/cart/'+this.rowId)
                    .then((data) => {
                        setTimeout(location.reload(), 2000);
                        Toast.fire({
                            icon: data.data.type,
                            title: data.data.message
                        });
                        this.$Progress.finish();
                    }, (error)=> {
                        this.$Progress.fail();
                    });
            }
        },

        mounted(){
        },
    }
</script>

<style scoped>

</style>
