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

    const _TIMER_POLL = 60000
    export default {
        data() {
            return {
                posts: [],
                interval: null,
            }
        },
        methods: {
            feed: function () {
                fetch('/api/feed')
                    .then(response => response.json())
                    .then(data => {
                        this.posts.unshift(data);
                    });
            },
            getDate(value) {
                return moment(value).format('DD MMMM YY');
            }
        },
        mounted() {
            this.feed();
            this.interval = setInterval(() => {
                this.feed();
            }, _TIMER_POLL);
        },
        beforeDestroy() {
            clearInterval(this.interval);
        }
    }
</script>
<style>

</style>
