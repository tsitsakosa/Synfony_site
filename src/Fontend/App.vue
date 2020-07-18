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
                greeting: 'Hello frontend app',
                posts: [],
                interval: null,
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
        mounted() {
            this.feed();
            this.interval = setInterval(function () {
                this.feed();
            }.bind(this), 30000);
        },
        beforeDestroy: function () {
            clearInterval(this.interval);
        }

    }
</script>

<style>

</style>
