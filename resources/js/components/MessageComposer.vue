<template>
    <div class="card-footer">
        <form action="#" method="post">
            <div class="row text-center">
                <div class="col-md-12">
                    <vue-editor v-model="message" @keydown.enter="send"></vue-editor>
                </div>
                <div class="col-md-12">
                    <button id="send-btn" type="button" class="col-md-12 btn btn-primary" @click="send">Send</button>
                </div>
            </div>
            <div class="input-group">

                <!--<textarea name="message" v-model="message" @keydown.enter="send" placeholder="Message ..." class="form-control"></textarea>-->
            </div>
        </form>
    </div>
    <!-- /.card-footer-->
</template>

<script>
    import { VueEditor } from "vue2-editor";
    export default {
        name: "MessageComposer",
        components: {
            VueEditor
        },
        data() {
            return {
                message: ''
            }
        },

        mounted() {
            document.getElementsByClassName("ql-formats")[7].style.display = 'none';
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
    #send-btn {
        z-index: auto;
    }
</style>
