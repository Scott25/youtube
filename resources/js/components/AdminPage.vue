<template>
    <div>
        <span style="position: relative;left: 92%;">
            <button v-on:click="logout" class="btn btn-success" style="font-size: 14px;">Logout</button>
        </span>
        <h1> THIS IS AN ADMIN PAGE </h1>
        <h4 style="font-size: 2em;color: red"> {{error}} </h4>
        <div class="container">

            <form @submit="uploadYoutubeVideo">
                <strong>Full youtube link:</strong>
                <input type="text" class="form-control" v-on:change="error_handle" placeholder="Past full youtube link" required="true" v-model="video_link" style="font-size: 1em;">
                <button class="btn btn-success" style="font-size: 1em;">Upload</button>
            </form>

            <h2>List of Users</h2>
            <ul class="list-group">
                <li v-for="item in userdata" class="list-group-item" v-on:click="getVideoList(item.id)">
                    {{item.fname}} &nbsp; {{item.lname}} <span class="badge">{{item.total}}</span>
                </li>
            </ul>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Video</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="item in videos">
                    <td>
                        <youtube :video-id="item.video_link" :player-vars="playerVars" @playing="playing" width="500" height="300"></youtube>
                    </td>
                    <td>{{item.video_info}}</td>
                    <td><button type="button" v-on:click="delete_video(item.video_link)" class="btn btn-danger" style="font-size: 1em">Delete</button></td>
                </tr>

                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
    export default {
        name: "AdminPage",
        data() {
            return {
                userdata: '',
                videos: '',
                userId: '',
                video_link: '',
                error: ''
            }
        },
        methods: {
            logout() {
                location.href = "/logout";
            },
            getVideosInfo() {
                axios.post('/userVideos').then(resp => {
                    const myArrStr = JSON.stringify(resp);
                    this.userdata = JSON.parse(myArrStr).data;
                    console.log( this.userdata[0]);
                });
            },
            error_handle() {
                if(this.userId === '') {
                    this.error = "Please select a user.";
                } else {
                    this.error = null;
                }
            },
            uploadYoutubeVideo(e) {
                e.preventDefault();
                axios.post('/upload', {
                    video_link: this.video_link,
                    user_id: this.userId,
                })
                    .then(function (response) {
                        location.href = '/admin';
                    })
                    .catch(function (error) {});
            },
            delete_video(video_lnk) {
                axios.post('/delete_video', {
                    video_link: video_lnk,
                    user_id: this.userId,
                })
                    .then(function (response) {
                        location.href = '/admin';
                    })
                    .catch(function (error) {});
            },
            getVideoList(userId) {
                this.userId = userId;
                this.error_handle();
                axios.post('/getSelectedUserVideos', {
                    userId: userId,
                })
                    .then(response => {
                        this.videos = response.data;
                        console.log(this.videos);
                    })
                    .catch(function (error) {});
            },
            playVideo() {
                this.player.playVideo()
            },
            playing() {}
        },
        created: function() {
            this.getVideosInfo();
        },
        computed: {
            player() {
                return this.$refs.youtube.player
            }
        }
    }
</script>
