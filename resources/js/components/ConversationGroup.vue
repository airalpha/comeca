<template>
    <div>
        <messages-feed-group :messages="messages" />
        <message-composer @send="sendMessage" />
    </div>
</template>

<script>
    export default {
        name: "ConversationGroup",

        props: {
            messages: {
                type: Array,
                default: []
            }
        },

        data(){
            return {

            }
        },

        methods: {
            sendMessage(text) {
                let form = new Form({
                    contact_id: null,
                    text: text
                });
                form.post('/api/conversation/send')
                .then((response) => {
                    this.$emit("new", response.data);
                });
            }
        }
    }
</script>

<style scoped>

</style>
