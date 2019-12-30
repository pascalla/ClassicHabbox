<template>
    <div>
        <div class="card">
            <div class="card-header ch-card-header">Rare Viewer</div>
            <div class="card-body">
                <div class="d-flex justify-content-start flex-wrap mb-3" v-if="rare">
                    <div class="rare-body flex-grow-1 mr-2">
                        <div class="d-flex">
                            <div>
                                <div class="detail-group">
                                    <span class="detail-title">Rare Name:</span>
                                    <span class="detail-info">{{ rare.name}}</span>
                                </div>

                                <div class="detail-group">
                                    <span class="detail-title">Rare Description:</span>
                                    <span class="detail-info">{{ rare.mission }}</span>
                                </div>

                                <div class="detail-group">
                                    <span class="detail-title">Release Category:</span>
                                    <span class="detail-info"><router-link :to="{ name: 'category', params: { category_slug: rare.category.slug }}">{{ rare.category.name }}</router-link></span>
                                </div>

                                <div class="detail-group">
                                    <span class="detail-title">Rare Type:</span>
                                    <span class="detail-info"><router-link :to="{ name: 'rare_type', params: { rare_type_slug: rare.type.slug }}">{{ rare.type.name }}</router-link></span>
                                </div>
                            </div>
                            <div class="ml-auto text-right">
                                <div class="detail-group">
                                    <span class="detail-title">Current Value:</span>
                                    <span class="detail-info">{{ rare.current_price.credits }} Credits / {{ rare.current_price.credits/50 }} Goldbars</span>
                                </div>

                                <div class="detail-group" v-if="rare.release || rare.collectable_release">
                                    <span class="detail-title">Initial Release:</span>
                                    <span class="detail-info">{{ (rare.release) ? formatDate(rare.release.created_at) : formatDate(rare.collectable_release.created_at) }}</span>
                                </div>

                                <div class="detail-group" v-if="rare.release || rare.collectable_release">
                                    <span class="detail-title" v-if="rare.release || rare.collectable_release">Release Price:</span>
                                    <span class="detail-info">{{ rare.release_price.credits }} Credits &amp; {{ rare.release_price.pixels }} Pixels</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rare-body rare-main-image ml-auto p-5">
                        <img :src="rare.image" :alt="rare.name"/>
                    </div>
                </div>


                <div class="d-flex justify-content-start flex-wrap rare-body">
                    <div v-for="rare in raresList">
                        <div :id="rare.name">
                            <span v-on:click="setRare(rare)">
                                <div class="rare-icon">
                                    <img :src="rare.small_image" :alt="rare.name"/>
                                </div>
                            </span>
                        </div>

                        <b-popover :target="rare.name" triggers="hover" placement="top">
                            ({{ rare.current_price.credits }} Credits / {{ rare.current_price.credits/50 }} Goldbars)
                        </b-popover>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    .detail-group{
        margin-bottom:15px;
    }

    .detail-title{
        font-weight:700;
        display:block;
    }

    .detail-info {
        display: block;
    }

    .rare-main-image {
        min-width:150px;
    }

    .rare-main-image img {
        margin:0px auto;
    }

    .rare-main-image{
        min-width:125px;
    }
</style>

<script>
    import moment from 'moment';

    export default {
        props: ['released', 'category', 'rare_type'],
        data: function () {
            return {
                rare: null,
                rares: [],
                raresList: []
            }
        },
        created: function() {
            this.getAllRares();
        },
        methods: {
            getAllRares: function(){
                axios.get('/api/rares')
                    .then((resp) => {
                        this.rares = resp.data;

                        if(this.released) {
                            this.raresList = this.releasedRares;
                        } else if(this.category) {
                            this.raresList = this.categoryRares(this.$route.params.category_slug);
                        } else if(this.rare_type) {
                            this.raresList = this.typeRares(this.$route.params.rare_type_slug);
                        } else {
                            this.raresList = this.rares;
                        }

                    })
                    .finally( () => {
                        if(this.$route.params.slug) {
                            this.rare = this.getRareBySlug(this.$route.params.slug);
                        }
                    })
            },
            getReleasedRares: function(){
                axios.get('/api/rares/released')
                    .then((resp) => {
                        this.rares = resp.data;
                    })
                    .finally( () => {
                        if(this.$route.params.slug) {
                            this.rare = this.getRareBySlug(this.$route.params.slug);
                        }
                    })
            },
            getRareBySlug: function(slug){
                return this.rares.find(rare => rare.slug === slug);
            },
            setRare: function(rare){
                if(rare !== this.rare) {
                    this.$router.push({ name: 'rare', params: { slug: rare.slug } });
                    this.rare = rare;
                }
            },
            categoryRares: function(slug) {
                let filtered = this.rares.filter(rare => rare.category.slug === slug);
                return filtered;
            },
            typeRares: function(slug) {
                let filtered = this.rares.filter(rare => rare.type.slug === slug);
                return filtered;
            },
            formatDate: function(time) {
                return moment(time).format('DD-MM-YYYY');
            }
        },
        computed: {
            releasedRares: function () {
                let filtered = this.rares.filter(rare => rare.release != null);
                return filtered.sort((a, b) => (a.release.created_at > b.release.created_at) ? 1 : -1)
            },
        },
        watch: {
            $route(to, from) {
                if(to.name === "home"){
                    this.raresList = this.rares;
                }

                if(to.name === "released"){
                    this.raresList = this.releasedRares;
                }

                if(to.name === "category"){
                    this.raresList = this.categoryRares(to.params.category_slug);
                }

                if(to.name === "rare_type"){
                    this.raresList = this.typeRares(to.params.rare_type_slug);
                }

                this.rare = this.getRareBySlug(to.params.slug);
            }
        }
    }
</script>
