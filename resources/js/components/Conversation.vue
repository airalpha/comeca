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
            }
        }
    }
</script>

<style scoped>

</style>
