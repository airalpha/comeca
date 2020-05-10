<template>
    <div class="direct-chat-contacts">
        <ul class="contacts-list">
            <li>
                <form class="form-inline col-md-12">
                    <div class="input-group input-group-sm center-block">
                        <input type="search" placeholder="Search" v-model="search" aria-label="Search" class="form-control">
                        <div class="input-group-append"><button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </li>
            <!-- End Search contact Item -->
            <li v-for="(contact, index) in searchContact" :key="contact.id" @click="selectedContact(index, contact)">
                <a href="#">
                    <img class="contacts-list-img" :src="contact.profile ? contact.profile.avatar : ''">

                    <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            {{ contact.name }}
                            <small class="contacts-list-date float-right">date</small>
                          </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                    </div>
                    <!-- /.contacts-list-info -->
                </a>
            </li>
            <!-- End Contact Item -->
        </ul>
        <!-- /.contacts-list -->
    </div>
</template>

<script>
    export default {
        name: "ContactsList",

        props: {
            contacts: {
                type: Array,
                default: []
            }
        },

        data() {
            return {
                search: '',
            }
        },

        mounted() {
        },

        methods: {
            selectedContact(index, contact) {
                this.selected = index;
                this.$emit('selected', contact);
            }
        },

        computed: {
            searchContact() {
                if(this.search === '')
                    return this.contacts;

                return this.contacts.filter(
                    contact => {
                        return contact.name.toLowerCase().includes(this.search.toLowerCase());
                    }
                )
            }
        }
    }
</script>

<style scoped>
    .center-block {
        margin-left: auto;
        margin-right: auto;
    }
</style>
