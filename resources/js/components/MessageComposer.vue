<template>
    <div class="card-footer">
        <form action="#" method="post">
            <div class="input-group">
                <textarea name="message" v-model="message" @keydown.enter="send" placeholder="Message ..." class="form-control"></textarea>
                <span class="input-group-append">
                      <button type="button" class="btn btn-primary" @click="send">Send</button>
                    </span>
            </div>
        </form>
    </div>
    <!-- /.card-footer-->
</template>

<script>
    export default {
        name: "MessageComposer",

        data() {
            return {
                message: ''
            }
        },

        mounted: function () {

        },

        methods: {
            send() {
                if (this.message === '')
                    return;
                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>

<style scoped>

</style>
