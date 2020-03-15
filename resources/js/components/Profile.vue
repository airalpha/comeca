<template>
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" width="100" height="100" :src="getAvatar()" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ this.form.name }}</h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Produits</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Achats</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Produits vendus</b> <a class="float-right">543</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>{{ form.type }}</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-info"></i> Tips !</h5>
                    Modifier uniquement ce que vous voulez changer.
                </div>
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"><i class="fas fa-cog"></i> Parametres</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nom</label>
                                        <div class="col-sm-10">
                                            <input type="text" v-model="form.name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" id="name" placeholder="Name">
                                            <has-error :form="form" field="name"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" id="email" placeholder="Email">
                                            <has-error :form="form" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Téléphone</label>
                                        <div class="col-sm-10">
                                            <input type="tel" v-model="form.profile.phone" class="form-control" id="phone" placeholder="Numero de téléphone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-sm-2 col-form-label">Ville</label>
                                        <div class="col-sm-10">
                                            <input type="text" v-model="form.profile.city" class="form-control" id="city" placeholder="Votre ville">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                                        <div class="col-sm-10">
                                            <input type="text" v-model="form.password" class="form-control" id="password" placeholder="Laisse vide si vous volez conserver" :class="{ 'is-invalid': form.errors.has('password') }">
                                            <has-error :form="form" field="password"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="avatar" class="col-sm-2 col-form-label">Photo</label>
                                        <div class="input-group col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" @change="updateProfile" class="custom-file-input" name="avatar" id="avatar">
                                                <label class="custom-file-label" for="avatar">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Bio</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" v-model="form.profile.bio" name="bio" id="inputExperience" placeholder="Quelque chose sur vous !"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" @click.prevent="updateInfo" class="btn btn-success">Enregistrer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    type: '',
                    password: '',
                    profile: {
                        id: '',
                        user_id: '',
                        avatar: '',
                        bio: '',
                        city: '',
                        phone: ''
                    }
                }),
            }
        },

        methods: {
            getAvatar() {
                let photo = (this.form.profile.avatar.length > 200) ? this.form.profile.avatar : "uploads/profile/" + this.form.profile.avatar;
                return photo;
            },

            updateProfile(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                        this.form.profile.avatar = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    Swal.fire(
                        'Oups !',
                        'Fichier trop lourd !',
                        'warning'
                    );
                }
            },

            updateInfo() {
                this.$Progress.start();
                this.form.put('/api/profile/' + this.form.id)
                    .then((data) => {

                        this.$Progress.finish();
                    }, error => {
                        this.$Progress.fail();
                    });
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        created() {
            this.$Progress.start();
            axios.get("/api/profile").then((data) => {
                this.form.fill(data.data);
                this.$Progress.finish();
            }, (error) => {
                this.$Progress.fail();
            });
        }
    }
</script>
