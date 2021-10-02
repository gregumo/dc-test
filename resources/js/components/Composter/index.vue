<template>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Composteurs de quartier de Nantes Métropole</h1>
                    <p class="lead text-muted">Inventaire des composteurs de quartier réalisé par l'association
                        Compostri</p>
                </div>
            </div>
        </section>


        <section class="py-5 text-center container" v-if="error">
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    Nous sommes désolés, nous ne sommes pas en mesure de récupérer ces informations pour le moment. Veuillez réessayer ultérieurement.
                </div>
            </div>
        </section>

        <div class="container" v-else>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col" v-for="composter in composters" :key="composter.id">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <p class="card-text">
                            <h4>{{ composter.name }}</h4>
                            {{ composter.city }}<br>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <router-link :to="{name: 'composters.show', params: {slug: composter.slug}}"
                                                 type="button" class="btn btn-sm btn-outline-secondary">Voir
                                    </router-link>
                                </div>
                                <small class="text-muted">{{ composter.type }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                composters: [],
                error: false,
            };
        },
        created: function () {
            axios.get('api/composters')
                .then(response => {
                    this.composters = response.data
                })
                .catch(error => {
                    console.log(error)
                    this.error = true
                });
        }
    }
</script>