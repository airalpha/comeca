<template>
    <div class="direct-chat-messages">
        <!-- Message. Default to the left -->
        <div class="direct-chat-msg" :class="message.to===contact.id ? 'right' : 'left'" v-for="message in messages" :key="message.id">
            <div class="direct-chat-infos clearfix">
                <span class="direct-chat-name float-left">Idrice Roussin</span>
                <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
            </div>
            <!-- /.direct-chat-infos -->
            <img class="direct-chat-img" src="/uploads/profile/avatar.png" alt="message user image">
            <!-- /.direct-chat-img -->
            <div class="direct-chat-text">
                {{ message.text }}
            </div>
            <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->
    </div>
</template>

<script>
    export default {
        name: "MessagesFeed",

        props: {
            contact: {
                type: Object
            },
            messages: {
                type: Array,
                required: true
            }
        },

        data(){
            return {

            }
        }
    }
</script>

<style scoped>
    .direct-chat-messages {
        height: inherit;
    }
</style>
