<template>
    <div>
        <span style="position: relative;left: 92%;">
        <button v-on:click="logout" class="btn btn-success">Logout</button>
        </span>
            <ul id="example-1">
                <li v-for="item in youtubedata">
                    <youtube :video-id="item.video_link" :player-vars="playerVars" @playing="playing" width="500" height="300"></youtube>
                </li>
            </ul>
    </div>
</template>

<script>
    export default {
        name: "UserDetails",
        data() {
            return {
                youtubedata: '',
                videoId: '',
                playerVars: {
                    autoplay: 0
                }
            };
        },
        methods : {
            logout() {
                location.href = '/logout';
            },
            getVideos() {
                axios.get('/fetchVideos').then(resp => {
                    const myArrStr = JSON.stringify(resp);
                    this.youtubedata = JSON.parse(myArrStr);
                    this.youtubedata = this.youtubedata.data;
                });
            },
            playVideo() {
                this.player.playVideo()
            },
            playing() {}
        },
        created: function() {
            this.getVideos();
        },
        computed: {
            player() {
                return this.$refs.youtube.player
            }
        }
    }
</script>
