<template>
    <div class="direct-chat-messages">
        <div v-if="contact">
            <!-- Message. Default to the left -->
            <div class="direct-chat-msg mt-3" :class="message.to===contact.id ? 'right' : 'left'" v-for="message in messages" :key="message.id">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name" :class="message.to===contact.id ? 'float-right' : 'float-left'">{{ message.to !== contact.id ? contact.name : $gate.user.name }}</span>
                    <span class="direct-chat-timestamp" :class="message.to===contact.id ? 'float-left' : 'float-right'">{{ message.date }}</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img" :src="message.to!==contact.id ? contact.profile.avatar : $gate.user.profile.avatar" alt="message user image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    {{ message.text }}
                </div>
                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
        </div>
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
                from: {},
            }
        }
    }
</script>

<style scoped>
    .direct-chat-messages {
        height: inherit;
    }
</style>
