<template>
    <main>
        <section class="py-5 text-center container" v-if="error">
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    <p v-if="notFound">Le composteur que vous recherchez n'existe pas.</p>
                    <p v-else>Nous sommes désolés, nous ne sommes pas en mesure de récupérer ces informations pour le moment. Veuillez réessayer ultérieurement.</p>
                </div>
            </div>
        </section>
        <section class="py-5 text-center container" v-else>
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">{{ composter.name }}</h1>
                    <p class="lead text-muted">
                        <span class="badge bg-secondary">{{ composter.type }}</span><br>
                        <i>{{ composter.address }}</i><br>
                        <i>{{ composter.city }}</i><br>
                        <a :href="composter.url">{{ composter.url }}</a><br>
                        Depuis {{ composter.sinceYear }}<br>
                    </p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <router-link :to="{name: 'composters.index'}"
                                     type="button" class="btn btn-primary">Retour à la liste des composteurs
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                composter: {},
                error: false,
                notFound: false,
            };
        },
        created: function () {
            axios.get('/api/composters/' + this.$route.params.slug)
                .then(response => {
                    this.composter = response.data
                })
                .catch(error => {
                    this.error = true
                    if(error.response.status == 404){
                        this.notFound = true
                    }
                });
        }
    }
</script>
