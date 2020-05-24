<template>
    <div>
        <messages-feed :contact="contact" :messages="messages" />
        <message-composer @send="sendMessage" />
    </div>
</template>

<script>
    export default {
        name: "Conversation",

        props: {
            contact: {
                type: Object,
                default: null
            },
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
                console.log(text);
                if(!this.contact)
                    return;
                let form = new Form({
                    contact_id: this.contact.id,
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
