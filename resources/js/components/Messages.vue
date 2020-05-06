<template>
    <div class="mt-3">
        <div class="card direct-chat direct-chat-primary">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">Messages de groupes</h3>
                <div class="card-tools">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">Idrice Roussin</span>
                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="/uploads/profile/avatar.png" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            Bonjour comeca c'est comment ? <br>
                            Hello les amis <br>
                            Le site est au top
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">Lambo Ulrich</span>
                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="/img/comeca.png" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            Le site web qui tue bravo gar
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <form action="#" method="post">
                    <div class="input-group">
                        <textarea type="text" name="message" placeholder="Type Message ..." class="form-control"></textarea>
                        <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                    </div>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "Messages",

        mounted() {

        }
    }
</script>

<style scoped>
    .card-body {
        min-height: 700px;
    }

    .direct-chat-messages {
        height: inherit;
    }
</style>
