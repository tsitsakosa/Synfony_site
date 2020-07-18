<template>
    <div class="my-5">
        <div v-for="post in posts">
            <b-card
                    :title="post.title"
                    :sub-title="'—' + post.author"
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
            }
        },
        create() {

        },
        mounted() {
            //connect to socket
            const socket = new WebSocket("ws://localhost:3001");
            socket.addEventListener("open", function () {
                console.log("CONNECTED");
            });
            let $this = this;
            //"listen" to socket and print to console
            socket.addEventListener("message", e => {
                $this.$data.posts.push(JSON.parse(e.data));
                console.log(e.data);
            });
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
