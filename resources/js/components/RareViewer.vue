<template>
    <div>
        <div class="d-flex justify-content-start flex-wrap mb-3" v-if="rare">
            <div class="rare-body flex-grow-1 mr-2">
                <p>Name: {{rare.name}}</p>
                <p>Description: {{ rare.mission }}</p>
                <div v-if="rare.release || rare.collectable_release">
                    <p>Release Date: {{ (rare.release) ? rare.release.created_at : rare.collectable_release.created_at }}</p>
                    <p>Release Price: {{ (rare.release) ? rare.release_price.credits : rare.collectable_release.credits }} Credits & {{ (rare.release) ? rare.release.pixels : rare.collectable_release.pixels }} Pixels</p>
                </div>
                <p>Category: {{ rare.category.name }}</p>
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
                    ({{ rare.current_price.credits }} C / {{ rare.current_price.credits }} Goldbars)
                </b-popover>
            </div>
        </div>
    </div>
</template>

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
