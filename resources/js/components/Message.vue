<template>
    <div class="mt-3 h-100">
        <div class="card  direct-chat direct-chat-primary direct-chat-contacts-open">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">{{ selectedContact ? selectedContact.name : "Privée Chat" }}</h3>

                <div class="card-tools">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">{{ messages.length }}</span>
                    <button v-on:click="checkContact" id="btn-contact" type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
                <!-- Conversations are loaded here -->
                <conversation :contact="selectedContact" :messages="messages" @new="sendNewMessage"/>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <contacts-list :contacts="contacts" @selected="startConversationWith" />
                <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</template>

<script>
    export default {
        name: "Message",

        data() {
            return {
                selectedContact: null,
                messages: [],
                contacts: [],
            }
        },

        mounted() {
            console.log("Echo", Echo);
            Echo.private(`messages.${user.id}`)
                .listen('NewMessage', (e) => {
                    this.handleIncoming(e.message);
                });

            axios.get("/api/contacts")
            .then((response) => {
                console.log(response.data);
                this.contacts = response.data;
            });
        },

        methods: {
            checkContact(event) {
                if(!this.selectedContact)
                    event.stopPropagation();
            },

            startConversationWith(contact) {
                this.updateUnreadCount(contact, true);

                axios.get(`/api/conversation/${contact.id}`)
                .then((response) => {
                    this.messages = response.data;
                    console.log(response.data);
                    this.selectedContact = contact;
                    $("#btn-contact").click();
                })
            },

            sendNewMessage(message) {
              this.messages.push(message);
            },

            handleIncoming(message) {
                console.log("message", message);
                if(this.selectedContact &&  message.from === this.selectedContact.id) {
                    this.sendNewMessage(message);
                    return;
                }

                this.updateUnreadCount(message.from_contact, false);
            },

            updateUnreadCount(contact, reset) {
                this.contacts = this.contacts.map((single) => {
                    if (single.id !== contact.id)
                        return single;

                    if (reset)
                        single.unread = 0
                    else
                        single.unread += 1;

                    return single;
                });
            }
        }
    }
</script>

<style scoped>
    .card-body {
        min-height: 700px;
    }

    .direct-chat-contacts, .direct-chat-messages {
        height: inherit;
    }

</style>
