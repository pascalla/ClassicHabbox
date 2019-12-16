<template>
    <div>
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
                            <span class="detail-title">Category:</span>
                            <span class="detail-info">{{ rare.category.name }}</span>
                        </div>
                    </div>
                    <div class="ml-auto text-right">
                        <div class="detail-group">
                            <span class="detail-title">Current Value:</span>
                            <span class="detail-info">{{ rare.current_price.credits }} Credits / {{ rare.current_price.credits/50 }} Goldbars</span>
                        </div>

                        <div class="detail-group" v-if="rare.release || rare.collectable_release">
                            <span class="detail-title">Initial Release:</span>
                            <span class="detail-info">{{ (rare.release) ? rare.release.created_at : rare.collectable_release.created_at }}</span>
                        </div>

                        <div class="detail-group" v-if="rare.release || rare.collectable_release">
                            <span class="detail-title" v-if="rare.release || rare.collectable_release">Release Price:</span>
                            <span class="detail-info">{{ rare.release_price.credits }} Credits &amp; {{ rare.release_price.pixels }} Pixels</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rare-body ml-auto p-5">
                <img :src="rare.image" :alt="rare.name"/>
            </div>
        </div>

        <div class="d-flex justify-content-start flex-wrap rare-body">
            <div v-for="rare in rares">
                <div :id="rare.name">
                    <a href="#" v-on:click="setRare(rare)">
                        <div class="rare-icon">
                            <img :src="rare.small_image" :alt="rare.name"/>
                        </div>
                    </a>
                </div>

                <b-popover :target="rare.name" triggers="hover" placement="top">
                    ({{ rare.current_price.credits }} Credits / {{ rare.current_price.credits/50 }} Goldbars)
                </b-popover>
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

    .detail-info{
        display:block;
    }
</style>

<script>
    export default {
        data: function () {
            return {
                rare: null,
                rares: []
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
                    })
            },
            setRare: function(rare){
                console.log(rare);
                this.rare = rare;
            }
        }
    }
</script>
