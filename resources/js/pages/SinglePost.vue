<template>
    <section class="single_post container">
        <div class="post">
            <div class="info_post">
                <h2 class="title">{{post.title}}</h2>
                <div class="date_published">{{datePost(post.updated_at)}}</div>
            </div>

            <img :src="`storage/${post.image}`" :alt="post.title">

            <div class="post_content">{{post.content}}</div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'SinglePost',

    data() {
        return {
            post : {}
        }
    },

    created() {
        axios.get(`http://localhost:8000/api/posts/${this.$route.params.slug}`)
            .then( (response) => {
                this.post = response.data;
                console.log(this.post);
            })
    },

    methods : {
        datePost(date) {
            const newDate = new Date(date);
            return newDate.getDate() +'-'+ newDate.getMonth() +'-'+ newDate.getFullYear()
        }
    }
}
</script>

<style lang="scss" scoped>

.post{
    // padding: 20px 0;
    text-align: center;
    background-color: #fff;
    border-radius: 20px;
    padding: 40px 80px;
    margin: 20px 0;

    .info_post {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    img {
        width: 100%;
        border-radius: 5px;
        margin: 20px 0;
    }
}

</style>