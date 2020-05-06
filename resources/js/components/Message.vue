<template>
    <div class="mt-3 h-100">
        <div class="card  direct-chat direct-chat-primary direct-chat-contacts-open">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">Direct Chat</h3>

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

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                        <li>
                            <form class="form-inline col-md-12">
                                <div class="input-group input-group-sm center-block">
                                    <input type="search" placeholder="Search" aria-label="Search" class="form-control">
                                    <div class="input-group-append"><button type="submit" class="btn btn-outline-primary">
                                        <i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <!-- End Search contact Item -->
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="/uploads/profile/avatar.png">

                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="/uploads/profile/avatar.png">

                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="/uploads/profile/avatar.png">

                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="/uploads/profile/avatar.png">

                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                            <a href="#">
                                <img class="contacts-list-img" src="/uploads/profile/avatar.png">

                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
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
                <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <form action="#" method="post">
                    <div class="input-group">
                        <textarea name="message" placeholder="Type Message ..." class="form-control"></textarea>
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
        name: "Message",

        mounted() {

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

    .center-block {
        margin-left: auto;
        margin-right: auto;
    }
</style>
