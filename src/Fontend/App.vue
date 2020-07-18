<template>
    <div>
        <div v-for="post in posts">
            <h2>{{post.title}}</h2>
            <p>{{post.body}}</p>
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
