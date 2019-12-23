<template>
    <div>
        <div class="card">
            <div class="card-header ch-card-header">All Badges</div>
            <div class="card-body">
                <div class="d-flex justify-content-start flex-wrap mb-3" v-if="badge">
                    <div class="badge-body flex-grow-1 mr-2">
                        <div class="d-flex">
                            <div>
                                <div class="detail-group">
                                    <span class="detail-title">Badge Name:</span>
                                    <span class="detail-info">{{ badge.name}}</span>
                                </div>

                                <div class="detail-group">
                                    <span class="detail-title">Badge Description:</span>
                                    <span class="detail-info">{{ badge.desc }}</span>
                                </div>

                                <div class="detail-group">
                                    <span class="detail-title">Obtained By:</span>
                                    <span class="detail-info">{{ badge.obtained_by }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="badge-body ml-auto p-5 badge-main-image">
                        <img :src="badge.image" :alt="badge.name"/>
                    </div>
                </div>

                <div class="d-flex justify-content-start flex-wrap badge-body">
                    <div v-for="badge in badges">
                        <div :id="badge.name">
                            <a href="#" v-on:click="setBadge(badge)">
                                <div class="badge-icon">
                                    <img :src="badge.image" :alt="badge.name"/>
                                </div>
                            </a>
                        </div>

                        <b-popover :target="badge.name" triggers="hover" placement="top">
                            {{ badge.name }}
                        </b-popover>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    .badge-body{
        background-color: #f8f8f8;
        padding:10px 10px;
    }

    .badge-icon{
        background-color:white;
        border: 1px solid grey;
        border-bottom-width: 2px;
        cursor: pointer;
        margin:3px;
        height:50px;
        width:50px;
        border-radius:5px;
    }

    .badge-icon:hover{
        background-color:lightblue;
    }
    .badge-image {
        width:50px;
        height:50px;
        padding:4px 4px;
    }

    .detail{
        color: #9999aa;
        font-size:12px;
        display:block;
    }

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

    .badge-main-image{
        min-width:50px;
    }
</style>

<script>
    export default {
        data: function () {
            return {
                badge: null,
                badges: []
            }
        },
        created: function() {
            this.getAllBadges();
        },
        methods: {
            getAllBadges: function(){
                axios.get('/api/badges')
                    .then((resp) => {
                        this.badges = resp.data;
                    })
            },
            setBadge: function(badge){
                this.badge = badge;
            }
        }
    }
</script>
