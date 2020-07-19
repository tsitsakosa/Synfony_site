<template>
    <div class="my-5">
        <div v-for="post in posts">
            <b-card
                    :title="post.title"
                    :sub-title="'—' + post.author + ', ' + getDate(post.creationTime.date)"
                    :img-src="post.imageUrl"
                    img-alt="Image"
                    img-bottom
                    tag="article"
                    style="max-width: 40rem;"
                    class="mb-5 mx-auto"
            >
                <b-card-text>{{ post.body }}</b-card-text>
            </b-card>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    export default {
        data() {
            return {
                posts: [],
            }
        },
        methods: {
            feed: function () {
                fetch('/api/feed')
                    .then(response => response.json())
                    .then(data => {
                        this.posts.push(data);
                        console.log(data.title)
                    });
            },
            getDate(value) {
                return moment(value).format('DD MMMM YY');
            }
        },
        mounted() {
            //connect to socket
            const socket = new WebSocket("ws://localhost:3001");
            socket.addEventListener("open", function () {
                console.log("CONNECTED");
            });
            socket.addEventListener("message", e => {
                this.$data.posts.unshift(JSON.parse(e.data));
            }).bind(this);
        },
        beforeDestroy: function () {
            socket.removeEventListener("open", function () {
                console.log("DISCONNECTED");
            });
        }

    }
</script>
<style>

</style>
