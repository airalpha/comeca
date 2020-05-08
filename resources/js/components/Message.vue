<template>
    <div class="mt-3 h-100">
        <div class="card  direct-chat direct-chat-primary direct-chat-contacts-open">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">{{ selectedContact ? selectedContact.name : "Privée Chat" }}</h3>

                <div class="card-tools">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
                <!-- Conversations are loaded here -->
                <conversation :contact="selectedContact" :messages="messages" />
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
            console.log(user);
            axios.get("/api/contacts")
            .then((response) => {
                console.log(response.data);
                this.contacts = response.data;
            });
        },

        methods: {
            startConversationWith(contact) {
                axios.get(`/api/conversation/${contact.id}`)
                .then((response) => {
                    this.messages = response.data;
                    console.log(response.data);
                    this.selectedContact = contact;
                })
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
